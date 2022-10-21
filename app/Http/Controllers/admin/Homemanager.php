<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\HomeSlide;
use Illuminate\Http\Request;

class Homemanager extends Controller
{
    //

    public function viewHomeSection()
    {
        $homeSection = HomeSlide::find(1);
        return view('admin.page.home_section_admin_view',compact('homeSection'));
    }

    public function saveHomeSlider(Request $request){
     
        $slide_id = $request->id;
        if($request->file('slider_image')){
            $image = $request->file('slider_image');
            $fileName = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            
        //    Image::make($image)->resize();
            

        }
    }



    public function viewAboutSection()
    {
        return view('admin.page.about_section_admin_view');
    }
}
