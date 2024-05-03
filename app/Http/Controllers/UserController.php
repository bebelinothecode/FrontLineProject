<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->view('user.index', [
            'users' => User::orderBy('updated_at', 'desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->view('user.form');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,User $user)
    {
        $validated = $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
            'role' => ['required'],
        ]);

        $create = User::create($validated);

        if($create) {
            session()->flash('notif.success', "$user->role created successfully!");
            return redirect()->route('user.index');
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) : Response
    {
        return response()->view('user.show', [
            'user'=> User::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id):Response
    {
        return response()->view('user.form', [
            'user' => User::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) : RedirectResponse
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'role' => ['required'],
        ]);

        $update = $user->update($validated);

        if($update) {
            session()->flash('notif.success', 'User updated successfully!');
            return redirect()->route('user.index');
        }

        return abort(500);        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        $delete = $user->delete($id);

        if($delete) {
            session()->flash('notif.success', 'User deleted successfully!');
            return redirect()->route('user.index');
        }

        return abort(500);
    }
}
