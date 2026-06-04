<?php

namespace App\Http\Controllers;

use App\Models\Awards;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AwardsController extends Controller
{
    public function awardList()
    {
        $data['award_data'] = Awards::all();

        return view('admin.award.award_list', $data);
    }

    public function awardAddEdit($slug)
    {
        if ($slug == 'add') {

            $data['award_data'] = '';
        } else {

            $data['award_data'] = Awards::find($slug);
        }

        return view('admin.award.award_store', $data);
    }

    public function awardStore(Request $request)
    {
        $id = $request->id;

        $request->validate([
            'title' => 'required',
            'date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        // ADD
        if ($id == 'add') {

            $data = new Awards();

            $data->title = $request->title;
            $data->date = $request->date;

            if ($request->hasFile('image')) {

                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . rand(1000, 9999) . '.' . $extension;

                $file->move(public_path('uploads/awards/'), $filename);

                $data->image = 'uploads/awards/' . $filename;
            }

            $data->save();

            return redirect()
                ->route('award-list')
                ->with('success', 'Award Added Successfully.');
        }

        // EDIT
        else {

            $data = Awards::find($id);

            $data->title = $request->title;
            $data->date = $request->date;

            if ($request->hasFile('image')) {

                if ($data->image != '' && File::exists(public_path($data->image))) {
                    File::delete(public_path($data->image));
                }

                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . rand(1000, 9999) . '.' . $extension;

                $file->move(public_path('uploads/awards/'), $filename);

                $data->image = 'uploads/awards/' . $filename;
            }

            $data->save();

            return redirect()
                ->route('award-list')
                ->with('success', 'Award Updated Successfully.');
        }
    }

    public function awardDelete($id)
    {
        $data = Awards::find($id);

        if ($data != '') {

            if ($data->image != '' && File::exists(public_path($data->image))) {
                File::delete(public_path($data->image));
            }

            $data->delete();
        }

        return redirect()
            ->route('award-list')
            ->with('success', 'Award Deleted Successfully');
    }
}
