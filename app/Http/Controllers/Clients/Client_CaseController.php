<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Client_CaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $id = DB::table('client')->where('email', session()->get('email'))->value('id');
        $list = DB::table('case')
            ->join('client', 'case.client_id', '=', 'client.id')
            ->join('company', 'case.service_provider', '=', 'company.company_id')
            ->join('lbo_case_status', 'case.case_status', '=', 'lbo_case_status.id')
            // ->join('attachment', 'case.id', '=', 'attachment.case_id')
            ->where([
                'case.client_id' => $id
            ])
            ->select('case.*', 'client.first_name', 'client.last_name', 'company.name', 'lbo_case_status.label_tc')
            ->get();
        return $list;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $requestid
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        function getStr()
        {
            $strs = "QWERTYUIOPASDFGHJKLZXCVBNM1234567890qwertyuiopasdfghjklzxcvbnm";
            $str = substr(str_shuffle($strs), mt_rand(0, strlen($strs) - 11), 2);
            return $str;
        }
        $sys_id = date("Ym") . getStr() . date("d");
        $input = $request['json1'];
        $client_id = DB::table('client')->where('email', session()->get('email'))->value('id');

        if ($id !== 'undefined') {

            $res = DB::table('case')
                ->where('id', $id)
                ->update([
                    'loan_amount' => $input['loan_amount'], 'repayment_period' => $input['repayment_period'],
                    'client_id' => $client_id, 'purpose' => $input['lbo_loan_purpose'],
                    'co_signer_last_name' => 'co_signer_last_name', 'case_status' => 1, 'service_provider' => $input['company_id'],
                    'status' => 1, 'update_datetime' => date('Y-m-d H:i:s', time())
                ]);
            if ($res) {
                sp_savetolog('case', $sys_id, 'sys_id');
                $data = [
                    'status' => 1,
                    'clientUser' => $client_id,
                    'message' => '修改成功',
                ];
            } else {
                $data = [
                    'status' => 0,
                    'message' => '修改失敗'
                ];
            }
        } else {

            $res = DB::table('case')
                ->insert([
                    'loan_amount' => $input['loan_amount'], 'repayment_period' => $input['repayment_period'],
                    'client_id' => $client_id, 'purpose' => $input['lbo_loan_purpose'],
                    'co_signer_last_name' => 'co_signer_last_name', 'case_status' => 1, 'service_provider' => $input['company_id'],
                    'status' => 1, 'create_datetime' => date('Y-m-d H:i:s', time()), 'update_datetime' => date('Y-m-d H:i:s', time()), 'sys_id' => $sys_id
                ]);
            if ($res) {
                sp_savetolog('case', $sys_id, 'sys_id');
                $data = [
                    'status' => 1,
                    'clientUser' => $client_id,
                    'message' => '創建成功',
                ];
            } else {
                $data = [
                    'status' => 0,
                    'message' => '創建失敗'
                ];
            }
        }
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
