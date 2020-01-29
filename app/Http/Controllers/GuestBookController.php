<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        /*if ($request->has('errors')) {
            $errors = $request->input('errors');
            return view('main', ['errors' => $errors]);
        }
        return view('main');
        */
        return view('main');
        //return 'hello';
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'url' => 'required|url|max:255',
        ]);
        
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            return redirect()->route('book.main', ['errors' => $errors]);
        }
        
        return redirect()->route('book.main');
    }
}
