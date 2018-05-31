<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $file_id)
    {
        $rules = array(
            'description' => 'required|string',
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            
            return "NOT OK";
        
        } else {
            
            $comment = new Comment;
            $file->description = $request->get('description');
            $file->file_id = $file_id;
            $file->save();

            return "OK"
        }

    }

}
