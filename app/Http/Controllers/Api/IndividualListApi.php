<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\caseModel;
use App\Models\client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndividualListApi extends Controller
{
    /**
     * individual list page get filter data interface.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $users = DB::table('case')
                    ->join('company','case.service_provider', '=','company.company_id')
                    ->select('case.sys_id','case.create_datetime','case.service_provider','company.company_id')
                    ->get();
        $dataArray = [];
        //有限制时间,但是没有选择任何  company 时
        if($request->startTime && $request->endTime && $request->companyArray == []){
            foreach ($users as  $user) {
                if(strtotime($user->create_datetime) >=strtotime($request->startTime) && strtotime($user->create_datetime) <= strtotime($request->endTime)){
                    array_push($dataArray,$user);
                }
            }
            return count($dataArray);
        }
        //只有 company 被选中，没有限制时间时
        if(!$request->startTime && !$request->endTime ){
            foreach ($users as  $user) {
                if(in_array($user->company_id,$request->companyArray)){
                    array_push($dataArray,$user);
                }
            }
            return count($dataArray);
        }
        //默认情况，当有时间限制以及有sp被选中时
        foreach ($users as  $user) {
            if(strtotime($user->create_datetime) >=strtotime($request->startTime) && strtotime($user->create_datetime) <= strtotime($request->endTime)){
                if(in_array($user->company_id,$request->companyArray)){
                    array_push($dataArray,$user);
                }
            }
        }
        return count($dataArray);
    }
    public function filterClientsData(Request $request)
    {
        $clients = client::get();
        $clientsArray = [];
        foreach ($clients as  $client) {
            if(strtotime($client->create_datetime) >=strtotime($request->startTime) && strtotime($client->create_datetime) <= strtotime($request->endTime)){
                array_push($clientsArray,$client);
            }
        }
        return count($clientsArray);
    }
}
