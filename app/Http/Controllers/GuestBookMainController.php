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

        if (
            in_array($request->query('order'), $sortTypes) &&
            array_key_exists($request->query('column'), $sortableColumns)
        ) {
            [$order, $sortedColumn] = [$request->query('order'), $request->query('column')];
            $newSortableColumns = getNewSortableCollumns($sortableColumns, $sortedColumn, $order);
            $sortLinksData = getSortLinksData($newSortableColumns);
        } else {
            $sortedColumn = $defaultSort['column'];
            $order = $defaultSort['order'];
            $sortLinksData = getSortLinksData($sortableColumns);
        }

        $users = User::orderBy($sortedColumn, $order)->paginate(5);

        if ($request->has('errors')) {
            $errors = $request->input('errors');
            return view('main', compact('errors', 'users', 'sortedColumn', 'order', 'sortLinksData'));
        }

        return View('main', compact('users', 'sortedColumn', 'order', 'sortLinksData'));
    }
}
