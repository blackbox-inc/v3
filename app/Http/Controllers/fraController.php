<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Exception;
use App\Models\User;
use App\Models\nlineup;
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

    public function listbydate($id)
    {
        $fraUsername = $id;
        $Nlineups = DB::table('nlineups')
            ->select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('COUNT(*) as count')
            )
            ->where('fra_username', '=', $id)
            ->groupBy('date')
            ->get();

        return view('afra.list-by-date', compact('Nlineups', 'fraUsername'));
    }
}