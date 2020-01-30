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
    public function __construct()
    {
        //
    }

    public function main(Request $request)
    {
        $users = User::orderBy('id', 'desc')->paginate(5);
        //$users = User::paginate(25);
        if ($request->has('errors')) {
            $errors = $request->input('errors');
            return view('main', ['errors' => $errors, 'users' => $users]);
        }
        return view('main', ['users' => $users]);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'url' => 'url|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|max:500',
        ]);
        
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            return redirect()->route('book.main', ['errors' => $errors]);
        }

        $user = new User();
        $browser = get_browser(null, true);
        $user->browser = $browser['parent'];
        $user->name = $request->input('name');
        $user->url = $request->input('url');
        $user->email = $request->input('email');
        $user->message = strip_tags($request->input('message'));
        $user->ip = $request->server("REMOTE_ADDR");
        $user->created_at = date("Y-m-d H:i:s");
        $user->save();
        return redirect()->route('book.main');
    }
    public function show($id)
    {
        $userToJson = User::find($id)->toJson(JSON_PRETTY_PRINT);
        return view('json_page', ['userToJson' => $userToJson]);
    }
}
