<?php

namespace App\Imports;

use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $userData = User::create([
            'name' => strtoupper($row['name']),
            'email' => $row['email'],
            'password' => bcrypt('123456'),
        ]);

        return $userData;
    }
}
