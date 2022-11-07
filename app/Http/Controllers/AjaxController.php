<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use DataTables;
class AjaxController extends Controller
{
    public function create()
    {

      return response()->json(['success'=>'Ajax request submitted successfully']);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        
        return response()->json(['success'=>'Ajax request submitted successfully']);
    }

    public function getStaff(Request $request)
    {
        $staff = DB::table('service_provider')->where([
          ['role_id', '=', 'RI_SUP'],
          ['organization_id', '=', $request->input('orgId')],
          ['status','1']
        ])->get();
          $a="";

        for($i=0;$i<sizeof($staff);$i++){
          $a .= '<option value="'.$staff[$i]->service_provider_id.'">'.$staff[$i]->sp_first_name.' '.$staff[$i]->sp_last_name.' ('.$staff[$i]->email.')</option>';
        }
        return $a;  

    }

    public function getOrg(Request $request)
    {
        // $staff = DB::table('nature_of_service')->join('organization','nature_of_service.organization_id','organization.organization_id')->where([
        //   ['nature_of_service.status','1'],
        //   ['nature_of_service.service_id',$request->input('service_Id')],
        //   ])->get();
          $staff = DB::table('nature_of_service')
          ->join('organization','nature_of_service.organization_id','organization.organization_id')
          ->where([['nature_of_service.status','1'],['nature_of_service.service_id',$request->input('cateId')]])->get();
          $a="";

        for($i=0;$i<sizeof($staff);$i++){
          $a .= '<option value="'.$staff[$i]->organization_id.'">'.$staff[$i]->org_name.' ('.$staff[$i]->email.')</option>';
        }
        return $a;  

    }

    public function getCaseStatus(Request $request)
    {
      if(session('ind_role_id') === 'RO_SUP'){
        if($request->status!='ALL'){       
            $data = DB::table('referral_case')
                      ->select('case_sys_id as caseNo','client.client_first_name_en','client.client_last_name_en', 'referral_case.case_number', 'referral_case.update_datetime', 'lbo_case_status.label_en')
                      ->join('client', 'referral_case.client_id', '=', 'client.client_id')
                      ->join('service_provider', 'referral_case.counsellor_id', '=', 'service_provider.service_provider_id')
                      ->join('lbo_case_status', 'referral_case.referral_status', '=', 'lbo_case_status.short_code')
                      ->where([['referral_case.status','=','1'],['referral_status',$request->status],['referral_case.ro_organization_id',session('service_provider_org_id')]])
                      ->orderBy('update_datetime','desc')
                      ->get();
        }else{
            $data = DB::table('referral_case')
            ->select('case_sys_id as caseNo','client.client_first_name_en','client.client_last_name_en', 'referral_case.case_number', 'referral_case.update_datetime', 'lbo_case_status.label_en')
            ->join('client', 'referral_case.client_id', '=', 'client.client_id')
            ->join('service_provider', 'referral_case.counsellor_id', '=', 'service_provider.service_provider_id')
            ->join('lbo_case_status', 'referral_case.referral_status', '=', 'lbo_case_status.short_code')
            ->where([['referral_case.status','=','1'],['referral_case.ro_organization_id',session('service_provider_org_id')]])
            ->orderBy('update_datetime','desc')
            ->get();
        }
    }else{
        if($request->status!='ALL'){       
          $data = DB::table('referral_case')
          ->select('case_sys_id as caseNo','client.client_first_name_en','client.client_last_name_en', 'referral_case.case_number', 'referral_case.update_datetime', 'lbo_case_status.label_en','referral_status','referral_case.chat_status')
          ->join('client', 'referral_case.client_id', '=', 'client.client_id')
          ->join('service_provider', 'referral_case.counsellor_id', '=', 'service_provider.service_provider_id')
          ->join('lbo_case_status', 'referral_case.referral_status', '=', 'lbo_case_status.short_code')
          ->where([['service_provider.email', session("individual_email")],['referral_case.status','=','1'],['referral_status',$request->status]])
          ->orderBy('update_datetime','desc')
          ->get();
        }else{
          $data = DB::table('referral_case')
          ->select('case_sys_id as caseNo','client.client_first_name_en','client.client_last_name_en', 'referral_case.case_number', 'referral_case.update_datetime', 'lbo_case_status.label_en','referral_status','referral_case.chat_status')
          ->join('client', 'referral_case.client_id', '=', 'client.client_id')
          ->join('service_provider', 'referral_case.counsellor_id', '=', 'service_provider.service_provider_id')
          ->join('lbo_case_status', 'referral_case.referral_status', '=', 'lbo_case_status.short_code')
          ->where([['service_provider.email', session("individual_email")],['referral_case.status','=','1']])
          ->orderBy('update_datetime','desc')
          ->get();
        }
    }     
                    
      
      return sizeof($data);
    }

    public function getConsentStatus(Request $request)
    {
      if(session('ind_role_id')==='RO_SUP'){
        if($request->status!="ALL"){
          $data = DB::table('referral_case')
                ->select('client.client_first_name_en','client.client_last_name_en','referral_case.case_number','referral_case.update_datetime','referral_case.referral_status','referral_case.case_sys_id as caseNo')
                ->join('client', 'referral_case.client_id', '=', 'client.client_id')
                ->join('service_provider', 'referral_case.counsellor_id', '=', 'service_provider.service_provider_id')
                ->where([['referral_case.referral_status',$request->input('status')],['referral_case.status','=','1']])
                ->orderBy('referral_case.update_datetime','desc')
                ->get();  
      }else{

      $data = DB::table('referral_case')
                    ->select('case_sys_id as caseNo','client.client_first_name_en','client.client_last_name_en', 'referral_case.case_number', 'referral_case.update_datetime', 'referral_case.referral_status')
                    ->join('client', 'referral_case.client_id', '=', 'client.client_id')
                    ->join('service_provider', 'referral_case.counsellor_id', '=', 'service_provider.service_provider_id')
                    ->where([['referral_case.status','=','1'],[function($query) {
                        $query->where('referral_status', 'CLI_WAIT')
                              ->orwhere('referral_status', 'CLI_ACC')
                              ->orwhere('referral_status', 'CLI_REJ')
                              ->orwhere('referral_status', 'CLI_WITH');
                    }]])
                    ->orderBy('update_datetime','desc')
                    ->get();
                  }   
      }else{
        if($request->status!="ALL"){
          $data = DB::table('referral_case')
                ->select('client.client_first_name_en','client.client_last_name_en','referral_case.case_number','referral_case.update_datetime','referral_case.referral_status','referral_case.case_sys_id as caseNo')
                ->join('client', 'referral_case.client_id', '=', 'client.client_id')
                ->join('service_provider', 'referral_case.counsellor_id', '=', 'service_provider.service_provider_id')
                ->where([['referral_case.referral_status',$request->input('status')],['referral_case.counsellor_id',session('counsellor_sp_id')],['referral_case.status','=','1']])
                ->orderBy('referral_case.update_datetime','desc')
                ->get();  
      }else{

        $data = DB::table('referral_case')
        ->select('case_sys_id as caseNo','client.client_first_name_en','client.client_last_name_en', 'referral_case.case_number', 'referral_case.update_datetime', 'referral_case.referral_status')
        ->join('client', 'referral_case.client_id', '=', 'client.client_id')
        ->join('service_provider', 'referral_case.counsellor_id', '=', 'service_provider.service_provider_id')
        ->where([['service_provider.email', session("individual_email")],['referral_case.status','=','1'],[function($query) {
            $query->where('referral_status', 'CLI_WAIT')
                  ->orwhere('referral_status', 'CLI_ACC')
                  ->orwhere('referral_status', 'CLI_REJ')
                  ->orwhere('referral_status', 'CLI_WITH');
        }]])
        ->orderBy('update_datetime','desc')
        ->get();
                  }    
      }
      
    return sizeof($data); 
    }


    public function deleFile(Request $request){
      $result = DB::table('referral_case_attachment')->where('case_file',$request->input('name'))
      ->update([
          'status'=>'0',
      ]);
      echo $result;
    }



    public function checkemailormpbile(Request $request){
      if($request->input('mobile')){
          $result = DB::table('client')
          ->where([['client.mobile', $request->input('mobile')],['organization_id',session('service_provider_org_id')]])->first();
      }
      if($request->input('email')){
          $result2 = DB::table('client')
      ->where([['client.email', $request->input('email')],['organization_id',session('service_provider_org_id')]])->first();
      }
      //return $result2;
      if(isset($result) || isset($result2)){
        return false;
      }else{
        return true;
      }
    }
}



//.append($("<td> <td> <a href='"{{ url('counsellor/case-log/sda')}}"' class='btn btn-primary  btn-sm' style='margin-top: 5px'>Details</a>"+
// .append($("<td> <a href='http://localhost:8000/counsellor/detail-form/"+id+"' class='btn btn-primary  btn-sm' style='margin-top: 5px'>Details</a>"+
   //"<a href='{{ url('counsellor/case-log/"+id+"')}}'' class='btn btn-primary  btn-sm' style='margin-top: 5px'>Collatertal Contact</a>"+
 