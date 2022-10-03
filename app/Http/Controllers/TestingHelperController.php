<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Helper;

class TestingHelperController extends Controller
{
    function index(){
        Helper::test('Koko');
    }
}
