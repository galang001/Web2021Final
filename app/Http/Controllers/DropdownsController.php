<?php

namespace App\Http\Controllers;

use App\Models\Bio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DropdownsController extends Controller
{
    public function index()
    {
        $bio = Bio::pluck('j_kelamin', 'user_id');

        return view('admin.inputdata', [
            'bio' => $bio,
        ]);
    }
}
