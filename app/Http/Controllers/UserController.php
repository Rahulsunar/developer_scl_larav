<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // Show all users
    public function index()
    {
        $data = User::all();
        return view('index', compact('data'));
    }

    // Show add form
    public function add()
    {
        return view('add');
    }

    // Store new user
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'number' => 'required',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->phone_number = $request->number;
        $user->email = $request->email;
        $user->save();

        session()->flash('success', 'User added successfully');
        return redirect()->route('index');
    }

    // Show edit form
    public function edit($id)
    {
        $id = base64_decode($id);
        $Data = User::findOrFail($id);
        return view('edit', compact('Data'));
    }

    // Update user
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'number' => 'required',
        ]);

        $id = base64_decode($id);
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->phone_number = $request->number;
        $user->email = $request->email;
        $user->save();

        session()->flash('success', 'User updated successfully');
        return redirect()->route('index');
    }

    // Delete user
    public function delete($id)
    {
        $id = base64_decode($id);
        User::findOrFail($id)->delete();

        session()->flash('success', 'User removed successfully');
        return redirect()->route('index');
    }
}
