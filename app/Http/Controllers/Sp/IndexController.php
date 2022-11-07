<?php

namespace App\Http\Controllers\Sp;

use App\Http\Controllers\Controller;
use App\Models\attachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class IndexController extends Controller
{
    //
    public function cancel($id)
    {
        $isindividual = DB::table('individual')->where('email', session()->get('email'))->first();
        $isSp = DB::table('service_provider')->where('email', session()->get('email'))->first();
        $handle = '';
        if ($isindividual) {
            $handle = "individual_" . $isindividual->id;
        }

        if ($isSp) {
            $handle = 'sp_' . $isSp->company_staff_id;
        }
        $res = DB::table('case')->where('id', $id)->update([
            'loan_interest' => Null, 'date_of_pay' => Null, 'case_status' => 2, 'update_datetime' => date('Y-m-d H:i:s'), 'update_by' => $handle,
        ]);
        if ($res) {
            sp_savetolog('case', $id, 'id');
            $data = [
                'status' => 1,
                'message' => '撤回成功',
            ];
        } else {
            $data = [
                'status' => 0,
                'message' => '撤回成功'
            ];
        }
        return $data;
    }
    //获得client上传的文件路径
    public function getFileUrl($id)
    {
        $res = attachment::where('case_id', $id)->get();
        //添加观看记录到DB 传递的参数是case 的 id
        view_attachment_log($id);

        if(count($res) > 0){
            return $res;
        }else{
            return '未上傳文件';
        }
    }
}
