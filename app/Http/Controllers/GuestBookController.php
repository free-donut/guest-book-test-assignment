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
        //$users = User::orderBy('name', 'desc')->paginate(25);
        //$users = User::orderBy('name')->paginate(25);
        //$users = User::orderBy('email', 'desc')->paginate(25);
        //$users = User::orderBy('email')->paginate(25);
        //$users = User::orderBy('created_at', 'desc')->paginate(25);
        //$users = User::orderBy('created_at')->paginate(25);
        $users = User::paginate(25);
        /*if ($request->has('errors')) {
            $errors = $request->input('errors');
            return view('main', ['errors' => $errors, 'users' => $users]);
        }*/

        return view('main', ['users' => $users]);
        return view('main');
        //return 'hello';
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'url' => 'required|url|max:255',
            'email' => 'required|email',
            'message' => 'required',
        ]);
        
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            return redirect()->route('book.main', ['errors' => $errors]);
        }
        $user = new User();
        $user->name = $request->input('name');
        $user->url = $request->input('url');
        $user->email = $request->input('email');
        $user->message = $request->input('message');
        $browser = get_browser(NULL, true);
        $user->browser = $browser['parent'];
        //$user->browser = $request->server('HTTP_USER_AGENT');
        $user->ip = $request->server("REMOTE_ADDR");
        $user->created_at = date("Y-m-d H:i:s");
        $user->save();
        //$id = $user->id;
        
        return redirect()->route('book.main');
    }
}
