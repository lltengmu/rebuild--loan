<?php

namespace App\Http\Controllers\Individuals;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $list = DB::table('individual')->get();
        return $list;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //密码正则表达式 ：^(?![0-9]+$)(?![a-z]+$)(?![A-Z]+$)(?!([^(0-9a-zA-Z)])+$).{8,20}$


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

        $input = $request['data'];
        $isMe = DB::table('individual')
            ->where('email', session()->get('email'))
            ->value('id');
        if ($isMe == $input['id']) {
            $data = [
                'status' => 0,
                'message' => '自己的賬號禁止禁用',
            ];
            return $data;
        }
        $res = DB::table('individual')
            ->where('id', $input['id'])
            ->update(['status' => $input['status'], 'update_datetime' => date('Y-m-d H:i:s', time())]);

        if ($res) {
            sp_savetolog('individual', $input['id'], 'id');
            if ($input['status'] == 1) {
                $data = [
                    'status' => 1,
                    'message' => '啓用成功',
                ];
            } else {
                $data = [
                    'status' => 1,
                    'message' => '禁用成功',
                ];
            }
        } else {
            if ($input['status'] == 1) {
                $data = [
                    'status' => 0,
                    'message' => '啓用失敗',
                ];
            } else {
                $data = [
                    'status' => 0,
                    'message' => '禁用失敗',
                ];
            }
        }
        return $data;
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
        $users = DB::select('SELECT * FROM `individual` where `id` =' . $id . '');

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
            $result = DB::table('individual')->find($id);
            $input = $request['data1'];
            if (!$result) {
                $result = DB::table('individual')->where('email', $input['email'])->first();
                if ($result) {
                    $data = [
                        'status' => 3,
                        'message' => '郵箱已存在',
                    ];
                } else if ($input['email'] == '') {
                    $data = [
                        'status' => 4,
                        'message' => '請輸入郵箱',
                    ];
                } else {
                    $res = DB::table('individual')
                        ->insert([
                            'email' => $input['email'], 
                            'first_name' => $input['first_name'], 
                            'last_name' => $input['last_name'],
                            'mobile' => $input['mobile'], 
                            'contact' => $input['contact'], 
                            'status' => 1, 
                            'create_datetime' => date('Y-m-d H:i:s', time()),
                            'password' => sha1($input['password']),
                        ]);
                    if ($res) {
                        sp_savetolog('individual', $input['email'], 'email');
                        $data = [
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
            } else {
                // $res = DB::update(
                //     'update individual set first_name=' . $input['first_name'] . ',last_name=' . $input['last_name'] . ' where id = ' . $id . ''
                // );
                $res = DB::table('individual')
                    ->where('id', $id)
                    ->update([
                        'first_name' => $input['first_name'], 'last_name' => $input['last_name'],
                        'mobile' => $input['mobile'], 'contact' => $input['contact'], 'update_datetime' => date('Y-m-d H:i:s', time())
                    ]);
                if ($res) {
                    sp_savetolog('individual', $id, 'id');
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
        // $user = DB::table('individual')->where('id', $id)->first();
        $res = DB::delete('delete from individual where id="' . $id . '"');
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
