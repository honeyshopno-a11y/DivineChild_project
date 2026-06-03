<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
{
    public function galleryList()
    {
        $data['gallery_data'] = Gallery::all();

        return view('admin.gallery.gallery_list', $data);
    }

    public function galleryAddEdit($slug)
    {
        if ($slug == 'add') {

            $data['gallery_data'] = '';
        } else {

            $data['gallery_data'] = Gallery::find($slug);
        }
        return view('admin.gallery.gallery_store', $data);
    }


    public function galleryStore(Request $request)
    {
        $id = $request->id;

        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // ADD
        if ($id == 'add') {

            $data = new Gallery();

            if ($request->hasFile('image')) {

                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . rand(1000, 9999) . '.' . $extension;

                $file->move(public_path('uploads/gallery/'), $filename);

                $data->image = 'uploads/gallery/' . $filename;
            }

            $data->save();

            return redirect()
                ->route('gallery-list')
                ->with('success', 'Image Added Successfully.');
        }

        // EDIT
        else {

            $data = Gallery::find($id);

            if ($request->hasFile('image')) {

                // OLD IMAGE DELETE
                if ($data->image != '' && File::exists(public_path($data->image))) {
                    File::delete(public_path($data->image));
                }

                // NEW IMAGE UPLOAD
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . rand(1000, 9999) . '.' . $extension;

                $file->move(public_path('uploads/gallery/'), $filename);

                $data->image = 'uploads/gallery/' . $filename;
            }

            $data->save();

            return redirect()
                ->route('gallery-list')
                ->with('success', 'Image Updated Successfully.');
        }
    }


    public function galleryDelete($id)
    {
        $data = Gallery::find($id);

        if ($data != '') {

            // IMAGE DELETE FROM FOLDER
            if ($data->image != '' && File::exists(public_path($data->image))) {
                File::delete(public_path($data->image));
            }

            $data->delete();
        }

        return redirect()
            ->route('gallery-list')
            ->with('success', 'Image Deleted Successfully');
    }



}
