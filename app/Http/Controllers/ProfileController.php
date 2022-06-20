<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
   public function index()
   {
       $user = User::where('id', Auth::user()->id)->first();

       return view('profile.index', compact('user'));
   }

   public function update(Request $request)
   {
        $this->validate($request,[
            'password' => 'confirmed',
        ]);

        $user = User::where('id', Auth::user()->id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->nohp = $request->nohp;
        $user->alamat = $request->alamat;
        if(!empty($request->password))
        {
            $user->password = Hash::make($request->password);
        }
        
        $user->update();

        Alert::success('Success', 'Update Success');

        return redirect('/profile');

   }
}
