<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Aboutmultipleimage;
use App\Models\Aboutus;
use App\Models\HomeSlide;
use Illuminate\Http\Request;

class Homecontroller extends Controller
{
    public function home()
    {
        $homeData = HomeSlide::find(1);

        $aboutData = Aboutus::find(1);
        $aboutUsImage = Aboutmultipleimage::where('aboutus_id', '=', $aboutData->id)->orderByRaw("RAND()")->get();

        return view('frontend.main', compact('homeData', 'aboutData', 'aboutUsImage'));
    }
}
