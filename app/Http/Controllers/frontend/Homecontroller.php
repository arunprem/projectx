<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\HomeSlide;
use Illuminate\Http\Request;

class Homecontroller extends Controller
{
    public function home()
    {
        $homeData = HomeSlide::find(1);

        $aboutData = array(
            "heading" => "I have transform your ideas into remarkable digital products",
            "subHeading" => "25+ Years Experience In this game, Means
            Product Designing",
            "details" => "I love to work in User Experience & User Interface designing. Because I love to solve the design problem and find easy and better solutions to solve it. I always try my best to make good user interface with the best user experience. I have been working as a UX Designer"
        );

        return view('frontend.main', compact('homeData', 'aboutData'));
    }
}
