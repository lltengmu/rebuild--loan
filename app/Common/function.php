<?php
// 示例函数

use App\Models\caseModel;
use App\Models\client;
use App\Models\loan_template_log;
use App\Models\notification_log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

function getStr()
{
    $strs = "QWERTYUIOPASDFGHJKLZXCVBNM1234567890qwertyuiopasdfghjklzxcvbnm";
    $str = substr(str_shuffle($strs), mt_rand(0, strlen($strs) - 11), 2);
    return $str;
}
function sp_savetolog($table, $val, $field)
{
    $data = DB::table($table)
        ->where($field, $val)->get()->map(function ($value) {
            return (array)$value;
        })->toArray();
    $res = DB::table($table . '_log')
        ->insert($data);
    return $res;
}
function getBrowser($userAgent)
{
    $browsers = array(
        'Opera' => '#Opera#',
        'Mozilla Firefox' => '#(Firebird)|(Firefox)#', // Use regular expressions as value to identify browser
        'Galeon' => '#Galeon#',
        'safari' => '#Gecko#',
        'MyIE' => '#MyIE#',
        'Lynx' => '#Lynx#',
        'Netscape' => '#(Mozilla/4\.75)|(Netscape6)|(Mozilla/4\.08)|(Mozilla/4\.5)|(Mozilla/4\.6)|(Mozilla/4\.79)#',
        'Konqueror' => '#Konqueror#',
        'SearchBot' => '#(nuhk)|(Googlebot)|(Yammybot)|(Openbot)|(Slurp/cat)|(msnbot)|(ia_archiver)#',
        'Internet Explorer 7' => '#(MSIE 7\.[0-9]+)#',
        'Internet Explorer 6' => '#(MSIE 6\.[0-9]+)#',
        'Internet Explorer 5' => '#(MSIE 5\.[0-9]+)#',
        'Internet Explorer 4' => '#(MSIE 4\.[0-9]+)#',
    );

    foreach ($browsers as $browser => $pattern) { // Loop through $browsers array
        // Use regular expressions to check browser type
        if (preg_match($pattern, $userAgent)) { // Check if a value in $browsers array matches current user agent.
            return $browser; // Browser was matched so return $browsers key
        }
    }
    return 'Unknown'; // Cannot find browser so return Unknown
}
function IsRole()
{
    $isindividual = DB::table('individual')->where('email', session()->get('email'))->first();
    $isSp = DB::table('service_provider')->where('email', session()->get('email'))->first();
    $isClient = DB::table('client')->where('email', session()->get('email'))->first();
    $handle = '';
    if ($isindividual) {
        $handle = "individual_" . $isindividual->id;
    }

    if ($isSp) {
        $handle = 'sp_' . $isSp->company_staff_id;
    }
    if ($isClient) {
        $handle = 'client_' . $isClient->id;
    }
    return $handle;
}
function send_msg_log($email = "", $sys_id = "", $title = "", $content = "",   $short_code = "")
{
    $case_status = caseModel::where('sys_id', $sys_id)->value('case_status');
    $res = notification_log::insert([
        'email_address' => $email,
        'title' => $title,
        'content' => $content,
        'category' => $short_code,
        'case_status' => $case_status,
        'create_datetime' => date('Y-m-d H:i:s', time())
    ]);
}
function send_msg($case_id = "",  $short_code = "")
{
    $replace_arr = DB::table('case')
        ->join('client', 'case.client_id', '=', 'client.id')
        ->join('company', 'case.service_provider', '=', 'company.company_id')
        ->select(
            'client.first_name',
            'client.last_name',
            'client.email',
            'company.company_id',
            'company.name'
        )
        ->where('case.id',  $case_id)
        ->get();
    $sys_id = caseModel::where('id', $case_id)->value('sys_id');
    $templates_data = DB::table("notification_template")->where(["category" => $short_code])->get();
    if ($templates_data) {
        foreach ($templates_data as $template_data) {

            $title = $template_data->title;

            $content = $template_data->content;

            foreach ($replace_arr[0] as $replace_key => $replace_value) {

                $title = str_replace("[" . $replace_key . "]", $replace_value, $title);

                $content = str_replace("[" . $replace_key . "]", $replace_value, $content);
            }
            $email = $replace_arr[0]->email;
            send_msg_log($email, $sys_id, $title, $content, $short_code);
            $res = Mail::send('emails', ['content' => $content], function ($message) use ($email, $title) {
                $to = $email;
                $message->to($to)->subject($title);
            });
        }
    } else {
        $error = 1;
    }
}
function send_msg_to_sp($sys_id = "",  $short_code = "")
{

    //$replace_arr没有返回数据
    //$sys_id是有值的
    $replace_arr = DB::table('case')
        ->join('service_provider', 'case.service_provider', '=', 'service_provider.company_id')
        ->join('company', 'case.service_provider', '=', 'company.company_id')
        ->select(
            'service_provider.first_name',
            'service_provider.last_name',
            'service_provider.email',
            'company.company_id',
            'company.name' //在数据库里面这个值是空
        )
        ->where('case.sys_id',  $sys_id)
        ->get();

        
    $templates_data = DB::table("notification_template")->where(["category" => $short_code])->get();
    
    if ($templates_data) {
        foreach ($templates_data as $template_data) {

            $title = $template_data->title;

            $content = $template_data->content;
            
            
            foreach ($replace_arr[0] as $replace_key => $replace_value) {

                $title = str_replace("[" . $replace_key . "]", $replace_value, $title);

                $content = str_replace("[" . $replace_key . "]", $replace_value, $content);
            }
            
            $email = $replace_arr[0]->email;
            send_msg_log($email, $sys_id, $title, $content, $short_code);
            $res = Mail::send('emails', ['content' => $content], function ($message) use ($email, $title) {
                $to = $email;
                $message->to($to)->subject($title);
            });
        }
        
    } else {
        $error = 1;
    }
}
function send_msg_client_creat($sys_id = "",  $short_code = "")
{
    
    $check = client::where('email', $sys_id)->first();
    
    if ($check) {
        $replace_arr = DB::table('client')
            ->select(
                'first_name',
                'last_name',
                'email',
                'token',
            )
            ->where('client.email', $sys_id)
            ->get();
    } else {
        
        $replace_arr = DB::table('case')
            ->join('client', 'case.client_id', '=', 'client.id')
            ->select(
                'client.first_name',
                'client.last_name',
                'client.email',
                'client.token',
            )
            ->where('case.sys_id',  $sys_id)
            ->get();

    }

    $url = url('api/Verification') . '/' . $replace_arr[0]->token;

    $templates_data = DB::table("notification_template")->where(["category" => $short_code])->get();
    

    $replace_arr[0]->token = $url;

    if ($templates_data) {
        foreach ($templates_data as $template_data) {

            $title = $template_data->title;

            $content = $template_data->content;

            foreach ($replace_arr[0] as $replace_key => $replace_value) {

                $title = str_replace("[" . $replace_key . "]", $replace_value, $title);

                $content = str_replace("[" . $replace_key . "]", $replace_value, $content);
            }

            $email = $replace_arr[0]->email;
            if ($check) {
            } else {
                send_msg_log($email, $sys_id, $title, $content, $short_code);
            }
            $res = Mail::send('emails', ['content' => $content], function ($message) use ($email, $title) {
                $to = $email;
                $message->to($to)->subject($title);
            });

        }
    } else {
        $error = 1;
    }
}

/**  
 *@params id: case id
 */
function view_attachment_log($id="")
{
    $case = DB::table('case')->where('id', $id)->first();

    DB::table('view_attachment_log')->insert([
        'case_id' => $id, 
        'case_sys_id' => $case->sys_id,
        'user_id' => session('login_info')['user_id'],
        'user_role' => IsRole(),
        'view_datetime' => date('Y-m-d H:i:s', time()),
        'ip' => request()->ip(),
        'browser' => getBrowser($_SERVER['HTTP_USER_AGENT']),
        'create_datetime' => date('Y-m-d H:i:s', time()),
        'status' => 1
    ]);
}
