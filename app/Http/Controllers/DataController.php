<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function data()
    {
        return Data::all();
    }

    public function show($id)
    {
        return Data::find($id);   
    }

}
