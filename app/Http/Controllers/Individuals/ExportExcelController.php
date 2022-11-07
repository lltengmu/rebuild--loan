<?php

namespace App\Http\Controllers\Individuals;

use App\Http\Controllers\Controller;
use App\Imports\Import;
use App\Imports\SpCaseImport;
use App\Models\attachment;
use App\Models\caseModel;
use App\Models\client;
use App\Models\import_log;
use App\Models\service_provider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;

class ExportExcelController extends Controller
{
    //
    public function caseExcel($id)
    {
        //
        $input = explode('&', $id);
        $data = array_filter($input);
        $data1 = [[
            'ID' => "123",
            '名字' => '',
            '姓氏' => '',
            '貸款額' => '',
            '付款金額' => '',
            '付款日期' => '',
            '付款方式' => '',
            '無需付款' => '',
            '還款期' => '',
            '共同簽字人姓名' => '',
            '共同簽字人姓氏' => '',
            '提交至服務提供商' => '',
            '狀態' => '',
        ]];
        foreach ($data as $k) {
            $db = DB::table('case')
                ->join('client', 'case.client_id', '=', 'client.id')
                ->join('company', 'case.service_provider', '=', 'company.company_id')
                ->join('lbo_case_status', 'case.case_status', '=', 'lbo_case_status.id')
                ->where('case.id', $k)
                ->select(
                    'case.id',
                    'client.first_name',
                    'client.last_name',
                    'case.loan_amount',
                    'case.payment_amount',
                    'case.date_of_pay',
                    'case.payment_method',
                    'case.no_of_payment',
                    'case.repayment_period',
                    'case.co_signer_first_name',
                    'case.co_signer_last_name',
                    'company.name',
                    'lbo_case_status.label_tc'
                )
                ->get();
            array_push($data1, $db[0]);
        }

        header('Content-Encoding: UTF-8');
        header("Content-type:application/vnd.ms-excel;charset=UTF-8");
        header('Content-Disposition: attachment;filename="貸款信息.csv"');

        //打开php标准输出流
        $fp = fopen('php://output', 'a');

        //添加BOM头，以UTF8编码导出CSV文件，如果文件头未添加BOM头，打开会出现乱码。
        fwrite($fp, chr(0xEF) . chr(0xBB) . chr(0xBF));

        //添加导出标题
        $title = [];
        foreach ($data1[0] as $key => $val) {
            $title[] = $key;
        }

        fputcsv($fp, $title);

        //添加db數據


        foreach ($data as $key => $val) {

            $content = [];
            foreach ($data1[$key + 1] as $item) {
                $content[] = $item;
            }
            fputcsv($fp, $content);
        }


        //刷新緩衝區
        // ob_flush();
        // flush();

        //关闭打开的文件
        fclose($fp);
    }
    public function clientExcel($id)
    {
        //
        $input = explode('&', $id);
        $data = array_filter($input);
        $data1 = [[
            'ID' => "",
            '電郵' => '',
            '名字' => '',
            '姓氏' => '',
            'HKID' => '',
            '出生日期' => '',
            '電話' => '',
            '國籍' => '',
            '地區' => '',
            '地址' => '',
            '建築' => '',
            '樓層' => '',
            '單元' => '',
            '公司名稱' => '',
            '公司聯絡人' => '',
            '公司地址' => '',
        ]];
        foreach ($data as $k) {
            $db = DB::table('client')
                ->where('client.id', $k)
                ->select(
                    'id',
                    'email',
                    'first_name',
                    'last_name',
                    'HKID',
                    'date_of_birth',
                    'mobile',
                    'nationality',
                    'area',
                    'addres',
                    'building',
                    'floor',
                    'unit',
                    'company_name',
                    'company_contact',
                    'company_addres',
                )
                ->get();
            array_push($data1, $db[0]);
        }

        header('Content-Encoding: UTF-8');
        header("Content-type:application/vnd.ms-excel;charset=UTF-8");
        header('Content-Disposition: attachment;filename="貸款用戶信息.csv"');

        //打开php标准输出流
        $fp = fopen('php://output', 'a');

        //添加BOM头，以UTF8编码导出CSV文件，如果文件头未添加BOM头，打开会出现乱码。
        fwrite($fp, chr(0xEF) . chr(0xBB) . chr(0xBF));

        //添加导出标题
        $title = [];
        foreach ($data1[0] as $key => $val) {
            $title[] = $key;
        }

        fputcsv($fp, $title);

        //添加db數據


        foreach ($data as $key => $val) {

            $content = [];
            foreach ($data1[$key + 1] as $item) {
                $content[] = $item;
            }
            fputcsv($fp, $content);
        }


        //刷新緩衝區
        // ob_flush();
        // flush();

        //关闭打开的文件
        fclose($fp);
    }
    public function getAllid($id)
    {
        if ($id == 1) {
            $user = DB::table('service_provider')->where('email', session()->get('email'))->value('company_id');
            $Allid = DB::table('case')->where('service_provider', $user)->select('id')->get()->toArray();
        }
        if ($id == 2) {
            $Allid = DB::table('client')->select('id')->get()->toArray();
        } else {
            $Allid = DB::table('case')->select('id')->get()->toArray();
        }
        $list = [];
        foreach ($Allid as $key => $val) {
            foreach ($val as $k => $v) {
                array_push($list, $v);
            }
        }
        return $list;
    }
    public function import(Request $request)
    {
        $Ymd = date("Ymd");
        $path = storage_path('Excel/' . $Ymd);
        File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);
        $file = $request->file('file');
        $ExcelName = time() . '.' . $file->getClientOriginalExtension();
        $file->move(storage_path('Excel/Individual/' . $Ymd), $ExcelName);
        Excel::import(new Import, storage_path('Excel/Individual/' . $Ymd . '/' . $ExcelName));
        return redirect('individual/case')->with('success', 'All good!');
    }
    public function Spcaseimport(Request $request)
    {
        $sys_id = date("Ym") . getStr() . date('d');
        $Ymd = date("Ymd");
        $path = storage_path('Excel/sp/' . $Ymd);
        File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);
        $file = $request->file('file');
        $ExcelName = time() . '.' . $file->getClientOriginalExtension();
        $file->move(storage_path('Excel/sp/' . $Ymd), $ExcelName);
        // Excel::import(new SpCaseImport, storage_path('Excel/sp/' . $Ymd . '/' . $ExcelName));
        $c = 0;
        if ($request->hasFile('file')) {
            // $file = $request->file('file')->store('/excel');
            $tmp_file = storage_path('Excel/sp/' . $Ymd . '/' . $ExcelName);
            $data = (new Spcaseimport())->toArray($tmp_file);
            //return $data;
            if (!empty($data)) {
                $arr0 = array_shift($data[0]); //删除Excel第一行[标题]
                $arr = $data[0];
                //过滤掉HKID 为 null 的数据
                $new_arr = array_filter($arr,function($a){
                    return $a[3] != null;
                });
                foreach ($new_arr as $rows) {
                    
                    $company = service_provider::where('company_staff_id', session()->get('login_info.user_id'))->value('company_id');
                    $token = date("Y") . getStr() . date("m") . getStr() . date("d") . getStr() . date("H") . getStr() . date("i") . getStr() . date("s");
                    $allAppellation = DB::table('lbo_appellation')->get();
                    $areaArrays = DB::table('lbo_district')->get();
                    $jobArrays = DB::table('lbo_employment')->get();
                    $loanForArrays = DB::table('lbo_loan_purpose')->get();
                    //称谓默认为 0 (小姐)
                    $client_appellation = 0;
                    //area默认是1 (港岛)
                    $area = 1;
                    //job_status默认是 1(受雇)
                    $job = 1;
                    //默认贷款用途1 （一般个人开支）
                    $purpose = 1;

                    foreach($allAppellation as $key => $appellation){
                        if($appellation->label_tc == $rows[0]){
                            $client_appellation = $appellation->id;
                        };
                    }
                    foreach($areaArrays as $areaArray){
                        if($areaArray->label_tc == $rows[22]){
                            $area = $areaArray->id;
                        };
                    }
                    foreach($jobArrays as $jobArray){
                        if($jobArray->label_tc == $rows[23]){
                            $job = $jobArray->id;
                        };
                    }
                    foreach($loanForArrays as $loanForArray){
                        if($loanForArray->label_tc == $rows[28]){
                            $purpose = $loanForArray->id;
                        };
                    }
                    $Isclient = client::where('HKID', $rows[3])->first();
                    //return $rows;
                    //新增或者更新用户数据
                    client::updateOrCreate(
                        ['HKID' => $rows[3]],//根据 HKID 字段判断客户原来是否存在
                        [
                            'appellation' => $client_appellation,
                            'first_name' => $rows[1],
                            'last_name' => $rows[2],
                            'HKID' => $rows[3],
                            'email' => $rows[4],
                            'status' => 2,
                            'ip' => request()->ip(),
                            'browser' => getBrowser($_SERVER['HTTP_USER_AGENT']),
                            'token' => $token,
                            'mobile' => $rows[15],
                            'nationality' => $rows[16],
                            'unit' => $rows[17],
                            'floor'=>$rows[18],
                            'building' => $rows[19],
                            'address1' => $rows[20],
                            'address2' => $rows[21],
                            'area' => $area,
                            'job_status' => $job,
                            'salary' => $rows[24],
                            'company_name' => $rows[25],
                            'company_contact' => $rows[26],
                            'company_addres' => $rows[27],
                            'date_of_birth' => $rows[29],
                            'update_datetime' => date('Y-m-d H:i:s'),
                            'update_by' => IsRole()
                        ]
                    );
                    //新增用户时插入 create_datetime 字段
                    !$Isclient && client::where("HKID",$rows[3])->update(['create_datetime' => date('Y-m-d H:i:s')]);
                    //向新增的用户发送邮件设置密码
                    !$Isclient && send_msg_client_creat($rows[4], 'client_create');
                    //获取其 id 值
                    $client_id=client::where('HKID', $rows[3])->value('id');
                    //增加贷款记录
                    $item = caseModel::create([
                        'sys_id' => $sys_id,
                        'service_provider' => $company,
                        'case_status' => 1,
                        'client_id' => $client_id,
                        'loan_amount' => $rows[5],
                        'payment_amount' => $rows[6],
                        'date_of_pay' => $rows[7],
                        // 'loan_amount' => $rows[5],
                        // 'loan_amount' => $rows[6],
                        'repayment_period' => $rows[10],
                        'co_signer_first_name' => $rows[11],
                        'co_signer_last_name' => $rows[12],
                        'status' => 1,
                        'create_datetime' => date('Y-m-d H:i:s'),
                        'update_datetime' => date('Y-m-d H:i:s'),
                        'handle_by' => IsRole(),
                        'update_by' => IsRole(),
                        'purpose' => $purpose,
                    ]);
                    
                    if ($item) {
                        $c++;
                    } else {
                        exit(json_encode(array('code' => 1, 'msg' => "部分数据上传失败，已上传" . $c . "条！")));
                        // return redirect('individual/case')->with('success', 'All good!');
                    }
                }
                // exit(json_encode(array('code' => 1, 'msg' => '全部提交成功！')));
                return redirect('sp/caseapply')->with('success', 'All good!');
            } else {
                exit(json_encode(array('code' => 0, 'msg' => '无文件上传！')));
            }
        } else {
            exit(json_encode(array('code' => 0, 'msg' => '请选择上传文件！')));
        }
    }
    public function Individualcaseimport(Request $request)
    {
        $sys_id = date("Ym") . getStr() . date('d');
        $Ymd = date("Ymd");
        $path = storage_path('Excel/Individual/' . $Ymd);
        File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);
        $file = $request->file('file');
        $ExcelName = time() . '.' . $file->getClientOriginalExtension();
        $file->move(storage_path('Excel/Individual/' . $Ymd), $ExcelName);
        // Excel::import(new SpCaseImport, storage_path('Excel/Individual/' . $Ymd . '/' . $ExcelName));

        $c = 0;
        if ($request->hasFile('file')) {
            // $file = $request->file('file')->store('/excel');
            $tmp_file = storage_path('Excel/Individual/' . $Ymd . '/' . $ExcelName);
            $data = (new Spcaseimport())->toArray($tmp_file);//获取到excel表格的数据 一行是一条数据,表头也算一条数据
            if (!empty($data)) {
                $arr0 = array_shift($data[0]); //删除Excel第一行[标题] 去掉表头行
                $arr = $data[0];
                //过滤掉HKID 为 null 的数据
                $new_arr = array_filter($arr,function($a){
                    return $a[3] != null;
                });
                //对excel表格进行循环遍历
                foreach ($new_arr as $rows) {//$rows指向excel单条数据实例
                    //查看数据提交的sp是否存在
                    $company = DB::table('company')->where('name', $rows[13])->value('company_id');
                    if (!$company) {
                        $company = 0;
                    }
                    $token = date("Y") . getStr() . date("m") . getStr() . date("d") . getStr() . date("H") . getStr() . date("i") . getStr() . date("s");
                    
                    $allAppellation = DB::table('lbo_appellation')->get();
                    $areaArrays = DB::table('lbo_district')->get();
                    $jobArrays = DB::table('lbo_employment')->get();
                    $loanForArrays = DB::table('lbo_loan_purpose')->get();
                    //称谓默认为 0 (小姐)
                    $client_appellation = 0;
                    //area默认是1 (港岛)
                    $area = 1;
                    //job_status默认是 1(受雇)
                    $job = 1;
                    //默认贷款用途1 （一般个人开支）
                    $purpose = 1;
                    foreach($allAppellation as $appellation){
                        if($appellation->label_tc == $rows[0]){
                            $client_appellation = $appellation->id;
                        };
                    }
                    foreach($areaArrays as $areaArray){
                        if($areaArray->label_tc == $rows[22]){
                            $area = $areaArray->id;
                        };
                    }
                    foreach($jobArrays as $jobArray){
                        if($jobArray->label_tc == $rows[23]){
                            $job = $jobArray->id;
                        };
                    }
                    foreach($loanForArrays as $loanForArray){
                        if($loanForArray->label_tc == $rows[28]){
                            $purpose = $loanForArray->id;
                        };
                    }
                    //通过 HKID 查看客户是否已经存在
                    $Isclient = client::where('HKID', $rows[3])->first();
                    client::updateOrCreate(
                        ['HKID' => $rows[3]],//根据 HKID 字段判断客户原来是否存在
                        [
                            'appellation' => $client_appellation,
                            'first_name' => $rows[1],
                            'last_name' => $rows[2],
                            'HKID' => $rows[3],
                            'email' => $rows[4],
                            'status' => 2,
                            'ip' => request()->ip(),
                            'browser' => getBrowser($_SERVER['HTTP_USER_AGENT']),
                            'token' => $token,
                            'mobile' => $rows[15],
                            'nationality' => $rows[16],
                            'unit' => $rows[17],
                            'floor'=>$rows[18],
                            'building' => $rows[19],
                            'address1' => $rows[20],
                            'address2' => $rows[21],
                            'area' => $area,
                            'job_status' => $job,
                            'salary' => $rows[24],
                            'company_name' => $rows[25],
                            'company_contact' => $rows[26],
                            'company_addres' => $rows[27],
                            'date_of_birth' => $rows[29],
                            'update_datetime' => date('Y-m-d H:i:s'),
                            'update_by' => IsRole()
                        ]
                    );
                    //新增用户时更新 create_datetime 字段
                    !$Isclient && client::where("HKID",$rows[3])->update(['create_datetime' => date('Y-m-d H:i:s')]);
                    //向新增的用户发送邮件设置密码
                    !$Isclient && send_msg_client_creat($rows[4],'client_create');
                    //获取用户 id 值
                    $client_id=client::where('HKID', $rows[3])->value('id');
                    //增加贷款记录
                    $item = caseModel::create([
                        'sys_id' => $sys_id,
                        'service_provider' => $company,
                        'case_status' => 1,
                        'client_id' => $client_id,
                        'loan_amount' => $rows[5],
                        'payment_amount' => $rows[6],
                        'date_of_pay' => $rows[7],
                        // 'loan_amount' => $rows[5],
                        // 'loan_amount' => $rows[6],
                        'repayment_period' => $rows[10],
                        'co_signer_first_name' => $rows[11],
                        'co_signer_last_name' => $rows[12],
                        'status' => 1,
                        'create_datetime' => date('Y-m-d H:i:s'),
                        'update_datetime' => date('Y-m-d H:i:s'),
                        'handle_by' => IsRole(),
                        'update_by' => IsRole(),
                        'purpose' => $purpose,
                    ]);
                    if ($item) {
                        $c++;
                    } else {
                        exit(json_encode(array('code' => 1, 'msg' => "部分数据上传失败，已上传" . $c . "条！")));
                        // return redirect('individual/case')->with('success', 'All good!');
                    }
                }
                // exit(json_encode(array('code' => 1, 'msg' => '全部提交成功！')));

                return redirect('individual/case')->with('success', 'All good!');
            } else {
                exit(json_encode(array('code' => 0, 'msg' => '无文件上传！')));
            }
        } else {
            exit(json_encode(array('code' => 0, 'msg' => '请选择上传文件！')));
        }
    }
    public function Clientcaseimport(Request $request)
    {
        $Ymd = date("Ymd");
        $path = public_path('File/client/upload/' . $Ymd);
        File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);
        $file = $request->file('file');
        $ExcelName = $file->getClientOriginalName();
        $time = time();
        $res = $file->move(public_path('File/client/upload/' . $Ymd . '/' . $time), $ExcelName);
        $path1 = 'File/client/upload/' . $Ymd . '/' . $time . '/' . $ExcelName;
        $date = date('Y-m-d H:i:s');
        $count_Import = attachment::where(['client_id' => session()->get('login_info.user_id'), 'case_id' => $request['case_id']])->get();
        if ($res) {
            if (count($count_Import) < 5) {
                $result = DB::table('attachment')->insert([
                    'case_id' => $request['case_id'], 'client_id' => session()->get('login_info.user_id'), 'upload_file' => $path1,
                    'file_type' => $file->getClientOriginalExtension(), 'status' => 1, 'create_datetime' => $date,
                    'update_datetime' => $date, 'update_by' => 'client_' . session()->get('login_info.user_id'),
                ]);
                $importLog = import_log::insert([
                    'file_name' =>  $ExcelName,
                    'file_type' => $file->getClientOriginalExtension(),
                    'file_path' => $path1,
                    'create_datetime' => date('Y-m-d H:i:s'),
                    'ip' => request()->ip(),
                    'create_by' => IsRole(),
                    'status' => 1
                ]);
            } else {
                return redirect('clients/case')->withErrors(['msg' => '2']);
            }
            sp_savetolog('attachment', $date, 'update_datetime');
        }
        return redirect('clients/case')->withErrors(['msg' => '1']);
    }
}
