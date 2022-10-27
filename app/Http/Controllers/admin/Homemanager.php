<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\HomeSlide;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class Homemanager extends Controller
{
    //

    public function viewHomeSection()
    {
        $homeSection = HomeSlide::find(1);
        return view('admin.page.home_section_admin_view', compact('homeSection'));
    }

    public function saveHomeSlider(Request $request)
    {

        $slide_id = $request->id;
        if ($request->file('slider_image')) {
            $image = $request->file('slider_image');
            $fileName = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(636, 852)->save('backend/uploads/homeslide/' . $fileName);
            $save_url = 'backend/uploads/homeslide/' . $fileName;
            HomeSlide::findOrFail($slide_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'video_url' => $request->video_url,
                'home_slide' => $save_url
            ]);

            $notification = array(
                'message' => 'Home Slide Updated with Image Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            HomeSlide::findOrFail($slide_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'video_url' => $request->video_url,

            ]);

            $notification = array(
                'message' => 'Home Slide Updated with out Image Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    }



    public function viewAboutSection()
    {
        return view('admin.page.about_section_admin_view');
    }
}
