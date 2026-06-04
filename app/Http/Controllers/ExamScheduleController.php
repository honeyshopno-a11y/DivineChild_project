<?php

namespace App\Http\Controllers;

use App\Models\ExamSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ExamScheduleController extends Controller
{

    public function ExamScheduleList()
    {
        $data['ExamSchedule_data'] = ExamSchedule::all();

        return view('admin.ExamSchedule.ExamSchedule_list', $data);
    }

    public function ExamScheduleAddEdit($slug)
    {
        if ($slug == 'add') {
            $data['ExamSchedule_data'] = '';
        } else {
            $data['ExamSchedule_data'] = ExamSchedule::find($slug);
        }

        return view('admin.ExamSchedule.ExamSchedule_store', $data);
    }

    public function ExamScheduleStore(Request $request)
    {
        $id = $request->id;

        $request->validate([
            'title' => 'required',
            'pdf' => 'nullable|mimes:pdf|max:5120',
        ]);

        if ($id == 'add') {

            $data = new ExamSchedule();
            $data->title = $request->title;

            if ($request->hasFile('pdf')) {

                $file = $request->file('pdf');
                $filename = time() . rand(1000, 9999) . '.pdf';

                $file->move(public_path('uploads/ExamSchedule/'), $filename);

                $data->pdf = 'uploads/ExamSchedule/' . $filename;
            }

            $data->save();

            return redirect()->route('ExamSchedule-list')
                ->with('success', 'ExamSchedule Added Successfully');
        } else {

            $data = ExamSchedule::find($id);
            $data->title = $request->title;

            if ($request->hasFile('pdf')) {

                if ($data->pdf != '' && File::exists(public_path($data->pdf))) {
                    File::delete(public_path($data->pdf));
                }

                $file = $request->file('pdf');
                $filename = time() . rand(1000, 9999) . '.pdf';

                $file->move(public_path('uploads/ExamSchedule/'), $filename);

                $data->pdf = 'uploads/ExamSchedule/' . $filename;
            }

            $data->save();

            return redirect()->route('ExamSchedule-list')
                ->with('success', 'ExamSchedule Updated Successfully');
        }
    }

    public function ExamScheduleDelete($id)
    {
        $data = ExamSchedule::find($id);

        if ($data) {

            if ($data->pdf != '' && File::exists(public_path($data->pdf))) {
                File::delete(public_path($data->pdf));
            }

            $data->delete();
        }

        return redirect()->route('ExamSchedule-list')->with('success', 'ExamSchedule Deleted Successfully');
    }
}
