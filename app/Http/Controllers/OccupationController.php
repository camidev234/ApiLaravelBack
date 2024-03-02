<?php

namespace App\Http\Controllers;

use App\Http\Requests\OccupationRequest;
use App\Models\Occupation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OccupationController extends Controller
{
    public function index()
    {
        try {
            $occupations = Occupation::all();

            if ($occupations->isEmpty()) {
                return response()->json([
                    "message" => "no occupations to show"
                ], 204);
            }

            return response()->json([
                'occupations' => $occupations
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'Error' => 'An error ocurred'
            ], 500);
        }
    }


    public function store(OccupationRequest $request)
    {
        try {

            $occupation = new Occupation();

            $occupation->occupation_code = $request->input('occupation_code');
            $occupation->occupation_name = $request->input('occupation_name');
            $occupation->description = $request->input('description');


            $occupation->save();

            return response()->json([
                'message' => 'Occupation created successfully',
                'occupation' => $occupation
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'An error occurred while creating the occupation',
                'error_message' => $e->getMessage()
            ], 500);
        }
    }

    public function show(Occupation $occupation)
    {
        try {
            return response()->json([
                "occupation" => $occupation
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error displaying the user: ' . $e->getMessage());
            return response()->json([
                "error" => "An error occurred during the process",
                "error_message" => $e->getMessage()
            ], 500);
        }
    }

    public function edit(Occupation $Occupation)
    {
        //
    }

    public function update(Request $request, Occupation $Occupation)
    {
        //
    }

    public function destroy(Occupation $occupation)
    {
        try {

            $occupation->delete();

            return response()->json([
                "success" => "User deleted"
            ], 200);
        } catch (\Exception $e) {

            Log::error('Error deleting the user: ' . $e->getMessage());
            return response()->json([
                "error" => "An error occurred during the process",
                "error_message" => $e->getMessage()
            ], 500);
        }
    }
}
