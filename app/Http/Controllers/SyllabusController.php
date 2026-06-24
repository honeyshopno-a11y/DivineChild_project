<?php

namespace App\Http\Controllers;

use App\Models\Syllabus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SyllabusController extends Controller
{
    public function syllabusList()
    {
        $data['syllabus_data'] = Syllabus::all();

        return view('admin.syllabus.syllabus_list', $data);
    }

    public function syllabusAddEdit($slug)
    {
        if ($slug == 'add') {
            $data['syllabus_data'] = '';
        } else {
            $data['syllabus_data'] = Syllabus::find($slug);
        }

        return view('admin.syllabus.syllabus_store', $data);
    }

    public function syllabusStore(Request $request)
    {
        $id = $request->id;

        $request->validate([
            'title' => 'required',
            'pdf' => 'nullable|mimes:pdf|max:5120',
        ]);

        if ($id == 'add') {

            $data = new Syllabus();
            $data->title = $request->title;

            if ($request->hasFile('pdf')) {

                $file = $request->file('pdf');
                $filename = time() . rand(1000, 9999) . '.pdf';

                $file->move(public_path('uploads/syllabus/'), $filename);

                $data->pdf = 'uploads/syllabus/' . $filename;
            }

            $data->save();

            return redirect()->route('syllabus-list')
                ->with('success', 'Syllabus Added Successfully');
        } else {

            $data = Syllabus::find($id);
            $data->title = $request->title;

            if ($request->hasFile('pdf')) {

                if ($data->pdf != '' && File::exists(public_path($data->pdf))) {
                    File::delete(public_path($data->pdf));
                }

                $file = $request->file('pdf');
                $filename = time() . rand(1000, 9999) . '.pdf';

                $file->move(public_path('uploads/syllabus/'), $filename);

                $data->pdf = 'uploads/syllabus/' . $filename;
            }

            $data->save();

            return redirect()->route('syllabus-list')
                ->with('success', 'Syllabus Updated Successfully');
        }
    }

    public function syllabusDelete($id)
    {
        $data = Syllabus::find($id);

        if ($data) {

            if ($data->pdf != '' && File::exists(public_path($data->pdf))) {
                File::delete(public_path($data->pdf));
            }

            $data->delete();
        }

        return redirect()->route('syllabus-list')
            ->with('success', 'Syllabus Deleted Successfully');
    }
}
