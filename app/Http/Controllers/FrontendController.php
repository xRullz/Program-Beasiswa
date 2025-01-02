<?php

namespace App\Http\Controllers;

use App\Models\Scholarships;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $scholarships = Scholarships::all();

        return view('frontend.index', compact('scholarships'));
    }
}
