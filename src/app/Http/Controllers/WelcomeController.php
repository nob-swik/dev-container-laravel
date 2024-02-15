<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
      // 指定されたビューを返す
      return view('welcome');
    }
}
