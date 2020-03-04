<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomePageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function index(Request $request)
    {
        $users = User::sortable('id')->paginate(3);

        if ($request->has('errors')) {
            $errors = $request->input('errors');
            return view('home', compact('errors', 'users'));
        }

        return View('home', compact('users'));
    }
}
