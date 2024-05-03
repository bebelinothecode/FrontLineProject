<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->view('vehicle.index', [
            'vehicles' => Vehicle::orderBy('updated_at', 'desc')->get(),
        ]);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->view('vehicle.form');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Vehicle $vehicle)
    {
        $validated = $request->validate([
            'name' => ['required'],
            'mileage' => ['required'],
            'transmission_type' => ['required'],
            'user_id' => ['required'],
            'name_of_driver' => ['required']
        ]);

        $create = Vehicle::create($validated);

        if($create) {
            session()->flash('notif.success', "$vehicle->name created successfully!");
            return redirect()->route('vehicle.index');
        }

        return abort(500);
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->view('vehicle.show', [
            'vehicle'=> Vehicle::findOrFail($id)
        ]);
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return response()->view('vehicle.form', [
            'vehicle' => Vehicle::findOrFail($id),
        ]);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Vehicle::findOrFail($id);

        $validated = $request->validate([
            'name' => ['required'],
            'transmission_type' => ['required'],
            'mileage' => ['required'],
            'user_id' => ['required'],
            'name_of_driver' => ['required']
        ]);

        $update = $user->update($validated);

        if($update) {
            session()->flash('notif.success', 'Vehicle details updated successfully!');
            return redirect()->route('vehicle.index');
        }

        return abort(500);  
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vehicle = Vehicle::findOrFail($id);

        $delete = $vehicle->delete($id);

        if($delete) {
            session()->flash('notif.success', 'Vehicle deleted successfully!');
            return redirect()->route('vehicle.index');
        }

        return abort(500);
        //
    }
}
