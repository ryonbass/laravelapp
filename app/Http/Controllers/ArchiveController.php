<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArchiveController extends Controller
{
    public function leedcode(Request $request)
    {
        return view('archive.leedcode');
    }
}
