<?php

namespace App\Http\Controllers;

use App\Models\Management;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ManagementController extends Controller
{
    public function managementList()
    {
        $data['management_data'] = Management::all();

        return view('admin.management.management_list', $data);
    }

    public function managementAddEdit($slug)
    {
        if ($slug == 'add') {

            $data['management_data'] = '';
        } else {

            $data['management_data'] = Management::find($slug);
        }

        return view('admin.management.management_store', $data);
    }

    public function managementStore(Request $request)
    {
        $id = $request->id;

        $request->validate([
            'name' => 'required',
            'post' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        // ADD
        if ($id == 'add') {

            $data = new Management();

            $data->name = $request->name;
            $data->post = $request->post;

            if ($request->hasFile('image')) {

                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . rand(1000, 9999) . '.' . $extension;

                $file->move(public_path('uploads/management/'), $filename);

                $data->image = 'uploads/management/' . $filename;
            }

            $data->save();

            return redirect()
                ->route('management-list')
                ->with('success', 'Management Added Successfully.');
        }

        // EDIT
        else {

            $data = Management::find($id);

            $data->name = $request->name;
            $data->post = $request->post;

            if ($request->hasFile('image')) {

                if ($data->image != '' && File::exists(public_path($data->image))) {
                    File::delete(public_path($data->image));
                }

                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . rand(1000, 9999) . '.' . $extension;

                $file->move(public_path('uploads/management/'), $filename);

                $data->image = 'uploads/management/' . $filename;
            }

            $data->save();

            return redirect()
                ->route('management-list')
                ->with('success', 'Management Updated Successfully.');
        }
    }

    public function managementDelete($id)
    {
        $data = Management::find($id);

        if ($data != '') {

            if ($data->image != '' && File::exists(public_path($data->image))) {
                File::delete(public_path($data->image));
            }

            $data->delete();
        }

        return redirect()
            ->route('management-list')
            ->with('success', 'Management Deleted Successfully');
    }
}
