<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\User;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    //
    public function index()
    {
       // Fetch users with the role of admin
    //    $user = User::where('role', 'admin')->get();
       $abouts = About::all();
       // Pass the fetched data to the front-end view
       return view('welcome', [ 'abouts' => $abouts ]);

    }

}
