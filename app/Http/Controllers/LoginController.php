<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    //
    public function loginUser(Request $request)
    {
        try {
          
            $credentials = $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);

            $user = User::where('email', $request->email)->first();

            if (!$user || !Hash::check($credentials['password'], $user->password)) {
                return response()->json([
                    'message' => 'Invalid Credentials',
                ]);
            }

            $code = rand(100000, 999999);
            $updateResult = $user->update([
                'otp_code' => $code,
            ]);

            
        //    Http::asForm()->post('https://api.semaphore.co/api/v4/messages', [
        //    'apikey' => env('SMS_API_KEY'),
        //    'number' => '09120546525', 
        //    'message' => 'This is your OTP Code: ' . $code,
        //    ]);

        // Mail::to($user->email)->send(new NewUserMail());
        
            if ($updateResult) {
                return response()->json([
                    'status' => true,
                    'message' => 'OTP sent successfully',
                    'token' => $user->createToken("API TOKEN")->plainTextToken
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Failed to send OTP',
                ], 500); 
            }

           
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
    public function verifyOTP(Request $request)
    {
        // dd($request->otp_code);
        try {
            $validateOTP = Validator::make($request->all(), [
                'otp_code' => 'required|digits:6' 
            ]);
    
            // dd($validateOTP);
            if($validateOTP->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'Validation error',
                    'errors' => $validateOTP->errors()
                ], 401);
            }
    
            // Check if the OTP code matches with the user's stored OTP code
            $user = User::where('otp_code', $request->otp_code)->first();
            // dd($user);
    
            if (!$user) {
                return response()->json([
                    'status' => false,
                    'message' => 'Invalid OTP',
                ], 401);
            }
    
            // Clear the OTP code after successful verification
            // $user->update(['otp_code' => ]);
    
            return response()->json([
                'status' => true,
                'message' => 'OTP Verified Successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    // public function createUser(Request $request)
    // {
    //     try {
    //         //Validated
    //         $validateUser = Validator::make($request->all(), 
    //         [
    //             'name' => 'required',
    //             'email' => 'required|email|unique:users,email',
    //             'password' => 'required',
    //             'address' => 'required',
    //             'image' => 'required'
    //         ]);
    //         if($request->hasFile('image')){
    //             $image = $request->file('image');
    //             $imagePath =$image->store('images', 'public');
    //         }

    //         if($validateUser->fails()){
    //             return response()->json([
    //                 'status' => false,
    //                 'message' => 'validation error',
    //                 'errors' => $validateUser->errors()
    //             ], 401);
    //         }
    //         $password = $request->input('password');

    //         $user = User::create([
    //             'name' => $request->name,
    //             'email' => $request->email,
    //             'password' => Hash::make($request->password),
    //             'address' => $request->address,
    //             'image' => $imagePath ?? null
    //         ]);

    //         Mail::to($user->email)->send(new NewUserMail($user, $password));

    //         return response()->json([
    //             'status' => true,
    //             'message' => 'User Created Successfully',
    //             'token' => $user->createToken("API TOKEN")->plainTextToken
    //         ], 200);

    //     } catch (\Throwable $th) {
    //         return response()->json([
    //             'status' => false,
    //             'message' => $th->getMessage()
    //         ], 500);
    //     }
    // }


}
