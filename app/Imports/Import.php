<?php

namespace App\Imports;

use App\Models\Client;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class Import implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Client([
            //
            'email' => $row['email'],
            'first_name' => $row['first_name'],
            'last_name' => $row['last_name'],
            'HKID' => $row['hkid'],
            'date_of_birth' => $row['date_of_birth'],
            'mobile' => $row['mobile'],
            'nationality' => $row['nationality'],
            'area' => $row['area'],
            'addres' => $row['addres'],
            'building' => $row['building'],
            'floor' => $row['floor'],
            'unit' => $row['unit'],
            'company_name' => $row['company_name'],
            'company_contact' => $row['company_contact'],
            'company_addres' => $row['company_addres'],
            'purpose' => $row['purpose'],
            'company_addres' => $row['company_addres'],
            'create_datetime' => date('Y-m-d H:i:s'),
            'update_datetime' => date('Y-m-d H:i:s'),
        ]);
    }
}
