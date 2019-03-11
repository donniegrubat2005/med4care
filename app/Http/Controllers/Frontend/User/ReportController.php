<?php

namespace App\Http\Controllers\frontend\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:user|team owner','permission:reports']);
        
    }
    
    public function index()
    {
        return view('frontend.pages.reports');
    }
}
