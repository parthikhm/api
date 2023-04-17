<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AdminsController extends Controller
{
    public function adminLogin(Request $request)
    {
        $admin= Admins::where('contact_no', $request->contact_no)->first();
            if (!$admin || !Hash::check($request->password, $admin->password)) {
                return response([
                    'message' => ['These credentials do not match our records.']

                ], 404);
            }

             $token = $admin->createToken('my-app-token')->plainTextToken;

            $response = [
                'admin'=> $admin,
                'token' => $token
            ];

             return response($response, 201);
    }

    public function addAdmin(Request $request){
        $request->validate([
            'role_id'=>'required',
            'name'=>'required',
            'email'=>'required',
            'contact_no'=>'required',
            'password'=>'required',
        ]);
        $admin = new Admins();
        $admin-> role_id = $request->role_id;
        $admin-> name = $request->name;
        $admin-> email = $request->email;
        $admin-> contact_no = $request->contact_no;
        $password = Hash::make($request->password);
        $admin -> password = $password;
        $admin -> is_active = 1;
        $admin->save();
        return response()->json(['message'=>'Data saved successfully'],200);
    }

    public function logout(Request $request){
        auth()->admin()->tokens()->delete();
        return response()->json(['message'=>'Admin Logout Successfully...!'],200);

    }
}
