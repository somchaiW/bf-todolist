<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $users = \App\Models\User::all();
        return view('user.index', compact('users')); 

    }
    public function register() {
        return view('user.register');
    }

    public function store(Request $request){
        $request->validate([
            'first_name'=>'required|string|max:100',//key,
            'last_name'=>'required|string|max:100',
            'email'=> ['required','email',Rule::unique('users')->whereNull('deleted_at')],
            'password'=>'required|confirmed|min:8',
        ]);
        User::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'password'   => Hash::make($request->password),
        ]);
        
        return redirect()->route('users.index')->with ('success','Register has been successfully!!');
    }
  
   
    public function destroy($id){
        $user = User::findOrFail($id);
        $user ->delete();
        
        return redirect()->route('users.index')->with('success','User has been deleted successfully!!');
    }
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('user.show',compact('user'));
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit',compact('user'));
    }
    public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    
    $request->validate([
        'first_name' => 'required|string|max:100',
        'last_name' => 'required|string|max:100',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    
    $user->update($request->only('first_name', 'last_name', 'email'));

    
    if ($request->hasFile('avatar')) {
        
        $avatarPath = $request->file('avatar')->store('avatars', 'public');
        if ($user->avatar) {
            
            Storage::disk('public')->delete($user->avatar);
        }
        $user->avatar = $avatarPath;
        $user->save();
    }

    return redirect()->route('users.index')->with('success', 'User updated successfully!');
}


}
