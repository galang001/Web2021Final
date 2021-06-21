<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $title="Halaman Admin";
        $data['mahasiswa']=array(
            'nim'=>'012388832',
            'nama'=>'Gal'
        );
        return view('admin.home', compact('title'));
    }

    public function dasboard(){
        $title="Halaman Dashboard";
        return view('admin.dasboard', compact('title'));
    }

    public function home(){
        $title="Halaman home";
        return view('admin.home', compact('title'));
    }

    public function awe(){
        $title="Halaman awe";
        return view('admin.awe', compact('title'));
    }

}
