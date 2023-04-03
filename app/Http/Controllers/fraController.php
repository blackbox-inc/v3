<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Exception;
use App\Models\User;
use DB;

class fraController extends Controller
{
    //

    public function create()
    {
        return view('afra.create');
    }

    public function list()
    {
        $type = Auth::user()->type;

        if ($type == 0) {
            $users = User::where('type', '=', 4)->get();
        } else {
            $users = User::where('code', '=', Auth::user()->username)->get();
        }

        return view('afra.list', compact('users'));
    }

    public function listsched()
    {
        return view('fra.list');
    }
}
