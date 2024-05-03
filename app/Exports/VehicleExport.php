<?php

namespace App\Exports;

use App\Models\Vehicle;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class VehicleExport implements FromCollection, FromQuery, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Vehicle::all();
    }

    public function headings(): array
    {
        return [
            "ID",
            'Name',
            'Transmission Type',
            'Mileage',
            'Driver ID',
            'Created At',
            'Updated At',
            'Driver Name',
        ];
    }

    public function query()
    {
        return Vehicle::query();   // class that we use for the query
    }
}
