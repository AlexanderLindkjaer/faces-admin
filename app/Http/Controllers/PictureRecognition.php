<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PictureRecognition extends Controller
{
    public function index()
    {
      return view('picture_recognition');
    }
}
