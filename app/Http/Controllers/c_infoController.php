<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\c_info;
use App\Models\User;
use App\Models\fdh;
use DB;

class c_infoController extends Controller
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
        //
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

        if (count($c_infos) === 0) {
            DB::UPDATE(
                "UPDATE `fdhs` SET `applicant_name`='$fullname' WHERE barcode ='$barcode'"
            );

            DB::INSERT(
                "INSERT INTO `c_infos`(`barcode`, `fullname`, `email`, `pw`, `account_officer`, `status`, `remarks`, `allowed`, `category`, `passport_no`) VALUES ('$barcode','$fullname','$email','$pw','$account_officer','1','','','0','$passport_no')"
            );

            DB::INSERT(
                "INSERT INTO `basic_infos`(`barcode`, `gender`, `dob`, `pob`, `height`, `weight`, `religion`, `blood_type`, `marital_status`, `no_of_children`, `objectives`, `photo`) VALUES ('$barcode','','','','','','','O+','SINGLE','0','-','default.jpg')"
            );

            return 'SUCCESS';
        } else {
            return 'BARCODE ALREADY USED';
        }

        // if (isset($c_infos[0]->barcode)) {
        //     if ($c_infos->barcode == $barcode) {
        //         return 'BARCODE ALREADY USED';
        //     } else {
        //         DB::INSERT(
        //             "UPDATE `fdhs` SET `applicant_name`='$fullname' WHERE barcode ='$barcode'"
        //         );

        //         DB::INSERT(
        //             "INSERT INTO `c_infos`(`barcode`, `fullname`, `email`, `pw`, `account_officer`, `status`, `remarks`, `allowed`, `category`, `passport_no`) VALUES ('$barcode','$fullname','$email','$pw','$account_officer','1','','','0','$passport_no')"
        //         );

        //         return 'SUCCESS';
        //     }
        // } else {
        //     return 'BARCODE ALREADY EXIST IN C_INFOS';
        // }
    } // end of store

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $officer = User::all();

        $barcode_update_c_infos = $id;
        $bucs = DB::SELECT(
            "SELECT * FROM c_infos WHERE barcode ='$barcode_update_c_infos'"
        );
        return view('worker.c_info_update', compact('bucs', 'officer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $barcode = $request->updatebarcode;
        $fullname = $request->updateName;
        $passport_no = $request->updatePassport;

        $aofficer = $request->aofficer;
        $allowoff = $request->allowoff;
        $categoryUpdate = $request->categoryUpdate;

        if ($categoryUpdate == 'DH') {
            $resultCategory = 0;
        } else {
            $resultCategory = 1;
        }

        $update_cinfos = DB::UPDATE(
            "UPDATE `c_infos` SET 
            `fullname`='$fullname',
            `account_officer`='$aofficer',
            `allowed`='$allowoff',
            `category`='$resultCategory',
            `passport_no`='$passport_no' 
            
            WHERE barcode ='$barcode'"
        );

        return 'INFO UPDATED';
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
