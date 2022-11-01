<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioManagementController extends Controller
{
    //

    public function portfolioHome(){

        $portfolio = Portfolio::latest()->get();

        return view('admin.page.portfoli_section_admin_view',compact('portfolio'));
    }

    public function portfolioAddView(){
        return view('admin.page.portfolio_add');
    }


    public function portfolioEditView(){
        return view('admin.page.portfolio_edit');
    }

    public function portfolioRemvoe(){
        return "deleted";
    }

    public function portfolioSave(){
        return "saved";
    }

}
