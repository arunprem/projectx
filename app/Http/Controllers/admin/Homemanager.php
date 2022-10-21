<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Homemanager extends Controller
{
    //

    public function viewHomeSection()
    {
        return view('admin.page.home_section_admin_view');
    }

    public function viewAboutSection()
    {
        return view('admin.page.about_section_admin_view');
    }
}
