<?php

namespace App\Http\Controllers;

use App\Models\FeeStructure;
use App\Models\FeeStructureDetail;
use App\Models\FeeStructureDetailNote;
use App\Models\SchoolTiming;
use Illuminate\Http\Request;

class FeesController extends Controller
{
    public function index()
    {
        $schoolTiming = SchoolTiming::all();
        return view("admin.fees.school_time", compact("schoolTiming"));
    }
    public function schoolTimeStore(Request $request)
    {

        $request->validate([
            'name.*' => 'required',
            'school_start_time.*' => 'required',
        ]);

        // Old data delete
        SchoolTiming::truncate();

        foreach ($request->name as $key => $name) {

            SchoolTiming::create([
                'title' => $name,
                'reporting_time' => $request->reporting_time[$key] ?? null,
                'school_start_time' => $request->school_start_time[$key] ?? null,
                'school_end_time' => $request->school_end_time[$key] ?? null,
            ]);
        }

        return redirect()->back()->with('success', 'School timings updated successfully.');
    }


    public function feesStructureList()
    {
        $data['fees_structure'] = FeeStructure::all();

        return view('admin.fees.fees_structure_list', $data);
    }

    public function feesStructureAddEdit($slug)
    {
        if ($slug == 'add') {

            $data['fees_structure'] = '';
        } else {

            $data['fees_structure'] = FeeStructure::find($slug);
        }
        return view('admin.fees.fees_structure_store', $data);
    }


    public function feesStructureStore(Request $request)
    {

        $id = $request->id;

        $request->validate([
            'title' => 'required',
        ]);



        if ($id == 'add') {

            $data = new FeeStructure();

            $data->title = $request->title;

            $data->save();

            return redirect()
                ->route('fees-structure-list')
                ->with('success', 'Added Successfully.');
        }

        // EDIT
        else {

            $data = FeeStructure::find($id);

            $data->title = $request->title;
            $data->save();

            return redirect()
                ->route('fees-structure-list')
                ->with('success', 'Updated Successfully.');
        }
    }


    public function feesStructureDelete($id)
    {
        $data = FeeStructure::find($id);

        $data->delete();

        return redirect()
            ->route('fees-structure-list')
            ->with('success', 'Image Deleted Successfully');
    }


    public function feesStructureDetailsList()
    {
        $data['fee_structure_details'] = FeeStructureDetail::all();
        $data['fee_structure_details_note'] = FeeStructureDetailNote::first();

        return view('admin.fees.fees_structure_details_list', $data);
    }

    public function feesStructureDetailsAddEdit($slug)
    {
        if ($slug == 'add') {

            $data['fee_structure_details'] = '';
        } else {

            $data['fee_structure_details'] = FeeStructureDetail::find($slug);
        }

        return view('admin.fees.fees_structure_details_store', $data);
    }

    public function feesStructureDetailsStore(Request $request)
    {

        $id = $request->id;

        $request->validate([
            'title' => 'required',
        ]);

        if ($id == 'add') {

            $data = new FeeStructureDetail();

        } else {

            $data = FeeStructureDetail::find($id);
        }

        $data->title = $request->title;
        $data->fee_details = json_encode($request->category_name);

        $data->save();

        return redirect()
            ->route('fees-structure-details-list')
            ->with('success', $id == 'add'
                ? 'Added Successfully.'
                : 'Updated Successfully.');
    }

    public function feesStructureDetailsDelete($id)
    {
        $data = FeeStructureDetail::find($id);

        $data->delete();

        return redirect()
            ->route('fees-structure-details-list')
            ->with('success', 'Deleted Successfully.');
    }


    public function feesStructureNoteStore(Request $request)
    {
        $request->validate([
            'note_details' => 'required',
        ]);

        $data = FeeStructureDetailNote::first();

        if (!$data) {
            $data = new FeeStructureDetailNote();
        }

        $data->description = $request->note_details;
        $data->save();

        return redirect()
            ->route('fees-structure-details-list')
            ->with('success', 'Added Successfully.');
    }


}