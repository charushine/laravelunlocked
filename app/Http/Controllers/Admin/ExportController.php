<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Exports\{UserExport, OwnerExport, VenueExport, BookingExport};
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
	// export user detail
	public function exportUser()
	{
		return Excel::download(new UserExport, 'users-'.date('d-m-Y').'.csv');
	}
	//ecport owner detail
	public function exportOwner()
	{
		return Excel::download(new OwnerExport, 'owners-'.date('d-m-Y').'.csv');
	}
	public function exportVenue()
	{
		return Excel::download(new VenueExport, 'venues-'.date('d-m-Y').'.csv');
	}
	public function exportBooking()
	{
		return Excel::download(new BookingExport, 'bookings-'.date('d-m-Y').'.csv');
	}
}
