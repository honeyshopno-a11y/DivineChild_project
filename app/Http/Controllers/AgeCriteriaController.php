<?php

namespace App\Http\Controllers;

use App\Models\AgeCriteria;
use Illuminate\Http\Request;

class AgeCriteriaController extends Controller
{

    public function AgeCriteriaList()
    {
        $data['ageCriteria_data'] = AgeCriteria::all();

        return view('admin.AgeCriteria.ageCriteria_list', $data);
    }

    public function AgeCriteriaAddEdit($slug)
    {
        if ($slug == 'add') {
            $data['ageCriteria_data'] = '';
        } else {
            $data['ageCriteria_data'] = AgeCriteria::find($slug);
        }

        return view('admin.AgeCriteria.ageCriteria_store', $data);
    }

    public function AgeCriteriaStore(Request $request)
    {
        $id = $request->id;

        $request->validate([
            'year' => 'required',
            'standard' => 'required',
            'from' => 'required|date',
            'to' => 'required|date',
        ]);

        if ($id == 'add') {

            $data = new AgeCriteria();

            $data->year = $request->year;
            $data->standard = $request->standard;
            $data->from = $request->from;
            $data->to = $request->to;

            $data->save();

            return redirect()->route('ageCriteria-list')
                ->with('success', 'Age Criteria Added Successfully');

        } else {

            $data = AgeCriteria::find($id);

            $data->year = $request->year;
            $data->standard = $request->standard;
            $data->from = $request->from;
            $data->to = $request->to;

            $data->save();

            return redirect()->route('ageCriteria-list')
                ->with('success', 'Age Criteria Updated Successfully');
        }
    }

    public function AgeCriteriaDelete($id)
    {
        $data = AgeCriteria::find($id);

        if ($data) {
            $data->delete();
        }

        return redirect()->route('ageCriteria-list')
            ->with('success', 'Age Criteria Deleted Successfully');
    }



}
