<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;

/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{

    public function __construct()
    {
        return redirect('verifiaction');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.user.dashboard');
    }


    public function _verification()
    {
        return view('frontend.pages.verification');
    }
}
