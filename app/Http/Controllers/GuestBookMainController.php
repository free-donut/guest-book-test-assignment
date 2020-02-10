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
        $sortTypes = config('sort.sortTypes');
        $sortableColumns = config('sort.sortableColumns');
        $defaultSort = config('sort.defaultSort');

        $userSort = [
            'order' => $request->query('order', null),
            'column' => $request->query('column', null)
        ];

        [$sortLinksData, $column, $order] = getSortData($sortableColumns, $sortTypes, $defaultSort, $userSort);

        $users = User::orderBy($column, $order)->paginate(5);

        if ($request->has('errors')) {
            $errors = $request->input('errors');
            return view('main', compact('errors', 'users', 'column', 'order', 'sortLinksData'));
        }

        return View('main', compact('users', 'column', 'order', 'sortLinksData'));
    }
}
