<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class StaffController extends Controller
{
    public function staffList()
    {
        $data['staff'] = Staff::all();

        return view('admin.staff.staff_list', $data);
    }

    public function staffAddEdit($slug)
    {
        if ($slug == 'add') {

            $data['staff_data'] = '';
        } else {

            $data['staff_data'] = Staff::find($slug);
        }
        return view('admin.staff.staff_store', $data);
    }


    public function staffStore(Request $request)
    {
        $id = $request->id;

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // ADD
        if ($id == 'add') {

            $data = new Staff();
            $data->name = $request->name;
            $data->role = $request->role;

            if ($request->hasFile('image')) {

                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . rand(1000, 9999) . '.' . $extension;

                $file->move(public_path('uploads/staff/'), $filename);

                $data->image = 'uploads/staff/' . $filename;
            }

            $data->save();

            return redirect()
                ->route('staff-list')
                ->with('success', 'Image Added Successfully.');
        }

        // EDIT
        else {

            $data = Staff::find($id);

            $data->name = $request->name;
            $data->role = $request->role;
            if ($request->hasFile('image')) {

                // OLD IMAGE DELETE
                if ($data->image != '' && File::exists(public_path($data->image))) {
                    File::delete(public_path($data->image));
                }

                // NEW IMAGE UPLOAD
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . rand(1000, 9999) . '.' . $extension;

                $file->move(public_path('uploads/staff/'), $filename);

                $data->image = 'uploads/staff/' . $filename;
            }

            $data->save();

            return redirect()
                ->route('staff-list')
                ->with('success', 'Image Updated Successfully.');
        }
    }


    public function staffDelete($id)
    {
        $data = Staff::find($id);

        if ($data != '') {

            // IMAGE DELETE FROM FOLDER
            if ($data->image != '' && File::exists(public_path($data->image))) {
                File::delete(public_path($data->image));
            }

            $data->delete();
        }

        return redirect()
            ->route('staff-list')
            ->with('success', 'Image Deleted Successfully');
    }



}
