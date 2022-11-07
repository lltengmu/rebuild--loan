<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
//use App\Models\Donate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\LOG;
class DonateController extends Controller
{
    public function index()
    {
		$donation_plan = DB::table('donation_plan')->where('status', '1')->get();
		$channel = DB::table('lbo_channel')->get();
		
		$title= DB::table('lbo_title')->get();
		$donation_methods= DB::table('lbo_donation_methods')->get();
		$plan_size = sizeof($donation_plan);
        return view('donate-form', ['plan_size' => $plan_size])
		->with('donation_plan', $donation_plan)
		->with('donation_methods', $donation_methods)
		->with('channel', $channel)
		->with('title', $title)
		;
    }
    public function store(Request $request)
    {
      /*  $post = new Donate;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();
*/
/*
		 DB::table('referral_case_summary')
						->insert([
							'case_id' => $case_id->referral_case_id,
							'case_summary' => json_encode($request->input('case_summary')),
							'case_summary_other' => $request->input('case_summary_other'),
							'status' => '1',
							'create_datetime' => date('Y-m-d H:i:s'),
							'update_datetime' => date('Y-m-d H:i:s'),
							'update_by' => session('counsellor_sp_id'),
							'case_sys_id' => $case_sys_id
						]);
						*/
		 DB::table('donation_record')
						->insert([
							'title' => $request->input('donationtitle'),
							'last_name' => $request->input('donationlastname'),
							'first_name' => $request->input('donationfirstname'),
							'contact_no' => $request->input('mobile'),
							'email' =>  $request->input('email'),
							'amount' => '1',
							'amount_input' => $request->input('donationvalue'),
							'channel' => $request->input('donation_channel'),
							'personal_Information_statement' =>$request->input('promote'),
							'donation_type' => '1',
							'donation_event_id' => $request->input('donationplan'),
							'donate_status' => '1',
							'donation_methods' => $request->input('donation_methods'),
							'address' => $request->input('donationeaddress'),
							'create_datetime' => date('Y-m-d H:i:s'),
							'update_datetime' => date('Y-m-d H:i:s'),


						]);
						
						
        return redirect('store-form')->with('status', 'store form');
    }
}






