<?php

namespace App\Http\Controllers;

use App\Models\DocContact;
use Illuminate\Http\Request;

class DocContactController extends Controller
{

    public function docContact()
    {
        $data['doc_contact_data'] = DocContact::first();

        return view('admin.docContact.docContact_store', $data);
    }

    public function docContactStore(Request $request)
    {
        $request->validate([
            'transport' => 'required',
            'uniformvendor' => 'required',
        ]);

        $data = DocContact::first();

        if (!$data) {
            $data = new DocContact();
        }

        $data->transport = $request->transport;
        $data->uniformvendor = $request->uniformvendor;

        $data->save();

        return redirect()->back()->with(
            'success',
            $data->wasRecentlyCreated
            ? 'Document Contact Details Added Successfully.'
            : 'Document Contact Details Updated Successfully.'
        );
    }
}
