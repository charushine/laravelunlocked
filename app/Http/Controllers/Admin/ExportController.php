<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Exports\{UserExport, OwnerExport};
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{

	public function exportUser()
	{
		return Excel::download(new UserExport, 'users-'.date('d-m-Y').'.csv');
	}

	public function exportOwner()
	{
		return Excel::download(new OwnerExport, 'orders-'.date('d-m-Y').'.csv');
	}
}
