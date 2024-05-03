<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;
use App\Exports\VehicleExport;
use App\Imports\VehicleImport;
// use Illuminate\Support\Facades\Facade;
use Maatwebsite\Excel\Facades\Excel as FacadesExcel;

class ImportExportController extends Controller
{
    public function export() 
    {
        // use Excel facade to export data, by passing in the UserExport class and the desired file name as arguments
        return FacadesExcel::download(new VehicleExport, 'vehicles.xlsx');
    }

    public function import(Request $request) 
    {
        // use Excel facade to import data, by passing in the UserImport class and the uploaded file request as arguments
        FacadesExcel::import(new VehicleImport, $request->file('file')->store('temp'), null);

        session()->flash('notif.success', 'Vehicles imported successfully!');
        return redirect()->route('vehicle.index');

        // return redirect()->back();
        // return redirect()->back()->with('status', 'Imported vehicles successfully');
    }
}
