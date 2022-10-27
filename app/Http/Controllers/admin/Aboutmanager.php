<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Aboutus;
use Illuminate\Http\Request;

class Aboutmanager extends Controller
{
    //


    public function aboutUsHome()
    {
        $aboutSection = Aboutus::find(1);
        return view('admin.page.about_section_admin_view', compact('aboutSection'));
    }

    public function saveAboutUs(Request $request)
    {
        $about_id = $request->id;
        Aboutus::findOrFail($about_id)->update([
            'title_about' => $request->title,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description
        ]);
        $notification = array(
            'message' => 'About us Updated',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
