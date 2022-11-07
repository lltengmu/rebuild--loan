<?php

namespace App\Http\Controllers\commom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CasePartiaControllerl extends Controller
{
    public function editCaseLoanDetail(Request $request,$id)
    {
        $updateCase = DB::table('case')->where('id',$id)->update([
            'loan_amount'      =>$request->loan_amount,
            'repayment_period' => $request->repayment_period,
            'purpose'          => $request->lbo_loan_purpose,
            'case_remark'      => $request->case_remark,
            'service_provider'      => $request->service_provider
        ]);
        return $updateCase ? ['success' => '修改成功'] : ['error' => '您未更改任何數據'];
    }
}
