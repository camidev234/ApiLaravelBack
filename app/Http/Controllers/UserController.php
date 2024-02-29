<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
   
    public function index()
    {
        //
    }

    public function store(CreateUserRequest $request)
    {
        try {

            DB::beginTransaction();

            $userCreated = new User();
            $userCreated->name = $request->input('name');
            $userCreated->last_name = $request->input('last_name');
            $userCreated->document_type = $request->input('document_type');
            $userCreated->number_document = $request->input('number_document');
            $userCreated->telephone = $request->input('telephone');
            $userCreated->phone_number = $request->input('phone_number');
            $userCreated->address = $request->input('address');
            $userCreated->birthdate = $request->input('birthdate');
            $userCreated->email = $request->input('email');
            $userCreated->password = bcrypt($request->input('password'));

            $userCreated->save();

            DB::commit();

            return response()->json($userCreated, 201);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'error' => 'An error ocurred durign the proccess',
                'error_message' => $e
            ], 500);
        }
    }


    public function show(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
