<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientsController extends Controller
{
    public function clients()
    {
        $lbo_appellation = DB::table('lbo_appellation')->get();
        $lbo_district = DB::table('lbo_district')->get();
        $lbo_employment = DB::table('lbo_employment')->get();
        $lbo_loan_purpose = DB::table('lbo_loan_purpose')->get();
        return view('form', ['lbo_district' => $lbo_district, 'lbo_appellation' => $lbo_appellation, 'lbo_loan_purpose' => $lbo_loan_purpose, 'lbo_employment' => $lbo_employment]);
    }
    public function page()
    {
        $imgsrc = DB::select('select id,template_photo,template_text from loan_template where id = (select max(id) from loan_template)');
        return view('/page', ['imgsrc' => $imgsrc]);
    }
    public function case()
    {
        $user = DB::table('client')->where('email', session()->get('email'))->get();
        $splist = DB::table("company")->where('status', '1')->get();
        $lbo_loan_purpose = DB::table('lbo_loan_purpose')->get();
        $attachment = DB::table('attachment')->get();
        return view('clients/case', ['splist' => $splist, 'user' => $user[0], 'lbo_loan_purpose' => $lbo_loan_purpose, 'attachment' => $attachment])->with('user_type', 'client');
    }
    public function details()
    {
        $splist = DB::table("company")->where('status', '1')->get();
        return view('clients/details', ['splist' => $splist])->with('user_type', 'client');;
    }
    public function profile()
    {
        $clients = DB::table('client')->where('email', session()->get('email'))->get();
        $applletions = DB::table('lbo_appellation')->select('id', 'label_tc')->get();
        $area = DB::table('lbo_district')->select('id', 'label_tc')->get();
        $jobs = DB::table('lbo_employment')->select('id', 'label_tc')->get();

        return view('clients/profile', [
            'clients'     => $clients[0],
            'applletions' => $applletions,
            'area'        => $area,
            'jobs'        => $jobs
        ])->with('user_type', 'client');
        // return $applletion;
        // return $clients[0];

    }
}
