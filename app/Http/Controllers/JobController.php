<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Jobs;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newJob = new Job();

        $newJob->charge = $request->charge;
        $newJob->occupation_id = $request->occupation_id;

        $newJob->save();

        return response()->json([
            "exito" => "cargo creado correctamente"
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $jobs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $jobs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Job $jobs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $jobs)
    {
        //
    }
}
