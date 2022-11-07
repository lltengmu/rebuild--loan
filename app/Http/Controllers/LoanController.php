<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\LOG;
class LoanController extends Controller
{
    public function form()
    {
		return view('test')->with('user_type','staff');
    }

	public function store(Request $request){
		DB::table('client')
		->insert([
			'last_name' => $request->input('last_name'),
			'first_name' => $request->input('first_name'),
			'HKID' => $request->input('HKID'),
			'date_of_birth' =>  $request->input('date_of_birth'),
			'marital_status' => $request->input('marital_status'),
			'mobile' => $request->input('mobile'),
			'email' => $request->input('email'),
			'nationality' =>$request->input('nationality'),
			'area' => '1',
			'addres' => $request->input('addres'),
			'building' => $request->input('building'),
			'floor' => $request->input('floor'),
			'unit' => $request->input('unit'),
			'job_status' => '1',
			'company_name' => $request->input('company_name'),
			'company_contact' => $request->input('company_contact'),
			'company_addres' => $request->input('company_addres'),
			'ip' => '123.123.123.123',
			'device' => '1',
			'status' => '1',
			'create_datetime' => date('Y-m-d H:i:s'),
			'update_datetime' => date('Y-m-d H:i:s'),


		]);
		
	}

	public function db(){
		$result=DB::table('case')->first();
		print_r($result);
	}
}






