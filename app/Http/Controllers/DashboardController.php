<?php

namespace App\Http\Controllers;

use App\Models\Awards;
use App\Models\Events;
use App\Models\InquiryForm;
use App\Models\Management;
use App\Models\Staff;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $totalInquiry = InquiryForm::count();
        $totalAwards = Awards::count();
        $totalEvents = Events::count();
        $totalManagement = Management::count();
        $totalStaff = Staff::count();

        return view('admin.dashboard', compact(
            'totalInquiry',
            'totalAwards',
            'totalEvents',
            'totalManagement',
            'totalStaff'
        ));
    }
}
