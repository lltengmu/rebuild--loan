<?php

namespace App\Http\Controllers\Individuals;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SpController extends Controller
{
    //
    public function splist()
    {
        $list = DB::table('service_provider as sp')
            ->join('company', 'sp.company_id', '=', 'company.company_id')
            ->select('sp.company_staff_id', 'sp.first_name', 'sp.last_name', 'sp.email', 'sp.status', 'company.name')
            ->get();
        return $list;
    }
    public function show($id)
    {
        $list = DB::table('service_provider')
            ->where('company_staff_id', $id)
            ->get();
        return $list;
    }
    public function status(Request $request)
    {
        $input = $request['data'];
        $isMe = DB::table('service_provider')
            ->where('email', session()->get('email'))
            ->value('company_staff_id');
        if ($isMe == $input['id']) {
            $data = [
                'status' => 0,
                'message' => '自己的賬號禁止禁用',
            ];
            return $data;
        }
        $res = DB::table('service_provider')
            ->where('company_staff_id', $input['id'])
            ->update(['status' => $input['status'], 'update_datetime' => date('Y-m-d H:i:s', time())]);

        if ($res) {
            sp_savetolog('service_provider', $input['id'], 'company_staff_id');
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
    public function create(Request $request, $id)
    {
        $input = $request->json1;

        $result = DB::table('service_provider')->where('company_staff_id', $id)->first();
        if (!$result) {
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
            $res = DB::table('service_provider')
                ->insert([
                    'email' => $input['email'], 'password' => sha1($input['password']), 'first_name' => $input['first_name'], 'last_name' => $input['last_name'],
                    'mobile' => $input['mobile'], 'contact' => $input['contact'], 'company_id' => $input['company_id'], 'status' => 1,
                    'create_datetime' => date('Y-m-d H:i:s', time()),'update_datetime' => date('Y-m-d H:i:s', time()),
                ]);
            if ($res) {
                sp_savetolog('service_provider', $input['email'], 'email');
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
            return $data;
        } else {
            $res = DB::table('service_provider')
                ->where('company_staff_id', $id)
                ->update([
                    'first_name' => $input['first_name'], 'last_name' => $input['last_name'], 'password' => $input['password'],
                    'mobile' => $input['mobile'], 'contact' => $input['contact'], 'company_id' => $input['company_id'],
                    'update_datetime' => date('Y-m-d H:i:s', time())
                ]);
            if ($res) {
                sp_savetolog('service_provider', $id, 'company_staff_id');
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
    public function delete($id)
    {
        $res = DB::delete('delete from service_provider where company_staff_id="' . $id . '"');
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
