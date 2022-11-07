<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\LOG;
use Illuminate\Support\Facades\Validator;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;

class SpController extends Controller
{
  public function login()
  {
    return view('sp/login')->with('user_type', 'sp');
  }
  public function captcha()
  {
    $builder = new CaptchaBuilder;
    $builder->build();
    header('Content-type: image/jpeg');
    $builder->output();
    session()->put('captcha', $builder->getPhrase());
  }
  public function doLogin(Request $request)
  {
    $input = $request->all();
    // 验证是否有此用户
    $rule = [
      'email' => 'required|email',
      'psw' => 'required',
      'captcha' => 'required'
    ];
    $msg = [
      'email.required' => '電子郵件欄位是必填的',
      'psw.required' => '密碼欄位是必填的',
      'email.email' => '電子郵件欄位格式錯誤',
      'captcha.required' => '驗證碼欄位是必填的'
    ];
    $validator = Validator::make($input, $rule, $msg);

    if ($validator->fails()) {
      return redirect('sp/login')
        ->withErrors($validator)
        ->withInput();
    }

    // // 获取通过验证的数据...
    // $validated = $validator->validated();

    // // 获取部分通过验证的数据...
    // $validated = $validator->safe()->only(['name', 'email']);
    // $validated = $validator->safe()->except(['name', 'email']);
    $user = DB::table('service_provider')->where([
      'email'  =>  $input['email'],
      'password'  =>  sha1($input['psw']),
    ])->first();
    if ($user) {

      if ($user->status == 0) {
        return redirect('sp/login')->withErrors('此賬號被禁用');
      }
      if (strtolower($input['captcha']) != strtolower(session()->get('captcha'))) {
        return redirect('sp/login')->withErrors('驗證碼錯誤');
      }

      $user_array = [
        'user_id' => $user->company_staff_id,
        'first_name' =>  $user->first_name,
        'last_name' =>  $user->last_name,
        'level' => 'sp'

      ];

      session()->put(['login_info' => $user_array, 'email' => $user->email]);
      DB::table('service_provider')->where('email', $input['email'])->update([
        'update_datetime' => date('Y-m-d H:i:s'), 'last_login_datetime' => date('Y-m-d H:i:s', time()),
        'ip' => request()->ip(), 'browser' => getBrowser($_SERVER['HTTP_USER_AGENT'])
      ]);
      sp_savetolog('service_provider', $input['email'], 'email');

      return redirect('sp/list');
    } else {
      return redirect('sp/login')->withErrors('錯誤的帳號或密碼');
    }
  }
  public function list()
  {
    return view('sp/list')->with('user_type', 'sp');
  }
  public function approval()
  {
    return view('sp/approval')->with('user_type', 'sp');
  }
  public function caseapply()
  {
    $lbo_loan_purpose = DB::table('lbo_loan_purpose')->get();
    $lbo_employment = DB::table('lbo_employment')->get();
    $lbo_district = DB::table('lbo_district')->get();
    $companys = DB::table('company')->get();
    return view('sp/caseapply',[
      'lbo_loan_purpose' => $lbo_loan_purpose,
      'lbo_employment'   => $lbo_employment,
      'lbo_district'     => $lbo_district,
      'companys' => $companys,
      ])->with('user_type', 'sp');
  }
  public function spapproval()
  {
    $sp = DB::table('service_provider')
      ->where('email', session()->get('email'))
      ->value('company_id');
    $list = DB::table('case')
      ->join('client', 'case.client_id', '=', 'client.id')
      ->join('company', 'case.service_provider', '=', 'company.company_id')
      ->join('lbo_case_status', 'case.case_status', '=', 'lbo_case_status.id')
      ->where('case.case_status', '>',  2)
      ->where('service_provider', $sp)
      ->select('case.*', 'client.first_name', 'client.last_name', 'company.name', 'lbo_case_status.label_tc')
      ->get();
    return $list;
  }

  public function logout()
  {
    //清空session 的用户信息
    session()->flush();
    //跳转到登录界面
    return redirect('sp/login');
  }
}
