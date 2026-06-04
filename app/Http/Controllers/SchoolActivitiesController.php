<?php

namespace App\Http\Controllers;

use App\Models\SchoolActivities;
use Illuminate\Http\Request;

class SchoolActivitiesController extends Controller
{
    public function SchoolActivityList()
    {
        $data['school_activity_data'] = SchoolActivities::all();

        return view('admin.SchoolActivity.SchoolActivity_list', $data);
    }

    public function SchoolActivityAddEdit($slug)
    {
        if ($slug == 'add') {
            $data['school_activity_data'] = '';
        } else {
            $data['school_activity_data'] = SchoolActivities::find($slug);
        }

        return view('admin.SchoolActivity.SchoolActivity_store', $data);
    }

    public function SchoolActivityStore(Request $request)
    {
        $id = $request->id;

        $request->validate([
            'name' => 'required',
        ]);

        if ($id == 'add') {

            $data = new SchoolActivities();
            $data->name = $request->name;
            $data->save();

            return redirect()->route('school-activity-list')
                ->with('success', 'School Activity Added Successfully');

        } else {

            $data = SchoolActivities::find($id);
            $data->name = $request->name;
            $data->save();

            return redirect()->route('school-activity-list')
                ->with('success', 'School Activity Updated Successfully');
        }
    }

    public function SchoolActivityDelete($id)
    {
        $data = SchoolActivities::find($id);

        if ($data) {
            $data->delete();
        }

        return redirect()->route('school-activity-list')
            ->with('success', 'School Activity Deleted Successfully');
    }
}
