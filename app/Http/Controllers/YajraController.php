<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Yajra\Datatables\Datatables;


class YajraController extends Controller
{
    //

    public function index()
	{
	    return view('user_list');
	}

	public function getDataTable()
	{

	    return Datatables::of(User::all())->make(true);
	}

}
