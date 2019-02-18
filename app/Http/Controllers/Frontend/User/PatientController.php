<?php

namespace App\Http\Controllers\frontend\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PatientController extends Controller
{
   public function __construct()
   {
       $this->middleware(['role:user|team onwer','permission:manage patients']);
       
   }
   
   public function index()
   {
        return view('frontend.pages.patiens');
   }
}
