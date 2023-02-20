<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\c_info;
use App\Models\User;
use App\Models\fdh;
use DB;

class workerController extends Controller
{
    public function checkbarcode(Request $request)
    {
        $barcode = $request->input_barcode;

        $c_info = DB::select("SELECT * FROM fdhs WHERE barcode ='$barcode'");

        if (isset($c_info[0]->barcode)) {
            if ($c_info[0]->applicant_name == '_') {
                return '1';
            } else {
                return '2';
            }
        } else {
            return '3';
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->type == 0) {
            $c_info = c_info::orderBy('id', 'DESC')
                ->limit(3000)
                ->get();
        } else {
            // eomsincdhb
            $useroffer = Auth::user()->code;
            $res = str_replace('-', '', $useroffer);
            $result = 'eomsinc' . $res;

            $c_info = DB::select(
                "SELECT * FROM c_infos WHERE account_officer ='$result' OR allowed='$result'"
            );
        }

        // GET ONLY FOR ASSIGN
        $officer = User::all();

        return view('worker.list', compact('c_info', 'officer'));
    }

    public function filterYear($year)
    {
        if (Auth::user()->type == 0) {
            $c_info = DB::select(
                "SELECT * FROM c_infos WHERE barcode LIKE '%EOMS$year%'"
            );
        } else {
            // eomsincdhb
            $useroffer = Auth::user()->code;
            $res = str_replace('-', '', $useroffer);
            $result = 'eomsinc' . $res;

            $c_info = DB::select(
                "SELECT * FROM c_infos WHERE barcode LIKE '%EOMS$year%' AND account_officer ='$result' OR allowed='$result'"
            );
        }

        // GET ONLY FOR ASSIGN
        $officer = User::all();

        return view('worker.listFilter', compact('c_info', 'officer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('worker.c_info');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $barcode = $request->barcode;
        $fullname = $request->fullname;
        $passport_no = $request->passport_no;
        $email = $request->email;
        $pw = $request->pw;
        $status = $request->status;
        $remarks = $request->remarks;
        $allowed = $request->allowed;
        $category = $request->category;
        $account_officer = $request->account_officer;

        $c_infos = DB::SELECT(
            "SELECT * FROM c_infos WHERE barcode ='$barcode'"
        );

        if (isset($c_infos->barcode)) {
            if ($c_infos->barcode == $barcode) {
                return 'BARCODE ALREADY USED';
            } else {
                DB::INSERT(
                    "UPDATE `fdhs` SET `applicant_name`='$fullname' WHERE barcode ='$barcode'"
                );

                DB::INSERT(
                    "INSERT INTO `c_infos`(`barcode`, `fullname`, `email`, `pw`, `account_officer`, `status`, `remarks`, `allowed`, `category`, `passport_no`) VALUES ('$barcode','$fullname','$email','$pw','$account_officer','1','','','0','$passport_no')"
                );

                return 'SUCCESS';
            }
        } else {
            return 'BARCODE ALREADY EXIST IN C_INFOS';
        }
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

    public function updateread($id)
    {
        $barcode_update_c_infos = $id;

        $bucs = DB::SELECT(
            "SELECT * FROM c_infos WHERE barcode ='$barcode_update_c_infos'"
        );

        return view('worker.c_info_update', compact('bucs'));
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
        $id = $request->id_c_info;
        $select_officers = $request->select_officers;

        $update_officer = c_info::find($id);
        $update_officer->account_officer = $select_officers;
        $update_officer->save();

        return 'ACCOUNT OFFICER SUCCESSFULLY UPDATED';
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
