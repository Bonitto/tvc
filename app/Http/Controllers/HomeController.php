<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class HomeController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$orders = Order::orderBy('order_id', 'DESC')->paginate(20);
		
		return view('home', ['orders' => $orders]);
	}
}
