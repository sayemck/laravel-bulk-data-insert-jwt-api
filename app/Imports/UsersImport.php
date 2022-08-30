<?php

namespace App\Imports;

use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class UsersImport implements ToModel, WithHeadingRow, WithChunkReading
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return User::create([
            'name' => strtoupper($row['name']),
            'email' => $row['email'],
            'password' => '$2a$12$3sJYDbXfbaq/Jnv3GaZkVekzLows4vH7AXDiT7zPzzpKRrNxP/LOi',
        ]);
    }

    public function chunkSize(): int
    {
       return 5000;
    }
}
