<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BioController extends Controller
{
    public function index()
    {
        $json = file_get_contents('https://hpstr.me/bio/new');
        $obj = json_decode($json);

        $content = $obj->bio->content;
        $name = $obj->bio->name;
        $bio = str_replace("{name}", $name, $content);

        return view('bio')->with('bio', $bio);
    }
}
