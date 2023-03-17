<?php

namespace App\Http\Controllers\Frontend\Dashboard;

use DB;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
	public function index()
	{
		return view('frontend.dashboard.index');
	}
}