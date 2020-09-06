<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Upazila;
use App\District;

class UpazilaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $upazilas = Upazila::all();
        $districts = District::all();
        return view('admin.upazila',compact('upazilas','districts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,['district_id'=>'required','upazila_name']);
        $upazila = new Upazila();
        $upazila->district_id = $request->district_id;
        $upazila->upazila_name = $request->upazila_name;
        $upazila->save();
        return redirect()->route('admin.upazila.index')->with('message','Successfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,['district_id'=>'required','upazila_name']);
        $upazila =  Upazila::find($id);
        $upazila->district_id = $request->district_id;
        $upazila->upazila_name = $request->upazila_name;
        $upazila->save();
        return redirect()->route('admin.upazila.index')->with('message','Successfully Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $upazila =  Upazila::find($id);
        $upazila->delete();
        return redirect()->route('admin.upazila.index')->with('message','Successfully Delete');
    }
}
