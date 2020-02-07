<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class GuestBookMainController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function main(Request $request)
    {
        $users = User::sortable('id')->paginate(5);

        if ($request->has('errors')) {
            $errors = $request->input('errors');
            return view('main', compact('errors', 'users'));
        }

        return View('main', compact('users'));
    }
}
