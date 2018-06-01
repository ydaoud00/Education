<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Center;

class CenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $centers = Center::all();

        return View::make('centers.index')->with('centers', $centers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('centers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'name' => 'required|string|max:255|unique:centers',
            'city' => 'required|string',
            'type' => 'required|string',
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            
            return Redirect::to('centers/create')->withErrors($validator)->withInput(Input::all());
        
        } else {
            
            $center = new Center;
            $center->name = $request->get('name');
            $center->city = $request->get('city');
            $center->type = $request->get('type');
            $center->save();

            Session::flash('message', 'Successfully created Center!');
            return Redirect::to('centers');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $center = Center::find($id);

        return View::make('centers.edit')->with('center', $center);
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
        $rules = array(
            'name' => 'required|string|max:255|unique:centers',
            'city' => 'required|string',
            'type' => 'required|string',
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            
            return Redirect::to('centers/' . $id . '/edit')->withErrors($validator)->withInput(Input::all());
        
        } else {
            
            $center = Center::find($id);
            $center->name = $request->get('name');
            $center->city = $request->get('city');
            $center->type = $request->get('type');
            $user->save();

            Session::flash('message', 'Successfully updated center!');
            return Redirect::to('users'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $center = Center::find($id);
        $center->delete();

        Session::flash('message', 'Successfully deleted the center!');
        return Redirect::to('centers');
    }
}
