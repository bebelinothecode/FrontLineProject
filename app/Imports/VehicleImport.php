<?php

namespace App\Imports;

use App\Models\Vehicle;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;


HeadingRowFormatter::default('none');

class VehicleImport implements ToModel, WithHeadingRow
{
    

    public function model(array $row)
    {
        return new Vehicle([
            'name'  => $row['Name'],
            'transmission_type' => $row['Transmission Type'],
            'mileage' => $row['Mileage'],
            'user_id' => $row['Driver Id'],
            'name_of_driver' => $row['Name of Driver']
        ]);
    }
}
