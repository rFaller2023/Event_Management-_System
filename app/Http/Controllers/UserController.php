<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user =  User::get();

        return view('user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // User::create($request->all());
        // return view('user.index');
{
    // Validate the request data
    $request->validate([
        'name' => 'required|string|max:255',  // Name is required
        'email' => 'required|email',
        'password' => 'required|min:6',
    ]);

    // Create a new user
    $user = new User;
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = bcrypt($request->password);
    $user->save();

    // Redirect back to the user list with a success message
    return redirect()->route('user.index')
        ->with('status', 'User created successfully');
}

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
        $data =  $request->validate([
           
            'email' => 'required',
         
        ]);
       
        $user->update($data);
    
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
        $user->delete();
        return redirect()->route('user.index');
    }
    public function getUser()
        {
            $users = User::all();
            return response()->json($users);
    
        }

}
