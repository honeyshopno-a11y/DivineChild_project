<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Illuminate\Http\Request;

class EventsController extends Controller
{

    public function EventList()
    {
        $data['event_data'] = Events::all();

        return view('admin.Event.event_list', $data);
    }

    public function EventAddEdit($slug)
    {
        if ($slug == 'add') {
            $data['event_data'] = '';
        } else {
            $data['event_data'] = Events::find($slug);
        }

        return view('admin.Event.event_store', $data);
    }

    public function EventStore(Request $request)
    {
        $id = $request->id;

        $request->validate([
            'event' => 'required',
            'month' => 'required',
            'date' => 'required|date',
        ]);

        if ($id == 'add') {

            $data = new Events();

            $data->event = $request->event;
            $data->month = $request->month;
            $data->date = $request->date;

            $data->save();

            return redirect()->route('event-list')
                ->with('success', 'Event Added Successfully');

        } else {

            $data = Events::find($id);

            $data->event = $request->event;
            $data->month = $request->month;
            $data->date = $request->date;

            $data->save();

            return redirect()->route('event-list')
                ->with('success', 'Event Updated Successfully');
        }
    }

    public function EventDelete($id)
    {
        $data = Events::find($id);

        if ($data) {
            $data->delete();
        }

        return redirect()->route('event-list')
            ->with('success', 'Event Deleted Successfully');
    }
}
