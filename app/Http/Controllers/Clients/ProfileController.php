<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            $input = $request['json1'];
            $res = DB::table('client')
                ->where('id', $id)
                ->update([
                    'appellation' => $input['appellation'],
                    'addres' => $input['addres'],
                    'area' => $input['area'],
                    'building' => $input['building'],
                    'company_addres' => $input['company_addres'],
                    'company_contact' => $input['company_contact'],
                    'company_name' => $input['company_name'],
                    'date_of_birth' => $input['date_of_birth'],
                    'floor' => $input['floor'],
                    'job_status' => $input['job_status'],
                    'nationality' => $input['nationality'],
                    'unit' => $input['unit'],
                    'mobile' => $input['mobile'],
                    'update_datetime' => date('Y-m-d H:i:s', time()),
                    'update_by' => IsRole(),
                ]);

            if ($res) {
                sp_savetolog('client', $id, 'id');
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
