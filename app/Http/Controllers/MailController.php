<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //
    public function sendMail(Request $request)
    {
        $input = $request['data'];
        if ($input['category'] == 'client') {
            $clientUser = $input['id'];
            $email = DB::table('client')->where('id', $clientUser)->value('email');
        }
        if ($input['category'] == 'sp') {
            $clientUser = $input['id'];
            $email = DB::table('client')->where('id', $clientUser)->value('email');
        }
        if ($input['category'] == 'individual') {
            $email = $input['id'];
        }


        // Mail::send()的返回值为空，所以可以其他方法进行判断 
        // Mail::send();需要传三个参数;
        // 第一个为引用的模板
        // 第二个为给模板传递的变量（邮箱发送的文本内容）
        // 第三个为一个闭包，参数绑定Mail类的一个实例。
        $insert = DB::table('notification_log')->insert([
            'category' => $email, 'title' => '', 'case_status' => '',
            'content' => $input['content'], 'email_address' => $email,
            'create_datetime' => date('Y-m-d H:i:s', time())
        ]);
        $res = Mail::send('emails', ['content' => $input], function ($message) use ($email) {
            $to = $email;
            $message->to($to)->subject('FG loan systm');
        });
        if ($insert) {
            return 'true';
        } else {
            return 'No insert';
        }
        // 返回的一个错误数组，利用此可以判断是否发送成功
        dd(Mail::failures());
    }
}
