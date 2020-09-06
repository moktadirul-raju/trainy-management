<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Division;
use App\District;
use App\Upazila;
use App\Exam;
use App\University;
use App\Board;
use App\Trainy;
use App\Education;

class ApiController extends Controller
{
	public function register(Request $request){
		$this->validate($request,[
			'name' => 'required',
            'email' => 'required',
            'division_id' => 'required',
            'district_id' => 'required',
            'upazila_id' => 'required',
            'address' => 'required',
            'exam_id' => 'required',
            'university_id' => 'required',
            'board_id' => 'required',
            'result' => 'required',
            'photo' => 'required',
            'language' => 'required',		
        ]);

        $trainy = new Trainy();
        $trainy->name = $request->name;
        $trainy->email = $request->email;
        $trainy->division_id = $request->division_id;
        $trainy->district_id = $request->district_id;
        $trainy->upazila_id = $request->upazila_id;
        $trainy->address = $request->address;
        $trainy->photo = $request->photo;
        $trainy->language = $request->language;
        $trainy->training_name = $request->training_name;
        $trainy->training_details = $request->training_details;
        if($request->photo) {
            $strpos = strpos($request->photo,';');
            $sub = substr($request->photo,0,$strpos);
            $ex = explode('/',$sub)[1];
            $imageName = time().".".$ex;
            $img = Image::make($request->photo)->resize(300, 300);
            //$upload_path = public_path()."/images/category/";
            $img->save('images/'.$imageName);
        } else {
            $imageName = null;
        }
        $trainy->photo = $imageName;

        if($request->hasFile('cv')){
            $uniqueFileName = uniqid() . $request->file('cv')->getClientOriginalName() ;
            $request->file('cv')->move('files', $uniqueFileName);
        } else {
            $uniqueFileName = null;
        }
        $trainy->cv = $uniqueFileName;
       
        $trainy->exam_id = $request->exam_id;
        $trainy->university_id = $request->university_id;
        $trainy->board_id = $request->board_id;
        $trainy->result = $request->result;
         $trainy->save();
        return response()->json(['message'=>'Successfully Applied']);
	}

    public function getAllDivision(){
    	$divisions = Division::all();
    	return $divisions;
    }

    public function getDistrict($id){
    	return District::where('division_id',$id)->get();
    }

    public function getUpazila($id){
    	return Upazila::where('district_id',$id)->get();
    }

    public function getAllExam(){
    	return Exam::all();
    }

    public function getAllUniversity(){
    	return University::all();
    }

     public function getAllBoard(){
    	return Board::all();
    }
}
