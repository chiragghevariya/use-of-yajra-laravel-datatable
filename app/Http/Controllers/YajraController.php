<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
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

	     // /return Datatables::of(User::query())->make(true);

	     $users = DB::table('users')
            ->select(['id', 'name', 'email', 'password', 'created_at', 'updated_at']);

        return Datatables::of($users)
            ->addColumn('action', function ($us) {
                return '<a href="'.url('edit/'.$us->id).'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>'.'  '.'<a href="'.url('edit/'.$us->id).'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-delete"></i> Delete</a>';
            })
			->editColumn('id', 'ID: {{$id}}')
            ->removeColumn('password')
            ->make(true);
	}

}
