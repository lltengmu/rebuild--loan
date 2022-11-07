<?php

namespace App\Http\Controllers\Individuals;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $list = DB::table('client')->get();
        return $list;
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
        $users = DB::select('SELECT * FROM `client` where `id` =' . $id . '');

        return $users;
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
            function getStr()
            {
                $strs = "QWERTYUIOPASDFGHJKLZXCVBNM1234567890qwertyuiopasdfghjklzxcvbnm";
                $str = substr(str_shuffle($strs), mt_rand(0, strlen($strs) - 11), 2);
                return $str;
            }
            $input = $request['json1'];
            $isHave = DB::table('client')
                ->where('id', $id)
                ->first();
            $isEmail = DB::table('client')
                ->where('email', $input['email'])
                ->first();
            $isHKID = DB::table('client')
                ->where('HKID', $input['HKID'])
                ->first();
            if ($isHave) {
                $res = DB::table('client')
                    ->where('id', $id)
                    ->update([
                        'first_name' => $input['first_name'], 'last_name' => $input['last_name'],
                        'date_of_birth' => $input['date_of_birth'], 'HKID' => $input['HKID'], 'addres' => $input['addres'],
                        'email' => $input['email'], 'nationality' => $input['nationality'], 'floor' => $input['floor'],
                        'unit' => $input['unit'], 'company_name' => $input['company_name'],
                        'company_contact' => $input['company_contact'], 'company_addres' => $input['company_addres'],
                        'mobile' => $input['mobile'], 'update_datetime' => date('Y-m-d H:i:s', time())
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
            } else if ($isEmail || $isHKID) {
                return $data = [
                    'status' => 2,
                    'message' => '此用户已存在',
                ];
            } else {
                $token = date("Y") . getStr() . date("m") . getStr() . date("d") . getStr() . date("H") . getStr() . date("i") . getStr() . date("s");
                $isClient_email = DB::table('client')->where('email', $input['email'])->first();
                $isservice_provider_email = DB::table('service_provider')->where('email', $input['email'])->first();
                $isindividual_email = DB::table('individual')->where('email', $input['email'])->first();
                if ($isClient_email || $isservice_provider_email || $isindividual_email) {
                    $data = [
                        'status' => 3,
                        'message' => 'Email 已存在'
                    ];
                    return $data;
                }
                $res = DB::table('client')
                    ->insert([
                        'first_name' => $input['first_name'], 'last_name' => $input['last_name'],
                        'date_of_birth' => $input['date_of_birth'], 'HKID' => $input['HKID'], 'addres' => $input['addres'],
                        'email' => $input['email'], 'nationality' => $input['nationality'], 'floor' => $input['floor'],
                        'unit' => $input['unit'], 'company_name' => $input['company_name'], 'status' => 2,
                        'company_contact' => $input['company_contact'], 'company_addres' => $input['company_addres'],
                        'token' => $token, 'appellation' => $input['lbo_appellation'],
                        'mobile' => $input['mobile'], 'create_datetime' => date('Y-m-d H:i:s', time()),'update_datetime' => date('Y-m-d H:i:s', time()),
                    ]);
                $id = DB::table('client')->where('HKID', $input['HKID'])->value('token');
                // send email
                send_msg_client_creat($input['email'],'client_create');
                if ($res) {
                    // sp_savetolog('client', $id, 'id');
                    $data = [
                        'id' => $id,
                        'status' => 1,
                        'message' => '創建成功',
                    ];
                } else {
                    $data = [
                        'status' => 0,
                        'message' => '創建失敗'
                    ];
                }
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
        //
        // $user = DB::table('individual')->where('id', $id)->first();
        $res = DB::delete('delete from client where id="' . $id . '"');
        if ($res) {
            $data = [
                'status' => 1,
                'message' => '刪除成功'
            ];
        } else {
            $data = [
                'status' => 0,
                'message' => '刪除失敗'
            ];
        }
        return $data;
    }
}
