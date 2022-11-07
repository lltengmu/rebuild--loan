<?php

namespace App\Http\Controllers\Sp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SpApprovalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sp = DB::table('service_provider')
            ->where('email', session()->get('email'))
            ->value('company_id');
        $list = DB::table('case')
            ->join('client', 'case.client_id', '=', 'client.id')
            ->join('company', 'case.service_provider', '=', 'company.company_id')
            ->join('lbo_case_status', 'case.case_status', '=', 'lbo_case_status.id')
            ->where('case.case_status',  2)
            ->where('service_provider', $sp)
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
        //
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
        $isindividual = DB::table('individual')->where('email', session()->get('email'))->first();
        $isSp = DB::table('service_provider')->where('email', session()->get('email'))->first();
        $handle = '';
        if ($isindividual) {
            $handle = "individual_" . $isindividual->id;
        }

        if ($isSp) {
            $handle = 'sp_' . $isSp->company_staff_id;
        }

        $res = DB::table('case')
            ->where('id', $id)
            ->update(['case_status' => 1, 'update_datetime' => date('Y-m-d H:i:s', time()), 'update_by' => $handle]);
        if ($res) {
            sp_savetolog('individual', $id, 'id');
            $data = [
                'status' => 1,
                'message' => '驳回成功',
            ];
        } else {
            $data = [
                'status' => 0,
                'message' => '驳回失敗'
            ];
        }
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        if ($request->ajax()) {


            $isindividual = DB::table('individual')->where('email', session()->get('email'))->first();
            $isSp = DB::table('service_provider')->where('email', session()->get('email'))->first();
            $handle = '';
            if ($isindividual) {
                $handle = "individual_" . $isindividual->id;
            }

            if ($isSp) {
                $handle = 'sp_' . $isSp->company_staff_id;
            }

            $input = $request['status'];
            $remark = $request['content'];
            $loan_interest = $request['loan_interest'];
            $date_of_pay = $request['date_of_pay'];
            $res = DB::table('case')
                ->where('id', $id)
                ->update(['loan_interest' => $loan_interest, 'date_of_pay' => $date_of_pay, 'case_status' => $input, 'case_remark' => $remark,  'update_datetime' => date('Y-m-d H:i:s', time()), 'update_by' => $handle]);
            if ($res) {
                sp_savetolog('individual', $id, 'id');
                $clientUser = DB::table('case')
                    ->where('id', $id)
                    ->value('client_id');
                if ($input == 3) {
                    $data = [
                        'clientUser' => $clientUser,
                        'status' => 1,
                        'spagree' => '同意',
                        'message' => '修改成功'
                    ];
                } else {
                    $data = [
                        'status' => 1,
                        'message' => '修改成功'
                    ];
                }
            } else {
                $data = [
                    'status' => 0,
                    'message' => '修改失敗'
                ];
            }
            return $data;
        }
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
