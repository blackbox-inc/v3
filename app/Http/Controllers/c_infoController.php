<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\c_info;
use App\Models\User;
use App\Models\fdh;
use App\Models\basic_info;
use App\Models\contactPerson;
use App\Models\c_educ;
use App\Models\c_category;
use App\Models\c_skill;
use App\Models\c_exp;
use DB;
use Exception;

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

    /*
    |--------------------------------------------------------------------------
    | index
    |--------------------------------------------------------------------------
    |
    | 0000000000000000000000000000000000000000000000000000000000000000000000000
    | 0000000000000000000000000000000000000000000000000000000000000000000000000
    | 0000000000000000000000000000000000000000000000000000000000000000000000000
    | 0000000000000000000000000000000000000000000000000000000000000000000000000
    |
    */
    public function index()
    {
        //
    }

    /*
    |--------------------------------------------------------------------------
    | create
    |--------------------------------------------------------------------------
    |
    | 0000000000000000000000000000000000000000000000000000000000000000000000000
    | 0000000000000000000000000000000000000000000000000000000000000000000000000
    | 0000000000000000000000000000000000000000000000000000000000000000000000000
    | 0000000000000000000000000000000000000000000000000000000000000000000000000
    |
    */
    public function create()
    {
        if (Auth::user()->type == 0) {
            $fdhs = DB::SELECT('SELECT * FROM `fdhs`');
            return view('worker.c_info', compact('fdhs'));
        } else {
            $code = Auth::user()->code;
            $fdhs = DB::SELECT(
                "SELECT * FROM `fdhs` WHERE barcode LIKE '%$code%' "
            );
            return view('worker.c_info', compact('fdhs'));
        }
    }

    /*
    |--------------------------------------------------------------------------
    | store
    |--------------------------------------------------------------------------
    |
    | 0000000000000000000000000000000000000000000000000000000000000000000000000
    | 0000000000000000000000000000000000000000000000000000000000000000000000000
    | 0000000000000000000000000000000000000000000000000000000000000000000000000
    | 0000000000000000000000000000000000000000000000000000000000000000000000000
    |
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
        $c_cat1 = $request->c_cat1;

        $c_infos = DB::SELECT(
            "SELECT * FROM c_infos WHERE barcode ='$barcode'"
        );

        if (count($c_infos) === 0) {
            DB::UPDATE(
                "UPDATE `fdhs` SET `applicant_name`='$fullname' WHERE barcode ='$barcode'"
            );

            DB::INSERT(
                "INSERT INTO `c_infos`(`barcode`, `fullname`, `email`, `pw`, `account_officer`, `status`, `remarks`, `allowed`, `category`, `passport_no`) VALUES ('$barcode','$fullname','$email','$pw','$account_officer','1','','','$category','$passport_no')"
            );

            $basic_infos = DB::SELECT(
                "SELECT * FROM basic_infos WHERE barcode ='$barcode'"
            );

            if (count($basic_infos) === 0) {
                DB::INSERT(
                    "INSERT INTO `basic_infos`(`barcode`, `gender`, `dob`, `pob`, `height`, `weight`, `religion`, `blood_type`, `marital_status`, `no_of_children`, `objectives`, `photo`) VALUES ('$barcode','','','','','','','O+','SINGLE','0','-','default.jpg')"
                );

                c_category::create([
                    'barcode' => $barcode,
                    'cat1' => $c_cat1,
                    'cat2' => '--',
                    'cat3' => '--',
                ]);

                c_skill::create([
                    'barcode' => $barcode,
                    'sdesc' => '-',
                ]);
            }

            return 'SUCCESS';
        } else {
            return 'BARCODE ALREADY USED';
        }
    }
    /*
    |--------------------------------------------------------------------------
    | show
    |--------------------------------------------------------------------------
    |
    | 0000000000000000000000000000000000000000000000000000000000000000000000000
    | 0000000000000000000000000000000000000000000000000000000000000000000000000
    | 0000000000000000000000000000000000000000000000000000000000000000000000000
    | 0000000000000000000000000000000000000000000000000000000000000000000000000
    |
    */
    public function show($id)
    {
        //
    }

    /*
    |--------------------------------------------------------------------------
    | edit
    |--------------------------------------------------------------------------
    |
    | 0000000000000000000000000000000000000000000000000000000000000000000000000
    | 0000000000000000000000000000000000000000000000000000000000000000000000000
    | 0000000000000000000000000000000000000000000000000000000000000000000000000
    | 0000000000000000000000000000000000000000000000000000000000000000000000000
    |
    */
    public function edit($id)
    {
        $officer = User::all();
        $barcode = $id;

        /*
        |--------------------------------------------------------------------------
        | CATEGORIES POSITION 
        |--------------------------------------------------------------------------
        |
        | 0000000000000000000000000000000000000000000000000000000000000000000000000
        | 0000000000000000000000000000000000000000000000000000000000000000000000000
        | 0000000000000000000000000000000000000000000000000000000000000000000000000
        | 0000000000000000000000000000000000000000000000000000000000000000000000000
        |
        */

        $c_categories = c_category::where('barcode', '=', $barcode)->get();

        if (count($c_categories) === 0) {
            c_category::create([
                'barcode' => $barcode,
                'cat1' => '-',
                'cat2' => '-',
                'cat3' => '-',
            ]);

            $c_categories = c_category::where('barcode', '=', $barcode)->get();
        }

        /*
        |--------------------------------------------------------------------------
        | c_skill
        |--------------------------------------------------------------------------
        |
        | 0000000000000000000000000000000000000000000000000000000000000000000000000
        | 0000000000000000000000000000000000000000000000000000000000000000000000000
        | 0000000000000000000000000000000000000000000000000000000000000000000000000
        | 0000000000000000000000000000000000000000000000000000000000000000000000000
        |
        */
        $c_skill = c_skill::where('barcode', '=', $barcode)->get();
        if (count($c_skill) === 0) {
            c_skill::create([
                'barcode' => $barcode,
                'sdesc' => '__',
            ]);

            $c_skill = c_skill::where('barcode', '=', $barcode)->get();
        }

        /*
        |--------------------------------------------------------------------------
        | c_infos
        |--------------------------------------------------------------------------
        |
        | 0000000000000000000000000000000000000000000000000000000000000000000000000
        | 0000000000000000000000000000000000000000000000000000000000000000000000000
        | 0000000000000000000000000000000000000000000000000000000000000000000000000
        | 0000000000000000000000000000000000000000000000000000000000000000000000000
        |
        */

        $bucs = DB::SELECT("SELECT * FROM c_infos WHERE barcode ='$barcode'");

        /*
        |--------------------------------------------------------------------------
        | basic_infos
        |--------------------------------------------------------------------------
        |
        | 0000000000000000000000000000000000000000000000000000000000000000000000000
        | 0000000000000000000000000000000000000000000000000000000000000000000000000
        | 0000000000000000000000000000000000000000000000000000000000000000000000000
        | 0000000000000000000000000000000000000000000000000000000000000000000000000
        |
        */

        $basic_info = DB::SELECT(
            "SELECT * FROM basic_infos WHERE barcode ='$barcode'"
        );

        if (count($basic_info) === 0) {
            DB::INSERT(
                "INSERT INTO `basic_infos`(`barcode`, `gender`, `dob`, `pob`, `height`, `weight`, `religion`, `blood_type`, `marital_status`, `no_of_children`, `objectives`, `photo`) VALUES ('$barcode','','','','','','','O+','SINGLE','0','-','default.jpg')"
            );
        }
        /*
        |--------------------------------------------------------------------------
        | c_contacts
        |--------------------------------------------------------------------------
        |
        | 0000000000000000000000000000000000000000000000000000000000000000000000000
        | 0000000000000000000000000000000000000000000000000000000000000000000000000
        | 0000000000000000000000000000000000000000000000000000000000000000000000000
        | 0000000000000000000000000000000000000000000000000000000000000000000000000
        |
        */
        $c_contact = DB::SELECT(
            "SELECT * FROM c_contacts WHERE barcode ='$barcode'"
        );

        /*
        |--------------------------------------------------------------------------
        | c_educs
        |--------------------------------------------------------------------------
        |
        | 0000000000000000000000000000000000000000000000000000000000000000000000000
        | 0000000000000000000000000000000000000000000000000000000000000000000000000
        | 0000000000000000000000000000000000000000000000000000000000000000000000000
        | 0000000000000000000000000000000000000000000000000000000000000000000000000
        |
        */
        $geteducation = DB::SELECT(
            "SELECT * FROM c_educs WHERE barcode ='$barcode'"
        );

        /*
        |--------------------------------------------------------------------------
        | contactPerson
        |--------------------------------------------------------------------------
        |
        | 0000000000000000000000000000000000000000000000000000000000000000000000000
        | 0000000000000000000000000000000000000000000000000000000000000000000000000
        | 0000000000000000000000000000000000000000000000000000000000000000000000000
        | 0000000000000000000000000000000000000000000000000000000000000000000000000
        |
        */

        $contactPerson = contactPerson::WHERE('barcode', '=', $barcode)->get();

        /*
        |--------------------------------------------------------------------------
        | experience
        |--------------------------------------------------------------------------
        |
        | 0000000000000000000000000000000000000000000000000000000000000000000000000
        | 0000000000000000000000000000000000000000000000000000000000000000000000000
        | 0000000000000000000000000000000000000000000000000000000000000000000000000
        | 0000000000000000000000000000000000000000000000000000000000000000000000000
        |
        */

        $c_exp = DB::SELECT("SELECT * FROM c_exps WHERE barcode ='$barcode'");

        $compct = [
            'bucs',
            'officer',
            'basic_info',
            'c_contact',
            'contactPerson',
            'geteducation',
            'c_categories',
            'c_skill',
            'c_exp',
        ];

        if (Auth::user()->type == 0) {
            return view('worker.c_info_update', compact($compct));
        } else {
            // GET THE USERNAME IN CINFO
            $usernameAccount = Auth::user()->username;

            // COMPARE TO CURRENT LOGIN USERNAME
            $getusername = DB::SELECT(
                "SELECT * FROM c_infos WHERE barcode ='$barcode'"
            );

            $usertoCompare = $getusername[0]->account_officer;
            $allowedUser = $getusername[0]->allowed;

            if ($usernameAccount === $usertoCompare) {
                return view('worker.c_info_update', compact($compct));
            } elseif ($usernameAccount === $allowedUser) {
                return view('worker.c_info_update', compact($compct));
            } else {
                return 'THIS IS NOT YOUR APPLICANT <hr> <a href="/home">RETURN HOME</a>';
            }
        }
    }

    /*
    |--------------------------------------------------------------------------
    | update
    |--------------------------------------------------------------------------
    |
    | 0000000000000000000000000000000000000000000000000000000000000000000000000
    | 0000000000000000000000000000000000000000000000000000000000000000000000000
    | 0000000000000000000000000000000000000000000000000000000000000000000000000
    | 0000000000000000000000000000000000000000000000000000000000000000000000000
    |
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

    /*
    |--------------------------------------------------------------------------
    | destroy
    |--------------------------------------------------------------------------
    |
    | 0000000000000000000000000000000000000000000000000000000000000000000000000
    | 0000000000000000000000000000000000000000000000000000000000000000000000000
    | 0000000000000000000000000000000000000000000000000000000000000000000000000
    | 0000000000000000000000000000000000000000000000000000000000000000000000000
    |
    */
    public function destroy($id)
    {
        //
    }

    /*
    |--------------------------------------------------------------------------
    | search position
    |--------------------------------------------------------------------------
    |
    | 0000000000000000000000000000000000000000000000000000000000000000000000000
    | 0000000000000000000000000000000000000000000000000000000000000000000000000
    | 0000000000000000000000000000000000000000000000000000000000000000000000000
    | 0000000000000000000000000000000000000000000000000000000000000000000000000
    |
    */

    public function position()
    {
        return view('worker.position');
    }

    public function position_find(Request $request)
    {
        $keyword = $request->keyword;

        if (Auth::user()->type == 0) {
            $findings = DB::SELECT(
                "SELECT c_infos.barcode, c_infos.fullname, c_infos.status, c_categories.cat1, c_categories.cat2 FROM c_categories INNER JOIN c_infos ON c_infos.barcode=c_categories.barcode and c_categories.cat1 LIKE '%$keyword%';"
            );
        } else {
            $code = Auth::user()->code;

            $findings = DB::SELECT(
                "SELECT c_infos.barcode, c_infos.account_officer, c_infos.allowed, c_infos.fullname, c_infos.status, c_categories.cat1, c_categories.cat2 FROM c_categories INNER JOIN c_infos ON c_infos.barcode=c_categories.barcode and c_categories.cat1 LIKE '%$keyword%' and c_infos.account_officer LIKE '%$code%' OR c_infos.allowed LIKE '%$code%'  "
            );
        }

        return view('worker.position', compact('findings'));
    }

    /*
    |--------------------------------------------------------------------------
    | search name 
    |--------------------------------------------------------------------------
    |
    | 0000000000000000000000000000000000000000000000000000000000000000000000000
    | 0000000000000000000000000000000000000000000000000000000000000000000000000
    | 0000000000000000000000000000000000000000000000000000000000000000000000000
    | 0000000000000000000000000000000000000000000000000000000000000000000000000
    |
    */

    public function fullname()
    {
        return view('worker.name');
    }

    public function fullname_find(Request $request)
    {
        $keyword = $request->keyword;

        if (Auth::user()->type == 0) {
            $findings = DB::SELECT(
                "SELECT c_infos.barcode, c_infos.fullname, c_infos.status, c_categories.cat1, c_categories.cat2 FROM c_categories INNER JOIN c_infos ON c_infos.barcode=c_categories.barcode and c_infos.fullname LIKE '%$keyword%';"
            );
        } else {
            $code = Auth::user()->code;

            $findings = DB::SELECT(
                "SELECT c_infos.barcode, c_infos.account_officer, c_infos.allowed, c_infos.fullname, c_infos.status, c_categories.cat1, c_categories.cat2 FROM c_categories INNER JOIN c_infos ON c_infos.barcode=c_categories.barcode and c_infos.fullname LIKE '%$keyword%' and c_infos.account_officer LIKE '%$code%' OR c_infos.allowed LIKE '%$code%'  "
            );
        }

        return view('worker.name', compact('findings'));
    }

    /*
    |--------------------------------------------------------------------------
    | START POINT FOR SEARCH
    |--------------------------------------------------------------------------
    |
    | 0000000000000000000000000000000000000000000000000000000000000000000000000
    | 0000000000000000000000000000000000000000000000000000000000000000000000000
    | 0000000000000000000000000000000000000000000000000000000000000000000000000
    | 0000000000000000000000000000000000000000000000000000000000000000000000000
    |
    */

    public function homesearch()
    {
        return view('worker.homesearch');
    }

    /*
    |--------------------------------------------------------------------------
    | experience
    |--------------------------------------------------------------------------
    |
    | 0000000000000000000000000000000000000000000000000000000000000000000000000
    | 0000000000000000000000000000000000000000000000000000000000000000000000000
    | 0000000000000000000000000000000000000000000000000000000000000000000000000
    | 0000000000000000000000000000000000000000000000000000000000000000000000000
    |
    */

    public function experience(Request $request)
    {
        c_exp::create([
            'barcode' => strtoupper($request->barcode),
            'cposition' => strtoupper($request->cposition),
            'ccompany' => strtoupper($request->ccompany),
            'ccountry' => strtoupper($request->ccountry),
            'sdesc' => $request->textdecs,
            'cdate' => strtoupper($request->cdate),
        ]);

        return 'SUCCESSFULLY ADD NEW EXP';
    }

    public function pullexp(Request $request)
    {
        $id = $request->id;
        $c_exp = c_exp::find($id);

        return response()->json($c_exp);
    }

    public function pullupdate(Request $request)
    {
        $epxID = $request->epxID;
        $ucposition = $request->ucposition;
        $ucdate = $request->ucdate;
        $uccompany = $request->uccompany;
        $uccountry = $request->uccountry;
        $summernote4 = $request->summernote4;

        $record = c_exp::find($epxID);

        // Update the record with the new values
        $record->cposition = $ucposition;
        $record->ccompany = $uccompany;
        $record->cdate = $ucdate;
        $record->sdesc = $summernote4;
        $record->ccountry = $uccountry;

        // Save the changes
        $record->save();

        return 'SUCCESSFULLY UPDATED';
    }

    public function pulldelete(Request $request)
    {
        $id = $request->id;

        $exp = c_exp::find($id);
        $exp->delete();

        return 'success';
    }
}