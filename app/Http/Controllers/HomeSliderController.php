<?php

namespace App\Http\Controllers;

use App\Models\HomeSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HomeSliderController extends Controller
{
    public function index()
    {
        $data['slider_data'] = HomeSlider::latest()->get();

        return view('admin.HomeSlider.HomeSlider_list', $data);
    }

    // Add/Edit Form
    public function addEdit($id = null)
    {
        if ($id) {
            $data['slider_data'] = HomeSlider::find($id);
        } else {
            $data['slider_data'] = '';
        }

        return view('admin.HomeSlider.HomeSlider_store', $data);
    }

    // Store
    // public function store(Request $request)
    // {
    //     $id = $request->id;
    //     $isEdit = !empty($id);

    //     $request->validate([
    //         'type' => 'required',
    //         'file' => $isEdit
    //             ? 'nullable|mimes:jpg,jpeg,png,mp4,mov,avi'
    //             : 'required|mimes:jpg,jpeg,png,mp4,mov,avi',
    //     ]);

    //     if ($isEdit) {
    //         $slider = HomeSlider::find($id);
    //         $message = 'Updated Successfully';
    //     } else {
    //         $slider = new HomeSlider();
    //         $message = 'Added Successfully';
    //     }

    //     $slider->type = $request->type;

    //     if ($request->hasFile('file')) {

    //         // delete old file
    //         if ($isEdit && $slider->file && File::exists(public_path($slider->file))) {
    //             File::delete(public_path($slider->file));
    //         }

    //         $file = $request->file('file');

    //         $extension = $file->getClientOriginalExtension();

    //         $filename = time() . '.' . $extension;

    //         $file->move(public_path('uploads/home-slider'), $filename);

    //         $slider->file = 'uploads/home-slider/' . $filename;
    //     }

    //     $slider->save();

    //     return redirect()->route('slider-list')
    //         ->with('success', $message);
    // }

    public function homeSliderStore(Request $request)
    {
        $id = $request->id;

        // Check edit or add
        if ($id && $id != 'add') {

            $slider = HomeSlider::find($id);

            // If record not found
            if (!$slider) {
                return redirect()->back()->with('error', 'Record Not Found');
            }

            $message = 'Updated Successfully';

        } else {

            $slider = new HomeSlider();

            $message = 'Added Successfully';
        }

        // Validation
        $request->validate([
            'type' => 'required',
            'file' => $id
                ? 'nullable|mimes:jpg,jpeg,png,mp4,mov,avi'
                : 'required|mimes:jpg,jpeg,png,mp4,mov,avi',
        ]);

        // Save type
        $slider->type = $request->type;

        // Upload file
        if ($request->hasFile('file')) {

            // delete old file
            if ($id && $slider->file && File::exists(public_path($slider->file))) {

                File::delete(public_path($slider->file));
            }

            $file = $request->file('file');

            $extension = $file->getClientOriginalExtension();

            $filename = time() . '.' . $extension;

            $file->move(public_path('uploads/home-slider'), $filename);

            $slider->file = 'uploads/home-slider/' . $filename;
        }

        $slider->save();

        return redirect()->route('slider-list')
            ->with('success', $message);
    }

    // Delete
    public function delete($id)
    {
        $slider = HomeSlider::find($id);

        if ($slider) {

            if ($slider->file && File::exists(public_path($slider->file))) {
                File::delete(public_path($slider->file));
            }

            $slider->delete();
        }

        return redirect()->route('slider-list')
            ->with('success', 'Deleted Successfully');
    }
}
