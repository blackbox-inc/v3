<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\c_info;
use Auth;
use monitorapp;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $countrs = c_info::count();
        $account_officer = Auth::user()->username;
        if (Auth::user()->type == 0) {
            $last10Records = c_info::orderBy('id', 'desc')
                ->take(100)
                ->get();

            $monitor_result = DB::table('monitorapps')
                ->join('c_infos', 'monitorapps.barcode', '=', 'c_infos.barcode')
                ->where('monitorapps.status', '=', 1)
                ->select('monitorapps.*', 'c_infos.*')
                ->limit(100)
                ->get();
        } else {
            $last10Records = c_info::where(
                'account_officer',
                '=',
                $account_officer
            )
                ->orderBy('id', 'desc')
                ->take(100)
                ->get();

            $monitor_result = DB::table('monitorapps')
                ->join('c_infos', 'monitorapps.barcode', '=', 'c_infos.barcode')
                ->where('c_infos.account_officer', '=', $account_officer)
                ->where('monitorapps.status', '=', 1)
                ->select('monitorapps.*', 'c_infos.*')
                ->limit(100)
                ->get();
        }

        // REDIRECT TO FRA DASHBOARD
        if (Auth::user()->type == 4) {
            return view('fra.index');
        }

        $countmembers = c_info::count();

        return view(
            'home',
            compact(
                'countmembers',
                'last10Records',
                'countrs',
                'monitor_result'
            )
        );
    }

    public function countlatest()
    {
        $countrs = c_info::count();
        $lastRecord = c_info::orderBy('id', 'desc')->first();

        return compact('countrs', 'lastRecord');
    }
}
