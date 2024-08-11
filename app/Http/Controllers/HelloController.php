<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    function index()
    {
        echo "Hello Index";
    }

    function world_message()
    {
        echo "Hello World";
    }
}
