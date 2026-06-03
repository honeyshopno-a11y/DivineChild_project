<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\InquiryForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class InquiryFormController extends Controller
{
    // STORE API
    public function store(Request $request)
    {
        $request->validate([

            'student_name' => 'required',
            'primary_mobile_no' => 'required',
        ]);

        $data = $request->all();

        // CHILD PHOTO
        if ($request->hasFile('child_photo')) {

            $childPhoto = time() . '_child.' . $request->child_photo->extension();

            $request->child_photo->move(public_path('uploads/inquiry'), $childPhoto);

            $data['child_photo'] = $childPhoto;
        }

        // FATHER PHOTO
        if ($request->hasFile('father_photo')) {

            $fatherPhoto = time() . '_father.' . $request->father_photo->extension();

            $request->father_photo->move(public_path('uploads/inquiry'), $fatherPhoto);

            $data['father_photo'] = $fatherPhoto;
        }

        // MOTHER PHOTO
        if ($request->hasFile('mother_photo')) {

            $motherPhoto = time() . '_mother.' . $request->mother_photo->extension();

            $request->mother_photo->move(public_path('uploads/inquiry'), $motherPhoto);

            $data['mother_photo'] = $motherPhoto;
        }

        $inquiry = InquiryForm::create($data);

        return response()->json([
            'status' => true,
            'message' => 'Inquiry Form Submitted Successfully',
            'data' => $inquiry
        ]);
    }

    // LIST API
    public function index()
    {
        $inquiry = InquiryForm::latest()->get();

        return response()->json([
            'status' => true,
            'data' => $inquiry
        ]);
    }



    // LIST PAGE
    public function list()
    {
        $inquiry_data = InquiryForm::latest()->get();

        return view('admin.inquiry.list', compact('inquiry_data'));
    }

    // VIEW PAGE
    public function view($id)
    {
        $inquiry = InquiryForm::findOrFail($id);

        return view('admin.inquiry.view', compact('inquiry'));
    }

    // DELETE PAGE
    public function delete($id)
    {
        $inquiry = InquiryForm::find($id);

        if ($inquiry) {
            foreach (['child_photo', 'father_photo', 'mother_photo'] as $photo) {
                if ($inquiry->$photo && File::exists(public_path('uploads/inquiry/' . $inquiry->$photo))) {
                    File::delete(public_path('uploads/inquiry/' . $inquiry->$photo));
                }
            }

            $inquiry->delete();
        }

        return redirect()
            ->route('inquiry-form-list')
            ->with('success', 'Inquiry Deleted Successfully');
    }
}
