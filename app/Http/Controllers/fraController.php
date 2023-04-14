<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Exception;
use App\Models\User;
use App\Models\nlineup;
use App\Models\c_info;
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

    public function getnamelist(Request $request)
    {
        if (Auth::user()->type == 0) {
            // ADMIN
            $cInfos = DB::table('c_infos')
                ->orderBy('id', 'desc')
                ->limit(3000)
                ->get();

            $listnames = [];
            $barcode = [];

            foreach ($cInfos as $namelist) {
                array_push($listnames, $namelist->fullname);
                array_push($barcode, $namelist->barcode);
            }

            return compact('barcode', 'listnames');
        } else {
            // TIEUP

            $cInfos = DB::table('c_infos')
                ->where('account_officer', '=', Auth::user()->username)
                ->orderBy('id', 'desc')
                ->limit(3000)
                ->get();

            $listnames = [];
            $barcode = [];

            foreach ($cInfos as $namelist) {
                array_push($listnames, $namelist->fullname);
                array_push($barcode, $namelist->barcode);
            }

            return compact('barcode', 'listnames');
        }
    }

    public function addtolineup(Request $request)
    {
        $variable = $request->barcode;
        $fra_name = $request->fra_name;
        $fra_username = $request->fra_username;
        $pra_officer = $request->pra_officer;

        $findbcode = nlineup::where('fra_username', '=', $fra_username)
            ->where('barcode', '=', $variable)
            ->get();

        if (count($findbcode) == 0) {
            nlineup::create([
                'barcode' => $variable,
                'fra_username' => $fra_username,
                'fra_name' => $fra_name,
                'position' => 'Domestic Helper',
                'offer_status' => 0,
                'status' => 2,
                'account_officer' => $pra_officer,
            ]);
        }

        return 'success';
    }
}