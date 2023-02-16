<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\c_info;
use App\Models\User;
use App\Models\fdh;
use App\Models\basic_info;
use DB;
use Exception;
use Illuminate\Support\Facades\Validator;

class basic_info_Controller extends Controller
{
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
        $basic_infos_barcode = $request->basic_infos_barcode;
        $basic_infos_gender = $request->basic_infos_gender;
        $basic_infos_dob = $request->basic_infos_dob;
        $basic_infos_pob = $request->basic_infos_pob;
        $basic_infos_height = $request->basic_infos_height;
        $basic_infos_weight = $request->basic_infos_weight;
        $basic_infos_religion = $request->basic_infos_religion;
        $basic_infos_blood_type = $request->basic_infos_blood_type;
        $basic_infos_marital_status = $request->basic_infos_marital_status;
        $basic_infos_no_of_children = $request->basic_infos_no_of_children;
        $summernote = $request->summernote;

        $basic_infos = DB::UPDATE(
            "UPDATE `basic_infos` SET `gender`='$basic_infos_gender',`dob`='$basic_infos_dob',`pob`='$basic_infos_pob',`height`='$basic_infos_height',`weight`='$basic_infos_weight',`religion`='$basic_infos_religion',`blood_type`='$basic_infos_blood_type',`marital_status`='$basic_infos_marital_status',`no_of_children`='$basic_infos_no_of_children',`objectives`='$summernote' WHERE barcode ='$basic_infos_barcode'"
        );

        return 'BASIC INFO UPDATED';
    }
    public function uploadphoto(Request $request)
    {
        $data = [];

        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);

        if ($validator->fails()) {
            $data['success'] = 0;
            $data['error'] = $validator->errors()->first('file'); // Error response
        } else {
            if ($request->file('file')) {
                $file = $request->file('file');
                $filename = time() . '_' . $file->getClientOriginalName();

                // File extension
                $extension = $file->getClientOriginalExtension();

                // File upload location
                $location = 'uploaded_photo';

                // Upload file
                $file->move($location, $filename);

                // File path
                $filepath = url('public/uploaded_photo/' . $filename);

                // Response
                $data['success'] = 1;
                $data['message'] = 'Uploaded Successfully!';
                $data['filepath'] = $filepath;
                $data['extension'] = $extension;
                $data['filename'] = $filename;
            } else {
                // Response
                $data['success'] = 2;
                $data['message'] = 'File not uploaded.';
            }
        }

        return response()->json($data);
    }

    public function uploader(Request $request)
    {
        $imageimg = $request->imageimg;
        $bcodeimg = $request->bcodeimg;

        $basic_infos = DB::UPDATE(
            "UPDATE `basic_infos` SET `photo`='$imageimg' WHERE barcode='$bcodeimg'"
        );

        return 'PHOTO UPDATED SUCCESSFULLY';
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
