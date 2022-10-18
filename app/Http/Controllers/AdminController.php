<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        $notification = array(
            'message' => 'Admin profile updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.profile')->with($notification);
    } //end method

    public function changePassword()
    {
        return view('admin.change_password_view');
    } //end method

    public function savePassword(Request $request)
    {
        $validateData = $request->validate([
            'oldPassword' => 'required',
            'newPassword' => 'required',
            'confirmPassword' => 'required|same:newPassword',
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldPassword, $hashedPassword)) {
            $user = User::find(Auth::id());
            $user->password = bcrypt($request->newPassword);
            $user->save();
            session()->flash('message', 'Password updated');
            return redirect()->back();
        } else {
            session()->flash('message', 'Old password is not match');
            return redirect()->back();
        }
    } //end method
}
