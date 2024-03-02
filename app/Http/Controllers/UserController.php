<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{

    public function index()
    {
        try {

            $users = User::all();

            if ($users->isEmpty()) {
                return response()->json([
                    "message" => "no users to show"
                ], 204);
            }

            return response()->json($users, 200);
        } catch (\Exception $e) {

            Log::error('Error displaying users: ' . $e->getMessage());

            return response()->json([
                'error' => 'An error ocurred durign the proccess',
            ], 500);
        }
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

            Log::error('Error creating user: ' . $e->getMessage());

            return response()->json([
                'error' => 'An error ocurred durign the proccess',
            ], 500);
        }
    }


    public function show(User $user)
    {
        try {
            return response()->json([
                "user" => $user
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error displaying the user: ' . $e->getMessage());
            return response()->json([
                "error" => "An error occurred during the process",
                "error_message" => $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(User $user)
    {
        try {

            $user->delete();

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
