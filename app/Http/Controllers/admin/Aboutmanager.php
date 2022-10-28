<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Aboutmultipleimage;
use App\Models\Aboutus;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

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
        if ($request->file('slider_image')) {
            $image = $request->file('about_images');
            foreach ($image as $multipleImage) {
                $fileName = hexdec(uniqid()) . '.' . $multipleImage->getClientOriginalExtension();
                Image::make($multipleImage)->resize(220, 220)->save('backend/uploads/aboutus/' . $fileName);
                $save_url = 'backend/uploads/aboutus/' . $fileName;
                Aboutmultipleimage::create([
                    'aboutus_id' => $about_id,
                    'image_url' => $save_url
                ]);
            }
        }

        $notification = array(
            'message' => 'About us Updated',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
