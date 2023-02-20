<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\c_contact;
use App\Models\contactPerson;
use DB;
use Redirect;

class contactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contacts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $typeContact = $request->typeContact;
        $contactDetails = $request->contactDetails;

        // $c_info = DB::INSERT(
        //     "INSERT INTO `c_contacts`(`barcode`, `type`, `contact_details`) VALUES ('$barcode','$typeContact','$contactDetails')"
        // );

        c_contact::create([
            'barcode' => $barcode,
            'type' => $typeContact,
            'contact_details' => $contactDetails,
        ]);

        return redirect()
            ->back()
            ->with('successMsg', 'NEW CONTACT DETAIL SUCCESSFULLY ADDED');
    }

    public function contactPersonstore(Request $request)
    {
        contactPerson::create($request->all());
        return redirect()->back();
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
        // THIS IS CONTACT INFO
        $c_contact = c_contact::find($id);
        $c_contact->delete(); //returns true/false
        return 'CONTACT DELETED';
    }

    public function c_person_destroy($id)
    {
        // THIS IS CONTACT PERSON
        $contactPerson = contactPerson::find($id);
        $contactPerson->delete(); //returns true/false
        return 'CONTACT PERSON DETAILS  DELETED';
    }
}
