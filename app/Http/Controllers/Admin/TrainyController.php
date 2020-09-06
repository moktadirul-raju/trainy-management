<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Division;
use App\Trainy;

class TrainyController extends Controller
{
    public function allTrainy(){
    	$divisions = Division::all();
    	return view('admin.trainy',compact('divisions'));
    }

    public function searchTrainy(Request $request){
    	$this->validate($request,['division_id'=>'required','district_id'=>'required','upazila_id'=>'required','query'=>'required']);
		$query = $request->get('query');
    	$traines = Trainy::where('division_id',$request->division_id)
	    	->where('district_id',$request->district_id)
	    	->where('upazila_id',$request->upazila_id)
	    	->where('name','LIKE',"%$query%")
	    	->orWhere('email','LIKE',"%$query")->get();
	    	$divisions = Division::all();
	    	return view('admin.trainy',compact('traines','divisions'));
    }

    public function viewTrainy($id){
    	$trainy = Trainy::findOrFail($id);
    	return view ('admin.view',compact('trainy'));
    }

    public function destroyTrainy($id){
    	$trainy = Trainy::find($id);
    	if(file_exists('images/'.$trainy->photo) AND !empty($trainy->icon)){
            unlink('images/'.$trainy->photo);
    	}
    	$trainy->delete();
    	return redirect()->route('admin.trainy')->with('message','Successfully Delete');
    }
}
