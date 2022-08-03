<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductGModel;

class AdminProductController extends Controller
{
   public function product_list(Request $request)
   {
    if ($request->ajax()) {
            // using eloquent model donot use get()
            $model = ProductGModel::orderby('PersonID','ASC');
            // dd($model);
            return app('datatables')->eloquent($model)
                //adding index or s.no
                ->addIndexColumn()
                ->addColumn('action', function($model){
                //adding buttons to datatable
                $btn = '
                <a href="'.route('admin_products_edit',[$model->PersonID]).'" class="edit btn btn-primary btn-sm">Edit</a>
                        <a href="'.route('admin_products_delete',[$model->PersonID]).'" class="edit btn btn-danger btn-sm">Delete</a>';
                return $btn;
                })
                ->toJson();
        }
   		$product = ProductGModel::get();
        return view('admin.products.products-list');
   }
   public function product_add()
   {
  		return view('admin.products.products-add');
   }
   public function product_edit($id)
   {

  		$product = ProductGModel::where('PersonID',$id)->first();
        return view('admin.products.products-edit',compact('product'));
   }
   public function product_delete(ProductGModel $product)
   {
   		$product->delete();
        return back()->with('delete','Deleted Successfully');
   }
   public function product_add_edit_data(Request $request,ProductGModel $product)
   {
        // dd($request->all());
        if($request->person_id != ''){
        $product = ProductGModel::where('PersonID',$request->person_id)->first();
        $product->Prefix = $request->prefix;
        $product->LastName = $request->lastname;
        $product->SuffixOrTwin = $request->suffixortwin;
        $product->AltLastNameSpelling1 = $request->alt1;
        $product->AltLastNameSpelling2 = $request->alt2;
        $product->AltLastNameSpelling3 = $request->alt3;
        $product->FirstName = $request->firstname;
        $product->MiddleNameInitial = $request->middleinitial;
        $product->AltGivenMiddleMaidenName = $request->altgiven;
        $product->Military = $request->military;
        $product->Comments = $request->comments;
        $product->ApproxBirthDate = $request->approxbirthdate;
        $product->ApproxBirthYear = $request->approxbirthyear;
        $product->DeathYear = $request->approxdeathyear;
        $product->ApproxDeathDate = $request->approxdeathdate;
        $product->Burial = $request->burial;
        $product->Section = $request->section;
        $product->StoneOneLine = $request->stoneoneline;
        $product->StoneOneType = $request->stoneonetype;
        $product->StoneOneNum = $request->stoneonenum;
        $product->StoneTwoLine = $request->stonetwoline;
        $product->StoneTwoNum = $request->stonetwonum;
        $product->StoneTwoType = $request->stonetwotype;
        $product->PacesBetweenStonesInSevenSectionsOnly = $request->paces;
        $product->SemiCircleLocationsOuterInnerFirstInnerSecondInner = $request->semicircle;
        $product->DirectionSemiCircleStonesFace = $request->direction;
        $product->TotalNumStonesInLine = $request->totalnum;
        $product->FirstNameInLine = $request->fninline;
        $product->Side = $request->side;
        $product->Grave = $request->grave;
        $product->LedgerPage = $request->ledgerpage;
        $product->Map1 = $request->map1;
        $product->Map2 = $request->map2;
        $product->Map3 = $request->map2;
        $product->status = $request->status;
        if($request->hasFile('pic1'))
        {
          $rules = $this->validate($request, [
            'pic1' => 'mimes:jpg,png,jpeg,pneg',
            ]);
            $pic = time().rand(1111,9999);
            $request->pic1->move(public_path('/assets/graveyard_images/images'), $pic.'.jpg');
            $product->PicID1 = $pic;
        }
         if($request->hasFile('pic2'))
        {
          $rules = $this->validate($request, [
            'pic2' => 'mimes:jpg,png,jpeg',
            ]);
            $pic = time().rand(1111,9999);
            $request->pic2->move(public_path('/assets/graveyard_images/images'), $pic.'.jpg');
            $product->PicID2 = $pic;
        }
         if($request->hasFile('pic3'))
        {
          $rules = $this->validate($request, [
            'pic3' => 'mimes:jpg,png,jpeg',
            ]);
            $pic = time().rand(1111,9999);
            $request->pic3->move(public_path('/assets/graveyard_images/images'), $pic.'.jpg');
            $product->PicID3 = $pic;
        }
         if($request->hasFile('pic4'))
        {
          $rules = $this->validate($request, [
            'pic4' => 'mimes:jpg,png,jpeg',
            ]);
            $pic = time().rand(1111,9999);
            $request->pic4->move(public_path('/assets/graveyard_images/images'), $pic.'.jpg');
            $product->PicID4 = $pic;
        }
        $product->update();
        return back()->with('update','Updated Successfully');
        }
        else{
          $product =  new ProductGModel();
        $product->Prefix = $request->prefix;
        $product->LastName = $request->lastname;
        $product->SuffixOrTwin = $request->suffixortwin;
        $product->AltLastNameSpelling1 = $request->alt1;
        $product->AltLastNameSpelling2 = $request->alt2;
        $product->AltLastNameSpelling3 = $request->alt3;
        $product->FirstName = $request->firstname;
        $product->MiddleNameInitial = $request->middleinitial;
        $product->AltGivenMiddleMaidenName = $request->altgiven;
        $product->Military = $request->military;
        $product->Comments = $request->comments;
        $product->ApproxBirthDate = $request->approxbirthdate;
        $product->ApproxBirthYear = $request->approxbirthyear;
        $product->DeathYear = $request->approxdeathyear;
        $product->ApproxDeathDate = $request->approxdeathdate;
        $product->Burial = $request->burial;
        $product->Section = $request->section;
        $product->StoneOneLine = $request->stoneoneline;
        $product->StoneOneType = $request->stoneonetype;
        $product->StoneOneNum = $request->stoneonenum;
        $product->StoneTwoLine = $request->stonetwoline;
        $product->StoneTwoNum = $request->stonetwonum;
        $product->StoneTwoType = $request->stonetwotype;
        $product->PacesBetweenStonesInSevenSectionsOnly = $request->paces;
        $product->SemiCircleLocationsOuterInnerFirstInnerSecondInner = $request->semicircle;
        $product->DirectionSemiCircleStonesFace = $request->direction;
        $product->TotalNumStonesInLine = $request->totalnum;
        $product->FirstNameInLine = $request->fninline;
        $product->Side = $request->side;
        $product->Grave = $request->grave;
        $product->LedgerPage = $request->ledgerpage;
        $product->Map1 = $request->map1;
        $product->Map2 = $request->map2;
        $product->Map3 = $request->map2;
        $product->status = $request->status;
        if($request->hasFile('pic1'))
        {
          $rules = $this->validate($request, [
            'pic1' => 'mimes:jpg',
            ]);
            $pic = time().rand(1111,9999);
            $request->pic1->move(public_path('/assets/graveyard_images/images'), $pic.'.jpg');
            $product->PicID1 = $pic;
        }
         if($request->hasFile('pic2'))
        {
          $rules = $this->validate($request, [
            'pic2' => 'mimes:jpg,png,jpeg',
            ]);
            $pic = time().rand(1111,9999);
            $request->pic2->move(public_path('/assets/graveyard_images/images'), $pic.'.jpg');
            $product->PicID2 = $pic;
        }
         if($request->hasFile('pic3'))
        {
          $rules = $this->validate($request, [
            'pic3' => 'mimes:jpg,png,jpeg',
            ]);
            $pic = time().rand(1111,9999); 
            $request->pic3->move(public_path('/assets/graveyard_images/images'), $pic.'.jpg');
            $product->PicID3 = $pic;
        }
         if($request->hasFile('pic4'))
        {
          $rules = $this->validate($request, [
            'pic4' => 'mimes:jpg,png,jpeg',
            ]);
            $pic = time().rand(1111,9999);
            $request->pic4->move(public_path('/assets/graveyard_images/images'), $pic.'.jpg');
            $product->PicID4 = $pic;
        }
        $product->save();
         return back()->with('success','Added Successfully');
          }
   }
}
