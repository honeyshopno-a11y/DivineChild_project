<?php

namespace App\Http\Controllers;

use App\Models\SchoolTiming;
use Illuminate\Http\Request;

class FeesController extends Controller
{
    public function index(){
        $schoolTiming = SchoolTiming::all();
       return view("admin.fees.school_time", compact("schoolTiming"));
    }
    public function schoolTimeStore(Request $request)
    {
         
            $request->validate([
                'name.*' => 'required',
                'school_start_time.*' => 'required',
            ]);

            // Old data delete
            SchoolTiming::truncate();

            foreach ($request->name as $key => $name) {

                SchoolTiming::create([
                    'title'              => $name,
                    'reporting_time'    => $request->reporting_time[$key] ?? null,
                    'school_start_time' => $request->school_start_time[$key] ?? null,
                    'school_end_time'   => $request->school_end_time[$key] ?? null,
                ]);
            }

            return redirect()->back()->with('success', 'School timings updated successfully.');
    }
}
