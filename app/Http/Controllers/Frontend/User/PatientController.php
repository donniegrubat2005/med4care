<?php

namespace App\Http\Controllers\frontend\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Auth\User;


class PatientController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:user|team owner', 'permission:manage patients']);
    }

    public function index()
    {
        return view('frontend.pages.patients');
    }

}
