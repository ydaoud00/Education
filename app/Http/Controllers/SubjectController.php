<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Auth::user()->role;

        if($role == 'Admin'){

            $subjects = Subject::with(['center, grade'])->get();

            return View::make('subjects.admin.index')->with('subjects', $subjects);

        }else{

            $ids = [Auth::user()->center_id, Auth::user()->grade_id];
            $subjects = Subject::with(['center, grade'])->whereIn('id', $ids)->where('course', Auth::user()->course)->get();

            return View::make('subjects.index')->with('subjects', $subjects);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('subjects.create');
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
            'name' => 'required|string|max:255',
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            
            return Redirect::to('subjects/create')->withErrors($validator)->withInput(Input::all());
        
        } else {
            
            $subject = new Subject;
            $subject->name = $request->get('name');;
            $subject->center_id = Auth::user()->center_id;
            $subject->grade_id = Auth::user()->grade_id;
            $subject->course = Auth::user()->course;
            $subject->save();

            Session::flash('message', 'Successfully created Subject!');
            return Redirect::to('subjects');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subject = Subject::find($id);
        $subject->delete();

        Session::flash('message', 'Successfully deleted the subject!');
        return Redirect::to('subjects');
    }
}
