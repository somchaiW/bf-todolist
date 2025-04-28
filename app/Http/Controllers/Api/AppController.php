<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Appresponse; 

class AppController extends Controller
{
    
    public function ini_app()
    {
        return response()->json([
            'status' => 'success',
            'status_code' => 200,
            'data' => [
                'system_config' => [
                    'background_color' => '0xFF000000',
                    'text_color' => '0xFFffffff',
                    'button_color' => '0xFF8687E7'
                ]
            ] 
        ],200);
    }
    public function index()
    {
        //
    }


    public function register(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'surname'=>'required',
            'username'=>'required',
            'password'=>'required'
        ]);
        $post = Appresponse::create([
            'name'=>$request->name,
            'surname'=>$request->surname,
            'username'=>$request->username,
            'password'=>bcrypt($request->password)
        ]);
            return response()->json([
                'status' => 'success',
                'status_code' => 200,
                'data' => [
                    'acc_token'=>'test_token'
                ]
        ],200);
    }

    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        $user = Appresponse::where('username', $username)->first();

        if($user && Hash::check($password,$user->password)) {
            return response()->json([
                'status' => 'success',
                'status_code' => 200,
                'data' => [
                    'acc_token' => 'test_token',
                    'text' => 'Login success'
                ]
            ]);
        } else {
            return response()->json([
                'status' => 'success',
                'status_code' => 400,
                'data' => [
                'text' => 'Login fail'
                ]
            ]);
        }
    }
    /**
     * Display the specified resource.
     */
    public function get_user($id)
    {
        $user = Appresponse::find($id);

    if (!$user) {
        return response()->json([
            'status' => 'error',
            'status_code' => 404,
            'data' =>[
                'text' => 'ไม่พบผู้ใช้งาน'
            ]
        ], 404);
    }

    return response()->json([
        'status' => 'success',
        'status_code' => 200,
        'data' => [
            'user_info' => [
                'id' => $user->id,
                'img' => $user->img ?? 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/0f/Grosser_Panda.JPG/1200px-Grosser_Panda.JPG',
                'f_name' => $user->name,
                'l_name' => $user->surname
            ]
        ]
            ]);
    }
    

    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */            
        
    public function destroy(string $id)
    {
        //
    }
}
