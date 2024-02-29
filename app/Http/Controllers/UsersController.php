<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\password;

class UsersController extends Controller
{
    //consultar todos los usuarios
    public function index(){
        return User::paginate();
    }
    public function show($id){
        return User::find($id);

    }
    public function store(Request $request){
        $this->validate($request,[
            'username' => 'required|unique:users',
            'password' => 'required'
        ]);
        $user = new User;
        $user->fill($request->all());
        $user->password= Hash::make($request->password);
        $user->save();
        return $user;
    }
    public function update(Request $request, $id){
       if($request->username){
         $exist = User::where('username', $request->username)->first();
         if($exist) return response()->json(['error'=>'el usuario ya existe'],400);
       }
        $user = User::find($id);
        if($user) return response('',404);
        $user->fill($request->all());
        if(!$request->password)
            $user->password= Hash::make($request->password);
        $user->save();
        return $user;
    }
    //eliminar el usuario
    public function delete($id){
        $user = User::find($id);
        if(!$user) return response('',404);
        $user->delete();
        return $user;
    }
}
