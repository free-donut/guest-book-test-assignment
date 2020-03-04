<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;

class GuestBookController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:100',
            'url' => 'url|max:2048',
            'email' => 'required|email|max:256',
            'message' => 'required|max:500',
        ]);
        
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            return redirect()->route('home', ['errors' => $errors]);
        }

        $user = new User();
        $user->name = $request->input('name');
        $user->url = $request->input('url');
        $user->email = $request->input('email');
        $user->message = strip_tags($request->input('message'));
        $user->browser = $request->server('HTTP_USER_AGENT');
        $user->ip = $request->server("REMOTE_ADDR");
        $user->created_at = date("Y-m-d H:i:s");
        $user->save();
        return redirect()->route('home');
    }

    public function show($id)
    {
        $user = User::find($id);
        
        if (!$user) {
            abort(404);
        }
        $userToJson = $user->toJson(JSON_PRETTY_PRINT);
        return view('json_page', ['userToJson' => $userToJson]);
    }
}
