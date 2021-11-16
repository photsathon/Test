<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // all profile
    public function index()
    {
        $profile = Profile::all()->toArray();
        return $profile;
    }


    // edit profile
    public function edit($id)
    {
        $profile = Profile::find($id);
        return response()->json($profile);
    }

    // update profile
    public function update($id, Request $request)
    {
          $profile = Profile::find($id);
        $profile->firstname=$request->firstname;
        $profile->lastname=$request->lastname;
        $profile->password=Hash::make($request->password);

        $proflie->save();
          
         return response()->json(' successfully updated');
        
     }

}