<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    } // end method


    public function Profile()
    {
        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view('admin.admin_profile_view', compact('adminData'));
    } //end method


    public function EditProfile()
    {
        $id = Auth::user()->id;
        $editProfileData = User::find($id);
        return view('admin.admin_profile_edit_view', compact('editProfileData'));
    } //end method

    public function saveProfile(Request $request)
    {
        $id = Auth::user()->id;
        $saveData = User::find($id);
        $saveData->name = $request->name;
        $saveData->email = $request->email;
        if ($request->file('profile_image')) {
            $file = $request->file('profile_image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('backend/uploads/admin_images'), $filename);
            $saveData->profile_image = $filename;
        }

        $saveData->save();
        return redirect()->route('admin.profile');
    }
}
