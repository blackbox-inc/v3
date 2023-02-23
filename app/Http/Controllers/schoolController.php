<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\c_info;
use App\Models\User;
use App\Models\fdh;
use App\Models\c_educ;
use DB;

class schoolController extends Controller
{
    //

    public function create(Request $request)
    {
        $barcode = $request->barcode;
        $school = $request->school;
        $degree = $request->degree;
        $school_year = $request->school_year;

        c_educ::create([
            'barcode' => $barcode,
            'school' => $school,
            'degree' => $degree,
            'school_year' => $school_year,
        ]);

        return redirect()->back();
    }

    public function destroy($id)
    {
        // THIS IS CONTACT PERSON
        $deleteUser = c_educ::find($id);
        $deleteUser->delete(); //returns true/false
        return 'DETAILS  DELETED';
    }
}
