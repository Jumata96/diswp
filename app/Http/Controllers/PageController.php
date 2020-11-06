<?php

namespace InnovaTec\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection as Collection;
use DB;
use Auth;


class PageController extends Controller
{
    public function index()
    {
        return view('samurai.inicio');
    }
}
