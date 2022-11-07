<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Models\attachment;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    // 获得client上传的文件
    public function GetFile($id)
    {
        $res = attachment::where(['client_id' => session()->get('login_info.user_id'), 'case_id' => $id])->get();
        //添加记录到view_attachment_log
        view_attachment_log($id);
        if (count($res) > 0) {
            return $res;
        } else {
            return '未上傳文件';
        }
    }
    public function delupload($id)
    {
        $res = attachment::where('id', $id)->delete();
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
