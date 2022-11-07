<?php

namespace App\Imports;

use App\Models\caseModel;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use phpDocumentor\Reflection\Types\Null_;

class SpCaseImport implements ToModel
{
    use Importable;
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new caseModel([
        ]);
    }
}
