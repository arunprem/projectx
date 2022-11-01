<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioManagementController extends Controller
{
    //

    public function portfolioHome()
    {

        $portfolio = Portfolio::latest()->get();

        return view('admin.page.portfoli_section_admin_view', compact('portfolio'));
    }

    public function portfolioAddView()
    {
        return view('admin.page.portfolio_add');
    }


    public function portfolioEditView($id)
    {
        $portfolio_edit = Portfolio::find($id);
        return view('admin.page.portfolio_edit',compact('portfolio_edit'));
    }

    public function portfolioRemvoe()
    {
        return "deleted";
    }

    public function portfolioSave(Request $request)
    {
        Portfolio::create([
            "portfolio_name" => $request->name,
            "portfoli_title" => $request->short_title,
            "portfoli_description" => $request->description,
            "portfoli_image" => null
        ]);
        $notification = array(
            'message' => 'Portfolio added',
            'alert-type' => 'success'
        );
        return redirect()->route('portfolio.section')->with($notification);
    }

    public function portfolioUpdate(Request $request){
        Portfolio::where('id',$request->id)->update([
            "portfolio_name" => $request->name,
            "portfoli_title" => $request->short_title,
            "portfoli_description" => $request->description,
            "portfoli_image" => null
        ]);
        $notification = array(
            'message' => 'Portfolio updated',
            'alert-type' => 'success'
        );
        return redirect()->route('portfolio.section')->with($notification);
    }
}
