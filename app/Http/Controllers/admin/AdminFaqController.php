<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FaqModel;

class AdminFaqController extends Controller
{
   function faq()
    {
        $faq = FaqModel::get();
        return view('admin.faqs.faq-list',compact('faq'));
    }
    function faq_add()
    {
        return view('admin.faqs.faq-add');
    }
    function faq_edit($id)
    {
        $faq = FaqModel::where('id',$id)->first();
        return view('admin.faqs.faq-edit',compact('faq'));
    }
    function faq_delete(FaqModel $faq)
    {
        $faq->delete();
        return back()->with('delete','Deleted Successfully');
    }
    function faq_add_edit_data(Request $request,FaqModel $faq)
    {
        $create = 1;
        (isset($faq->id) and $faq->id>0)?$create=0:$create=1;
        $faq->title = $request->title;
        $faq->description = $request->description;
        $faq->status = $request->status;
        $faq->save();
        if($create == 0)
        {
            return back()->with('update','Updated Successfully');
        }
        else
        {
            return back()->with('success','Added Successfully');
        }
    }
}
