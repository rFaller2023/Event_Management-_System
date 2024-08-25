<?php

namespace App\Http\Controllers;

use App\Models\RegisterController;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterControllerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('register');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd('aw');
        try{
            $registerData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required',
            ]);

            // dd($registerData);

            $code = rand(100000, 999999);


             $user = User::create($registerData);

             $user->update([
                'otp_code' => $code,
             ]);

             $token = $user->createToken('TOKEN');

             return response()->json([
                'token' => $token->plainTextToken,
                'message' => 'registered successfully',
             ]);
        }catch(\Exception $exception){
            return response()->json([
               'message' => $exception->getMessage(),
            ], 500);
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(RegisterController $registerController)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RegisterController $registerController)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RegisterController $registerController)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RegisterController $registerController)
    {
        //
    }
}
