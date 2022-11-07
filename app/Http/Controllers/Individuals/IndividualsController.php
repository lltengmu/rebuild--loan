<?php

namespace App\Http\Controllers\Individuals;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndividualsController extends Controller
{
    //
    public function Getcase($id)
    {
        //
        $list = DB::table('case')
            ->join('client', 'case.client_id', '=', 'client.id')
            ->where('HKID', $id)
            ->select(
                'client.first_name',
                'client.last_name',
                'client.email',
                'client.date_of_birth',
                'client.mobile',
                'client.nationality',
                'client.area',
                'client.addres',
                'client.building',
                'client.floor',
                'client.unit',
                'client.company_name',
                'client.company_contact',
                'client.company_addres'
            )
            ->get();
        return $list;
    }
}
