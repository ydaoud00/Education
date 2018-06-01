<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($subject_id)
    {
        $files = File::with('comments')->where('subject_id', $subject_id)->get();
        $subject = Subject::find($subject_id);

        return View::make('files.index')->with(['files' => $files, 'subject' => $subject]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($subject_id)
    {
        return View::make('files.create')->with('subject_id', $subject_id);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $subject_id)
    {
        $rules = array(
            'name' => 'required|string|max:255',
            'file' => 'required',
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            
            return Redirect::to('subjects/' . $subject_id . 'files/create')->withErrors($validator)->withInput(Input::all());
        
        } else {

            if($request->hasfile('file'))
            {
                $file = $request->file('filen');
                $name = time() . $file->getClientOriginalName();
                $file->storeAs('files', $name);
            }
            
            $file = new File;
            $file->name = $request->get('name');
            $file->path = $name;
            $file->likes = 0;
            $file->subject_id = $subject_id;
            $file->save();

            Session::flash('message', 'Successfully created file!');
            return Redirect::to('subjects/' . $subject_id . '/files');
    }

        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $file = File::find($id);
        return response()->download(storage_path('app/public/files/' . $file->path));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $subject_id, $id)
    {
        $file = File::find($id);
        $user->likes ++;
        $user->save();

        dd("OK");
    }
}
