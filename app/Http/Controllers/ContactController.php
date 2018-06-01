<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function show() 
	{
		return view('contact');
	}

	public function mailToAdmin()
	{        

		return redirect()->back()->with('message', 'thanks for the message! We will get back to you soon!');
	}
}
