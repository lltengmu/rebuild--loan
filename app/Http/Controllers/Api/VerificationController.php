<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VerificationController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = DB::table('admin')->get();

        return $this->create($data, '数据传输成功', 200);
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
        $id = DB::table('client')->where('token', $id)->value('id');
        $res = DB::table('client')->where('id', $id)->value('status');


        if ($res == 2) {
            return view('clients/verification', ['id' => $id]);
        } else {
            return '已設置過密碼';
        }
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

        $psw = $request['psw'];
        $res = DB::table('client')->where('id', $id)->update(['password' => sha1($psw)]);
        if ($res) {
            $result = DB::table('client')->where('id', $id)->update(['status' => 1, 'update_datetime' => date('Y-m-d H:i:s')]);
            return 'true';
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
