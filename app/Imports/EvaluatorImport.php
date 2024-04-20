<?php

namespace App\Imports;

use Excel;
use App\Models\User;
use App\Models\Evaluator;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;

class EvaluatorImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            Evaluator::create([
                'name' => $row['nama'],
                'kategori' => $row['kategori'],
                'pekerjaan' => $row['pekerjaan'],
                'alamat' => $row['alamat'],
            ]);

            User::create([
                'name' => $row['nama'],
                'email' => $row['email'],
                'password' => bcrypt('password'),
                'role' => 'penilai',
            ]);
        }
    }
}
