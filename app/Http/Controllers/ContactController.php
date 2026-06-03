<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function contact()
    {
        $data['contact_data'] = Contact::first();

        return view('admin.contact.contact_store', $data);
    }

    public function contactStore(Request $request)
    {
        $request->validate([
            'number' => 'required',
            'email' => 'required',
            'main_building' => 'required',
            'old_building' => 'required',
        ]);

        $data = Contact::first();

        if (!$data) {
            $data = new Contact();
        }

        $data->number = $request->number;
        $data->email = $request->email;
        $data->main_building = $request->main_building;
        $data->old_building = $request->old_building;

        $data->save();

        return redirect()->back()->with(
            'success',
            $data->wasRecentlyCreated
            ? 'Contact Details Added Successfully.'
            : 'Contact Details Updated Successfully.'
        );
    }
}
