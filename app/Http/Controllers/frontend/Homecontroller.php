<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Aboutus;
use App\Models\HomeSlide;
use Illuminate\Http\Request;

class Homecontroller extends Controller
{
    public function home()
    {
        $homeData = HomeSlide::find(1);

        $aboutData = Aboutus::find(1);

        return view('frontend.main', compact('homeData', 'aboutData'));
    }
}
