<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class usercontroller extends Controller
{
    public function index()
    {
        $allusers = User::all();
        return view('Admin.users',['data'=>$allusers]);
    }

    public function addUser(Request $req)
    {

        $usermodel = new User();
        $usermodel->name = $req->name;
        $usermodel->email = $req->email;
        $usermodel->password = Hash::make($req->password);
        $usermodel->save();

        if($usermodel){
            return back()->with('done','User has been added!');
        }
        else{
            return back()->with('error','Something went wrong!');
        }

    }
    public function get(Request $req){
        $user = User::find($req->id);
        if ($user) {
            return response()->json([
                'success' => true,
                'data' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                ]
            ]);
        } else {
            return response()->json(['success' => false]);
        }
    }
    public function edit(Request $req)
    {
       
        $user = User::findOrFail($req->editId);

        if($user)
        {
            $user->name=$req->editName;
            $user->email=$req->editEmail;
           $user->password=Hash::make($req->editPassword);
            $user->save();
        }
        return back();
    }
    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();
        return back();
    }
}
