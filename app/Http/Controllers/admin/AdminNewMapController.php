<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewMapModel;

class AdminNewMapController extends Controller
{
    public function newmap()
	{
		 $newside = NewMapModel::get();
        return view('admin.map-newside.map-newside-list',compact('newside'));
	}

	public function new_add()
	{
		return view('admin.map-newside.map-newside-add');
	}

	public function new_edit($id)
	{
		$newside = NewMapModel::where('id',$id)->first();
        return view('admin.map-newside.map-newside-edit',compact('newside'));
	}

	public function new_delete(NewMapModel $newmap)
	{
		 $newmap->delete();
        return back()->with('delete','Deleted Successfully');
	}

	public function new_add_edit_data(Request $request,NewMapModel $oldmap)
	{
		 $id = $request->map_id; 
        if($request->map_id == ''){
        if($request->images != '') {
                 foreach ($request->images as $image)
                {
                    $imageName = time().rand(1,999).'.'.$image->getClientOriginalExtension();
                    $image->move(public_path('/assets/graveyard_images/new-side'), $imageName);
                    /** Store a new images for products */
                    $storeImage = new NewMapModel();
                    $storeImage->image = $imageName;
                    $storeImage->save();
                }
                return redirect()->back()->with('success','Images were successfuly uploaded');
       }   
       }
       else{

        if($request->images != '') {
            $image = $request->images;
                    $imageName = time().rand(1,999).'.'.$image->getClientOriginalExtension();
                   $image->move(public_path('/assets/graveyard_images/new-side'), $imageName);
                    /** Store a new images for products */
                    $storeImage = NewMapModel::find($id);
                    $storeImage->image = $imageName;
                    $storeImage->update();
                
                return redirect()->back()->with('success','Images were successfuly updated');
       
            }
       }      

    } 
}
