<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Models\c_info;
use App\Models\User;
use App\Models\fdh;
use App\Models\basic_info;
use App\Models\contactPerson;
use DB;
use Exception;

class fdhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('generate.index', compact('users'));
    }

    public function selectionUser(Request $request)
    {
        $code = $request->code;
        $c_info = DB::select(
            "SELECT * FROM fdhs WHERE barcode LIKE'%$code%' ORDER BY id DESC LIMIT 1"
        );

        if (count($c_info)) {
            $today = date('y');

            $bcode = $c_info[0]->barcode;
            list($q, $w) = explode('EOMS' . $today . $code, $bcode);
            $new2 = $w;
            $barcode = ltrim($new2, '0');

            $bcode = $c_info[0]->barcode;
            list($q, $w) = explode('EOMS' . $today . $code, $bcode);
            $new2 = $w + 1;
            $nextbarcode = ltrim($new2, '0');

            return compact('barcode', 'nextbarcode');
        } else {
            $year = date('y');
            $username = Auth::user()->username;
            $barcode = 'EOMS' . $year . $code . '00001';
            $c_info = DB::INSERT(
                "INSERT INTO `fdhs`(`barcode`, `applicant_name`, `username`) VALUES ('$barcode','_','$username')"
            );

            return $barcode = 'EOMS' . $year . $code . '00001';
        }
    }

    public function generatedh(Request $request)
    {
        $yr_created = date('y');
        $dhusers = $request->dhusers;
        $next = $request->next;
        $add = $request->add;
        $code = $request->dhusers;
        $myarray = [];

        for ($i = $next; $i <= $add; $i++) {
            array_push($myarray, $i);
        }

        foreach ($myarray as $value) {
            $barcodez =
                'EOMS' .
                $yr_created .
                $code .
                str_pad($value, 5, '0', STR_PAD_LEFT);

            // DB::INSERT(
            //     "INSERT INTO `fdhs`(`barcode`, `applicant_name`, `username`) VALUES ('$barcodez','_','$dhusers')"
            // );

            fdh::create([
                'barcode' => $barcodez,
                'applicant_name' => '_',
                'username' => $dhusers,
            ]);
        }

        return 'SUCCESSFULLY GENERATED';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
