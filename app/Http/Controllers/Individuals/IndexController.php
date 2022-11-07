<?php

namespace App\Http\Controllers\Individuals;

use App\Http\Controllers\Controller;
use App\Models\export_log;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function exportLog($id)
    {
        $res = export_log::insert([
            'file_name' => '贷款信息',
            'file_type' => 'csv',
            'file_path' => 'case_id' . $id,
            'create_datetime' => date('Y-m-d H:i:s'),
            'ip' => request()->ip(),
            'create_by' => IsRole(),
            'status' => 1
        ]);
        if($res){
            return true;
        }
    }
}
