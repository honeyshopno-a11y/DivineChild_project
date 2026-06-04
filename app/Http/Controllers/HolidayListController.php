<?php

namespace App\Http\Controllers;

use App\Models\HolidayList;
use Illuminate\Http\Request;

class HolidayListController extends Controller
{
    public function HolidayList()
    {
        $data['holiday_data'] = HolidayList::all();

        return view('admin.HolidayList.holiday_list', $data);
    }

    public function HolidayAddEdit($slug)
    {
        if ($slug == 'add') {
            $data['holiday_data'] = '';
        } else {
            $data['holiday_data'] = HolidayList::find($slug);
        }

        return view('admin.HolidayList.holiday_store', $data);
    }

    public function HolidayStore(Request $request)
    {
        $id = $request->id;

        $request->validate([
            'year' => 'required',
            'holiday' => 'required',
            'month' => 'required',
            'day' => 'required',
            'date' => 'required|date',
        ]);

        if ($id == 'add') {

            $data = new HolidayList();

            $data->year = $request->year;
            $data->holiday = $request->holiday;
            $data->month = $request->month;
            $data->day = $request->day;
            $data->date = $request->date;

            $data->save();

            return redirect()->route('holiday-list')
                ->with('success', 'Holiday Added Successfully');

        } else {

            $data = HolidayList::find($id);

            $data->year = $request->year;
            $data->holiday = $request->holiday;
            $data->month = $request->month;
            $data->day = $request->day;
            $data->date = $request->date;

            $data->save();

            return redirect()->route('holiday-list')
                ->with('success', 'Holiday Updated Successfully');
        }
    }

    public function HolidayDelete($id)
    {
        $data = HolidayList::find($id);

        if ($data) {
            $data->delete();
        }

        return redirect()->route('holiday-list')
            ->with('success', 'Holiday Deleted Successfully');
    }


}
