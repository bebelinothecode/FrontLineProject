<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Vehicle;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;

class ChartController extends Controller
{
    // public function index(Vehicle $vehicle): View 
    // {
    //     // $col = Vehicle::pluck('name');
    //     // $count = Vehicle::where('name', $col)->count();
    //     $data = DB::table('vehicles')
    //             ->select('name', DB::raw('COUNT(*) as count'))
    //             ->groupBy('name')
    //             ->get();

    //     // dd($count);
    //     // $labels = $count->key();
    //     // $data = $count->values();

    //     return view('chart.graph', $data);
    // }

    public function index() {
        $start = Carbon::parse(Vehicle::min("created_at"));
        $end = Carbon::now();
        $period = CarbonPeriod::create($start, "1 month", $end);


        $vehiclesPerMonth = collect($period)->map(function($date) {
            $endDate = $date->copy()->endOfMonth();

            return [
                "count"=>Vehicle::where("created_at","<=", $endDate)->count(),
                "month"=>$endDate->format("Y-m-d")
            ];
        });

        $data = $vehiclesPerMonth->pluck("count")->toArray();
        $labels = $vehiclesPerMonth->pluck("month")->toArray();

        $chart = app()
            ->chartjs->name("FleetManagementChart")
            ->type("bar")
            ->size(["width" => 400, "height" => 200])
            ->labels($labels)
            ->datasets([
                [
                    "label" => "Number of Vehicles",
                    "backgroundColor" => "rgba(38, 185, 154, 0.31)",
                    "borderColor" => "rgba(38, 185, 154, 0.7)",
                    "data" => $data
                ]
            ])
            ->options([
                'scales' => [
                    'x' => [
                        'type' => 'time',
                        'time' => [
                            'unit' => 'month'
                        ],
                        'min' => $start->format("Y-m-d"),
                    ]
                ],
                'plugins' => [
                    'title' => [
                        'display' => true,
                        'text' => 'Monthly User Registrations'
                    ]
                ]
            ]);

        return view("chart.graph", compact("chart"));
    }
}
