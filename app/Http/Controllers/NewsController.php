<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class NewsController extends Controller
{
    public function newsList()
    {
        $data['news_data'] = News::all();

        return view('admin.news.news_list', $data);
    }


    public function newsAddEdit($slug)
    {
        if ($slug == 'add') {

            $data['news_data'] = '';
        } else {

            $data['news_data'] = News::find($slug);
        }
        return view('admin.news.news_store', $data);
    }

    public function newsStore(Request $request)
    {
        $id = $request->id;

        $rules = [];

        if ($id == 'add') {
            $rules['image'] = 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
        } else {
            $rules['image'] = 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
        }

        $request->validate($rules);

        // ADD
        if ($id == 'add') {

            $data = new News();

            if ($request->hasFile('image')) {

                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . rand(1000, 9999) . '.' . $extension;

                $file->move(public_path('uploads/news/'), $filename);

                $data->image = 'uploads/news/' . $filename;
            }

            $data->save();

            return redirect()
                ->route('news-list')
                ->with('success', 'Image Added Successfully.');
        }

        // EDIT
        else {

            $data = News::find($id);

            if ($request->hasFile('image')) {

                // OLD IMAGE DELETE
                if ($data->image != '' && File::exists(public_path($data->image))) {
                    File::delete(public_path($data->image));
                }

                // NEW IMAGE UPLOAD
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . rand(1000, 9999) . '.' . $extension;

                $file->move(public_path('uploads/news/'), $filename);

                $data->image = 'uploads/news/' . $filename;
            }

            $data->save();

            return redirect()
                ->route('news-list')
                ->with('success', 'Image Updated Successfully.');
        }
    }

    public function newsDelete($id)
    {
        $data = News::find($id);

        if ($data != '') {

            // IMAGE DELETE FROM FOLDER
            if ($data->image != '' && File::exists(public_path($data->image))) {
                File::delete(public_path($data->image));
            }

            $data->delete();
        }

        return redirect()
            ->route('news-list')
            ->with('success', 'Image Deleted Successfully');
    }
}
