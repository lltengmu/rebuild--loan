<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\IndividualLoginRequest;
use App\Models\caseModel;
use App\Models\client;
use App\Models\service_provider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\LOG;
use Illuminate\Support\Facades\Validator;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;
use Illuminate\Support\Arr;
use Illuminate\Validation\ValidationException;

class IndividualController extends Controller
{
    public function login()
    {
        return view('individual/login')->with('user_type', 'individual');
    }
    public function doLogin(IndividualLoginRequest $request)
    {
        //验证已通过 开始检查传入的数据
        $user = DB::table('individual')->where(['email' => $request->email,'password' => sha1($request->psw),])->first();

        //匹配账号密码是否正确
        if(!$user) throw ValidationException::withMessages(['email' => '錯誤的帳號或密碼']);

        //用户账号是否被禁用
        if($user->status == 0) throw ValidationException::withMessages(['email' => '此賬號被禁用']);
        
        //定义session数组
        $user_array = [
            'user_id' => $user->id,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'level' => 'individual',
        ];
        //存储session
        session()->put([
            'login_info' => $user_array,
            'email' => $user->email,
        ]);
        DB::table('individual')
            ->where('email', $request->email)
            ->update([
                'update_datetime' => date('Y-m-d H:i:s'),
                'last_login_datetime' => date('Y-m-d H:i:s', time()),
                'ip' => request()->ip(),
                'browser' => getBrowser($_SERVER['HTTP_USER_AGENT']),
            ]);
        sp_savetolog('individual', $request->email, 'email');

        return redirect('individual/list');
        
    }
    public function list()
    {
        $case = caseModel::get();
        $case_count = count($case);
        $client = count(client::get());
        $company = DB::table('company')->get();
        $case_success = count(caseModel::where('case_status', 4)->get());
        $case_reject = count(caseModel::where('case_status', 5)->get());
        $compare = $case_success . '/' . $case_reject;
        $service_provider = count(service_provider::get());
        $sp_bank_cases = caseModel::where('service_provider', 1)->get();
        $sp_hkbank_cases = caseModel::where('service_provider', 2)->get();
        $allSps = DB::table('service_provider')
            ->select('company_staff_id', 'first_name','company_id')
            ->get();
        
        return view('individual/list', [
            'cases' => $case,
            'case' => $case_count,
            'client' => $client,
            'sp' => $service_provider,
            'compare' => $compare,
            'login_info' => session('login_info'),
            'sp_bank_cases' => $sp_bank_cases,
            'sp_hkbank_cases' => $sp_hkbank_cases,
            'allSps' => $allSps,
            'company' => $company,
        ])->with('user_type', 'individual');
    }

    public function splist()
    {
        $splist = DB::table('company')
            ->where('status', '1')
            ->get();
        return view('individual/splist', ['splist' => $splist])->with(
            'user_type',
            'individual'
        );
    }
    public function userlist()
    {
        return view('individual/userlist')->with('user_type', 'individual');
    }
    public function clientlist()
    {
        $lbo_employment = DB::table('lbo_employment')->get();
        $lbo_appellation = DB::table('lbo_appellation')->get();
        $lbo_district = DB::table('lbo_district')->get();
        return view('individual/clientlist', [
            'lbo_district' => $lbo_district,
            'lbo_appellation' => $lbo_appellation,
            'lbo_employment' => $lbo_employment,
        ])->with('user_type', 'individual');
    }
    public function case()
    {
        $splist = DB::table('company')
            ->where('status', '1')
            ->get();
        $lbo_district = DB::table('lbo_district')->get();
        $lbo_appellation = DB::table('lbo_appellation')->get();
        $lbo_loan_purpose = DB::table('lbo_loan_purpose')->get();
        $lbo_employment = DB::table('lbo_employment')->get();
        $companys = DB::table('company')->get();
        return view('individual/case', [
            'splist' => $splist,
            'lbo_district' => $lbo_district,
            'lbo_appellation' => $lbo_appellation,
            'lbo_loan_purpose' => $lbo_loan_purpose,
            'lbo_employment' => $lbo_employment,
            'companys' => $companys,
        ])->with('user_type', 'individual');
    }

    public function approval()
    {
        return view('individual/approval')->with('user_type', 'individual');
    }
    // userlist data
    public function logout()
    {
        //清空session 的用户信息
        session()->flush();
        //跳转到登录界面
        return redirect('individual/login');
    }
}
