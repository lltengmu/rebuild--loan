<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GetCaseListController extends Controller
{
    public function __invoke()
    {
        $list = DB::table('case')
            ->join('client', 'case.client_id', '=', 'client.id')
            ->join('company', 'case.service_provider', '=', 'company.company_id')
            ->join('service_provider', 'case.service_provider', '=', 'service_provider.company_staff_id')
            ->join('lbo_case_status', 'case.case_status', '=', 'lbo_case_status.id')
            ->select('case.*', 'client.first_name', 'client.last_name', 'company.name','lbo_case_status.label_tc','client.HKID','client.area')
            ->get();
        return response($list);
    }
}
