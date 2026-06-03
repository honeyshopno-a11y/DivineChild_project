<?php

namespace App\Http\Controllers;

use App\Models\PublicDisclosure;
use App\Models\PublicDisclosureTitle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PublicDisclosureController extends Controller
{

    public function publicDisclosureTitleList()
    {
        $data['public_disclosure_title_data'] = PublicDisclosureTitle::all();

        return view('admin.public_disclosure_title.public_disclosure_title_list', $data);
    }

    public function publicDisclosureTitleAddEdit($slug)
    {

        if ($slug == 'add') {

            $data['public_disclosure_title_data'] = '';
        } else {

            $data['public_disclosure_title_data'] = PublicDisclosureTitle::find($slug);
        }

        return view('admin.public_disclosure_title.public_disclosure_title_store', $data);
    }

    public function publicDisclosureTitleStore(Request $request)
    {

        $id = $request->id;

        $request->validate([
            'title' => 'required',
        ]);

        if ($id == 'add') {

            $data = new PublicDisclosureTitle();

            $data->title = $request->title;

            $data->save();

            return redirect()
                ->route('public-disclosure-title-list')
                ->with('success', 'Title Added Successfully.');
        } else {

            $data = PublicDisclosureTitle::find($id);

            $data->title = $request->title;

            $data->save();

            return redirect()
                ->route('public-disclosure-title-list')
                ->with('success', 'Title Updated Successfully.');
        }
    }

    public function publicDisclosureTitleDelete($id)
    {
        $data = PublicDisclosureTitle::find($id);

        if ($data != '') {

            $data->delete();
        }

        return redirect()
            ->route('public-disclosure-title-list')
            ->with('success', 'Title Deleted Successfully');
    }



    public function publicDisclosureList()
    {
        $data['disclosure_data'] = PublicDisclosure::with('title')->latest()->get();

        return view('admin.public_disclosure.public_disclosure_list', $data);
    }


    public function publicDisclosureAddEdit($slug)
    {
        $data['title_data'] = PublicDisclosureTitle::get();

        if ($slug == 'add') {
            $data['disclosure_data'] = '';
        } else {
            $data['disclosure_data'] = PublicDisclosure::find($slug);
        }

        return view('admin.public_disclosure.public_disclosure_store', $data);
    }

    // Store
    public function publicDisclosureStore(Request $request)
    {
        $id = $request->id;

        $request->validate([
            'title_id' => 'required',
            'description' => 'required',
            'pdf' => $id == 'add'
                ? 'required|mimes:pdf'
                : 'nullable|mimes:pdf',
        ]);

        if ($id == 'add') {

            $data = new PublicDisclosure();

            $message = 'Public Disclosure Added Successfully';

        } else {

            $data = PublicDisclosure::find($id);

            $message = 'Public Disclosure Updated Successfully';
        }

        $data->title_id = $request->title_id;

        $data->description = $request->description;

        // PDF Upload
        // if ($request->hasFile('pdf')) {

        //     // delete old pdf
        //     if (
        //         $id != 'add' &&
        //         $data->pdf &&
        //         File::exists(public_path($data->pdf))
        //     ) {

        //         File::delete(public_path($data->pdf));
        //     }

        //     $file = $request->file('pdf');

        //     $extension = $file->getClientOriginalExtension();

        //     $filename = time() . '.' . $extension;

        //     $file->move(public_path('uploads/public-disclosure'), $filename);

        //     $data->pdf = 'uploads/public-disclosure/' . $filename;
        // }


        if ($request->hasFile('pdf')) {

            // Delete old pdf
            if (
                $id != 'add' &&
                $data->pdf &&
                File::exists(public_path($data->pdf))
            ) {

                File::delete(public_path($data->pdf));
            }

            $file = $request->file('pdf');

            // Original Name
            $originalName = $file->getClientOriginalName();

            $extension = $file->getClientOriginalExtension();

            $filename = time() . '.' . $extension;

            $file->move(public_path('uploads/public-disclosure'), $filename);

            $data->pdf = 'uploads/public-disclosure/' . $filename;

            // Save original name
            $data->pdf_name = $originalName;
        }

        $data->save();

        return redirect()->route('public-disclosure-list')
            ->with('success', $message);
    }

    // Delete
    public function publicDisclosureDelete($id)
    {
        $data = PublicDisclosure::find($id);

        if ($data) {

            if (
                $data->pdf &&
                File::exists(public_path($data->pdf))
            ) {

                File::delete(public_path($data->pdf));
            }

            $data->delete();
        }

        return redirect()->route('public-disclosure-list')
            ->with('success', 'Deleted Successfully');
    }
}
