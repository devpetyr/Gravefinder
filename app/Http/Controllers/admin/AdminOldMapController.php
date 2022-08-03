<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OldMapModel;

class AdminOldMapController extends Controller
{
    
	public function oldmap()
	{
		 $oldside = OldMapModel::get();
        return view('admin.map-oldside.map-oldside-list',compact('oldside'));
	}

	public function old_add()
	{
		return view('admin.map-oldside.map-oldside-add');
	}

	public function old_edit($id)
	{
		$oldside = OldMapModel::where('id',$id)->first();
        return view('admin.map-oldside.map-oldside-edit',compact('oldside'));
	}

	public function old_delete(OldMapModel $oldmap)
	{
		 $oldmap->delete();
        return back()->with('delete','Deleted Successfully');
	}

	public function old_add_edit_data(Request $request,OldMapModel $oldmap)
	{
        $id = $request->map_id; 
		if($request->map_id == ''){
        if($request->images != '') {
                 foreach ($request->images as $image)
                {
                    $imageName = time().rand(1,100).'.'.$image->getClientOriginalExtension();
                    $image->move(public_path('/assets/graveyard_images/old-side'), $imageName);
                    /** Store a new images for products */
                    $storeImage = new OldMapModel();
                    $storeImage->image = $imageName;
                    $storeImage->save();
                }
                return redirect()->back()->with('success','Images were successfuly uploaded');
       }   
       }
       else{

        if($request->images != '') {
            $image = $request->images;
                    $imageName = time().rand(1,100).'.'.$image->getClientOriginalExtension();
                   $hi = $image->move(public_path('/assets/graveyard_images/old-side'), $imageName);
                    /** Store a new images for products */
                    $storeImage = OldMapModel::find($id);
                    $storeImage->image = $imageName;
                    $storeImage->update();
                
                return redirect()->back()->with('success','Images were successfuly updated');
       
            }
       }      
    } 
      
}
