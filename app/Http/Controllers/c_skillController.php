<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\c_skill;
use Exception;

class c_skillController extends Controller
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
        return 1;
    }

    public function update1(Request $request)
    {
        $barcode = $request->skillId;

        c_skill::where('barcode', '=', $barcode)->update([
            'washing' => $request->isCheck_washing,
            'sewing' => $request->isCheck_sewing,
            'cleaning' => $request->isCheck_cleaning,
            'cooking' => $request->isCheck_cooking,
            'ironing' => $request->isCheck_ironing,
            'baby_care' => $request->isCheck_babycare,
            'english' => $request->english,
            'arabic' => $request->arabic,
            'mandarin' => $request->mandarin,
        ]);

        return 'UPDATED SUCCESS';
    }

    public function update2(Request $request)
    {
        $barcode = $request->barcode;

        c_skill::where('barcode', '=', $barcode)->update([
            'sdesc' => $request->textareaValu1e,
        ]);

        return 'UPDATED SUCCESS';
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
