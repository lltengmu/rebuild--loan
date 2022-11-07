<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\LOG;
use Illuminate\Support\Facades\Validator;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;
use Illuminate\Support\Arr;

class ClientloginController extends Controller
{
    public function login()
    {
        return view('clients/login')->with('user_type', 'individual');
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
        // return sha1($input['psw']);
        $validator = Validator::make($input, $rule, $msg);

        if ($validator->fails()) {
            return redirect('clients/login')
                ->withErrors($validator)
                ->withInput();
        }

        // // 获取通过验证的数据...
        // $validated = $validator->validated();

        // // 获取部分通过验证的数据...
        // $validated = $validator->safe()->only(['name', 'email']);
        // $validated = $validator->safe()->except(['name', 'email']);
        $user = DB::table('client')->where([
            'email'  =>  $input['email'],
            'password'  =>  sha1($input['psw']),
        ])->first();
        if ($user) {

            if ($user->status == 0) {
                return redirect('clients/login')->withErrors('此賬號被禁用');
            }
            if ($user->status == 2) {
                return redirect('clients/login')->withErrors('此用戶未驗證');
            }
            if (strtolower($input['captcha']) != strtolower(session()->get('captcha'))) {
                return redirect('clients/login')->withErrors('驗證碼錯誤');
            }

            $user_array = [
                'user_id' => $user->id,
                'first_name' =>  $user->first_name,
                'last_name' =>  $user->last_name,
                'level' => 'clients'

            ];

            session()->put(['login_info' => $user_array, 'email' => $user->email]);
            DB::table('client')->where('email', $input['email'])->update([
                'update_datetime' => date('Y-m-d H:i:s'), 'last_login_datetime' => date('Y-m-d H:i:s', time()),
                'ip' => request()->ip(), 'browser' => getBrowser($_SERVER['HTTP_USER_AGENT'])
            ]);
            sp_savetolog('client', $input['email'], 'email');

            return redirect('clients/case');
        } else {
            return redirect('clients/login')->withErrors('錯誤的帳號或密碼');
        }
    }
    public function logout()
    {
        //清空session 的用户信息
        session()->flush();
        //跳转到登录界面
        return redirect('clients/login');
    }
}
