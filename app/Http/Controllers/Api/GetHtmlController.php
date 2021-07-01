<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GetHtmlController extends Controller
{

    public function index(Request $request)
    {
        $target_path = $request->input('target_path');
        return file_get_contents(public_path($target_path));
    }

}
