<?php

namespace App\Http\Controllers;

use App\Models\caseModel;
use App\Models\client;
use App\Models\view_case_log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class CaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
        $list = DB::table('case')
            ->join('client', 'case.client_id', '=', 'client.id')
            ->join('lbo_case_status', 'case.case_status', '=', 'lbo_case_status.id')
            ->join('company', 'case.service_provider', '=', 'company.company_id')
            // ->join('attachment', 'case.id', '=', 'attachment.case_id')
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
        if ($request->ajax()) {
            send_msg(1, 'agreed_loan');
            $input = $request['id'];
            $status = $request['status'];
            $sp = DB::table('case')->where('id', $input)->value('service_provider');
            if ($sp == 0) {
                return $data = [
                    'status' => 3,
                    'message' => '請先選擇服務提供商'
                ];
            }

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
                ->where('id', $input)
                ->update([
                    'case_status' => $status, 'update_datetime' => date('Y-m-d H:i:s', time()), 'update_by' => $handle
                ]);
            if ($res) {
                sp_savetolog('individual', $input, 'id');
                $data = [
                    'status' => 1,
                    'message' => '修改成功',
                ];
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user = DB::table('case')
            ->join('client', 'case.client_id', '=', 'client.id')
            ->join('company', 'case.service_provider', '=', 'company.company_id')
            ->select(
                'case.*',
                'client.first_name',
                'client.last_name',
                'client.appellation',
                'client.mobile',
                'client.email',
                'client.nationality',
                'client.date_of_birth',
                'client.unit',
                'client.floor',
                'client.HKID',
                'client.building',
                'client.addres',
                'client.address1',
                'client.address2',
                'client.company_name',
                'client.job_status',
                'client.area',
                'client.company_contact',
                'client.company_addres',
                'company.company_id',
                'company.name'
            )
            ->where('case.id',  $id)
            ->get();
        $view_case_log = caseModel::where('id', $id)->get();
        $view_case_log = $view_case_log[0];
        view_case_log::insert([
            'case_id' => $id, 
            'case_sys_id' => $view_case_log->sys_id,
            'user_id' => session('login_info')['user_id'],
            'user_role' => IsRole(),
            'view_datetime' => date('Y-m-d H:i:s', time()),
            'ip' => request()->ip(),
            'browser' => getBrowser($_SERVER['HTTP_USER_AGENT']),
            'create_datetime' => date('Y-m-d H:i:s', time()),
            'status' => 1
        ]);
        return $user;
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //  //

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
            
            $sys_id = date("Ym") . getStr() . date("d");
            $input = $request['json1'];
            
            $result = DB::table('case')->find($id);
            $email = DB::table('service_provider')->where('company_id', $input['company_id'])->value('email');
            
            if (!$result) {
                
                //根据身份证明查询client table 是否存在这个用户
                $result1 = DB::table('client')->where('HKID', $input['HKID'])->first();
                if ($result1) {
                    
                    $clientid = DB::table('client')->where('HKID', $input['HKID'])->value('id');
                    $res = DB::table('case')
                        ->insert([
                            'loan_amount'         => $input['loan_amount'],
                            'repayment_period'    => $input['repayment_period'],
                            'client_id'           => $clientid,
                            'service_provider'    => $input['company_id'],
                            'purpose'             => $input['lbo_loan_purpose'],
                            'co_signer_last_name' => 'co_signer_last_name',
                            'case_status'         => 1,
                            'sys_id'              => $sys_id,
                            'status'              => 1,
                            'create_datetime'     => date('Y-m-d H:i:s', time()),
                            'update_datetime'     => date('Y-m-d H:i:s', time()),
                            'handle_by'           => $handle
                        ]);
                    if ($res) {
                        sp_savetolog('case', $sys_id, 'sys_id');
                        //这个函数有问题
                        send_msg_to_sp($sys_id, 'admin_add_loan');
                        
                        $data = [
                            'status' => 1,
                            'message' => '添加貸款成功',
                        ];
                    } else {
                        $data = [
                            'status' => 0,
                            'message' => '貸款添加失敗'
                        ];
                    }
                } else {
                    
                    //用户HKID不存在clients中则进入这里
                    $token = date("Y") . getStr() . date("m") . getStr() . date("d") . getStr() . date("H") . getStr() . date("i") . getStr() . date("s");
                    //判断email是不是client sp individual中的一个
                    $isClient_email = DB::table('client')->where('email', $input['email'])->first();
                    $isservice_provider_email = DB::table('service_provider')->where('email', $input['email'])->first();
                    $isindividual_email = DB::table('individual')->where('email', $input['email'])->first();
                    //emial是client sp individual中的一个则返回如下
                    if ($isClient_email || $isservice_provider_email || $isindividual_email) {
                        $data = [
                            'status' => 3,
                            'message' => 'Email 已存在'
                        ];
                        return $data;
                    }
                    //email未被注册过 则新增一个client用户
                    
                    $res = client::insert([
                        'first_name' => $input['first_name'], 'last_name' => $input['last_name'], 'date_of_birth' => $input['date_of_birth'], 'HKID' => $input['HKID'],
                        'email' => $input['email'], 'nationality' => $input['nationality'], 'area' => $input['lbo_district'], 'appellation' => $input['lbo_appellation'],
                        'floor' => $input['floor'], 'unit' => $input['unit'], 'building' => $input['building'],
                        'address1' => $input['address1'], 'address2' => $input['address2'],
                        'company_name' => $input['company_name'], 'token' => $token, 'job_status' => $input['lbo_employment'],
                        'company_contact' => $input['company_contact'], 'company_addres' => $input['company_addres'], 'status' => 2, 'update_by' => IsRole(),
                        'mobile' => $input['mobile'], 'update_datetime' => date('Y-m-d H:i:s', time()), 'create_datetime' => date('Y-m-d H:i:s', time()),
                    ]);
                    
                    //获取用户 HKID
                    $clientid = DB::table('client')->where('HKID', $input['HKID'])->value('id');
                    $res1 = DB::table('case')
                        ->insert([
                            'loan_amount' => $input['loan_amount'], 
                            'repayment_period' => $input['repayment_period'], 
                            'client_id' => $clientid,
                            'purpose' => $input['lbo_loan_purpose'],
                            'co_signer_last_name' => 'co_signer_last_name', 
                            'case_status' => 1, 
                            'service_provider' => $input['company_id'],
                            'status' => 1, 
                            'create_datetime' => date('Y-m-d H:i:s', time()), 
                            'update_datetime' => date('Y-m-d H:i:s', time()),
                            'sys_id' => $sys_id, 
                            'handle_by' => $handle
                        ]);
                        
                    if ($res && $res1) {
                        
                        sp_savetolog('client', $clientid, 'id');
                        sp_savetolog('case', $sys_id, 'sys_id');
                        send_msg_client_creat($sys_id, 'client_create');
                        $data = [
                            'status' => 1,
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
            } else {
                
                $isCaseStatus = caseModel::where('id', $id)->value('case_status');

                $service_provider = DB::table('case')->where('id', $id)->value('service_provider');
                $res = DB::table('client')
                    ->where('HKID', $input['HKID'])
                    ->update([
                        'first_name' => $input['first_name'], 'last_name' => $input['last_name'], 'date_of_birth' => $input['date_of_birth'],
                        'email' => $input['email'], 'nationality' => $input['nationality'], 'area' => $input['lbo_district'], 'appellation' => $input['lbo_appellation'],
                        'floor' => $input['floor'], 'unit' => $input['unit'],
                        'building' => $input['building'], 'address1' => $input['address1'], 'address2' => $input['address2'],
                        'company_name' => $input['company_name'], 'job_status' => $input['lbo_employment'], 'update_by' => IsRole(),
                        'company_contact' => $input['company_contact'], 'company_addres' => $input['company_addres'],
                        'mobile' => $input['mobile'], 'update_datetime' => date('Y-m-d H:i:s', time())
                    ]);
                if ($isCaseStatus == 5) {
                    if ($service_provider == $input['company_id']) {
                        return $data = [
                            'status' => 3,
                            'message' => '請重新選擇服務提供商'
                        ];
                    } else {
                        $res1 = DB::table('case')
                            ->where('id', $id)
                            ->update([
                                'service_provider' => $input['company_id'], 'case_status' => 1, 'update_datetime' => date('Y-m-d H:i:s', time()), 'update_by' => $handle
                            ]);
                    }
                } else {
                    $res1 = DB::table('case')
                        ->where('id', $id)
                        ->update([
                            'service_provider' => $input['company_id'], 'repayment_period' => $input['repayment_period'],
                            'purpose' => $input['lbo_loan_purpose'],
                            'update_datetime' => date('Y-m-d H:i:s', time()), 'update_by' => $handle
                        ]);
                }

                if ($res && $res1) {
                    $clientid  = DB::table('case')->where('id', $id)->value('client_id');

                    sp_savetolog('client', $clientid, 'id');

                    sp_savetolog('case', $id, 'id');

                    $data = [
                        'status' => 1,
                        'message' => '修改成功',
                    ];
                } else {
                    $data = [
                        'status' => 0,
                        'message' => '修改失敗'
                    ];
                }

                return $data;
            }
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
        //$res = DB::table("case")->where("id", $id)->delete();
        $res = DB::table("case")->where("id", $id)->update(['case_status' => 4]);
        if ($res) {
            $data = [
                'status' => 1,
                'message' => '刪除成功'
            ];
        } else {
            $data = [
                'status' => 0,
                'message' => '刪除失敗'
            ];
        }
        return $data;
    }
}
