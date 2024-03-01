<?php

namespace App\Http\Controllers;

use App\Models\Occupation;
use Illuminate\Http\Request;

class OccupationController extends Controller
{
    public function index()
    {
        try {
            $occupations = Occupation::all();

            if($occupations->isEmpty()){
                return response()->json([
                    "message" => "no occupations to show"
                ], 204);
            }

            return response()->json([
                'occupations' => $occupations
            ], 200);
            
        } catch(\Exception $e) {
            return response()->json([
                'Error' => 'An error ocurred'
            ], 500);
        }
    }


    public function store(Request $request)
    {
        //
    }

    public function show(Occupation $Occupation)
    {
        //
    }

    public function edit(Occupation $Occupation)
    {
        //
    }

    public function update(Request $request, Occupation $Occupation)
    {
        //
    }

    public function destroy(Occupation $Occupation)
    {
        //
    }
}
