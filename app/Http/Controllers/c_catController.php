<?php

namespace App\Http\Controllers;
use App\Models\c_category;

use Illuminate\Http\Request;

class c_catController extends Controller
{
    public function update(Request $request)
    {
        try {
            $cat1 = $request->cat1;
            $cat2 = $request->cat2;
            $cat3 = $request->cat3;
            $id = $request->id;

            c_category::where('id', $id)->update([
                'cat1' => $cat1,
                'cat2' => $cat2,
                'cat3' => $cat3,
            ]);

            return 'CATEGORY UPDATED';
        } catch (Exception $e) {
            // Log or display the error message
            Log::error('Error updating record: ' . $e->getMessage());
            return response()->json(['error' => 'Error updating record'], 500);
        }
    }
}
