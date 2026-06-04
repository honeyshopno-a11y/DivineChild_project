<?php

namespace App\Http\Controllers;

use App\Models\PracticalExaminationSchedule;
use App\Models\PreBoardDates;
use App\Models\PrimaryToSecondaryExamSchedule;
use Illuminate\Http\Request;

class TimeTableController extends Controller
{
    public function primaryToSecondaryExamScheduleList()
    {
        $primaryToSecondaryExamScheduleList = PrimaryToSecondaryExamSchedule::get();

        return view('admin.time_table.primary_to_secondary_exam_list', compact('primaryToSecondaryExamScheduleList'));
    }

    public function primaryToSecondaryExamScheduleAddEdit($slug)
    {
        if ($slug == 'add') {
            $primaryToSecondaryExamScheduleData = null;
        } else {
            $primaryToSecondaryExamScheduleData = PrimaryToSecondaryExamSchedule::find($slug);
        }

        return view('admin.time_table.primary_to_secondary_exam_add_edit', compact('primaryToSecondaryExamScheduleData'));
    }

    public function primaryToSecondaryExamScheduleStore(Request $request)
    {
        $id = $request->id;

        $request->validate([
            'exam_name'      => 'required|string|max:255',
            'exam_from_date' => 'required|date',
            'exam_to_date'   => 'nullable|date|after_or_equal:exam_from_date',
            // 'ptm_date'   => 'nullable|date',
        ]);

        if ($id == 'add') {
            $data = new PrimaryToSecondaryExamSchedule();
            $data->exam_name = $request->exam_name;
            $data->exam_from_date = $request->exam_from_date;
            $data->exam_to_date = $request->exam_to_date;
            $data->ptm_date = $request->ptm_date;
            $data->save();

            return redirect()->route('primary.to.secondary.exam.schedule.list')->with('success', 'Primary to Secondary Exam Schedule Added Successfully.');
        } else {
            $data = PrimaryToSecondaryExamSchedule::find($id);
            $data->exam_name = $request->exam_name;
            $data->exam_from_date = $request->exam_from_date;
            $data->exam_to_date = $request->exam_to_date;
            $data->ptm_date = $request->ptm_date;
            $data->update();

            return redirect()->route('primary.to.secondary.exam.schedule.list')->with('success', 'Primary to Secondary Exam Schedule Updated Successfully.');
        }
    }

    public function primaryToSecondaryExamScheduleDelete($id)
    {
        $data = PrimaryToSecondaryExamSchedule::find($id);

        if ($data) {
            $data->delete();
        }

        return redirect()->route('primary.to.secondary.exam.schedule.list')->with('success', 'Primary to Secondary Exam Schedule Deleted Successfully');
    }

    public function preBoardDatesList()
    {
        $preBoardDatesList = PreBoardDates::get();

        return view('admin.time_table.pre_board_dates_list', compact('preBoardDatesList'));
    }

    public function preBoardDatesAddEdit($slug)
    {
        if ($slug == 'add') {
            $preBoardDatesData = null;
        } else {
            $preBoardDatesData = PreBoardDates::find($slug);
        }

        return view('admin.time_table.pre_board_dates_add_edit', compact('preBoardDatesData'));
    }

    public function preBoardDatesStore(Request $request)
    {
        $id = $request->id;

        $request->validate([
            'title'      => 'required|string|max:255',
            'from_date' => 'required|date',
            'to_date'   => 'nullable|date|after_or_equal:from_date',
        ]);

        if ($id == 'add') {
            $data = new PreBoardDates();
            $data->title = $request->title;
            $data->from_date = $request->from_date;
            $data->to_date = $request->to_date;
            $data->save();

            return redirect()->route('pre.board.dates.list')->with('success', 'Pre-Board Dates Added Successfully.');
        } else {
            $data = PreBoardDates::find($id);
            $data->title = $request->title;
            $data->from_date = $request->from_date;
            $data->to_date = $request->to_date;
            $data->update();

            return redirect()->route('pre.board.dates.list')->with('success', 'Pre-Board Dates Updated Successfully.');
        }
    }

    public function preBoardDatesDelete($id)
    {
        $data = PreBoardDates::find($id);
        if ($data) {
            $data->delete();
        }
        return redirect()->route('pre.board.dates.list')->with('success', 'Pre-Board Dates Deleted Successfully');
    }

    public function practicalExaminationScheduleList()
    {
        $practicalExaminationScheduleList = PracticalExaminationSchedule::get();

        return view('admin.time_table.practical_examination_schedule_list', compact('practicalExaminationScheduleList'));
    }

    public function practicalExaminationScheduleAddEdit($slug)
    {
        if ($slug == 'add') {
            $practicalExaminationScheduleData = null;
        } else {
            $practicalExaminationScheduleData = PracticalExaminationSchedule::find($slug);
        }

        return view('admin.time_table.practical_examination_schedule_add_edit', compact('practicalExaminationScheduleData'));
    }

    public function practicalExaminationScheduleStore(Request $request)
    {
        $id = $request->id;

        $request->validate([
            'title'     => 'required|string|max:255',
            'from_date' => 'required|date',
            'to_date'   => 'nullable|date|after_or_equal:from_date',
        ]);

        if ($id == 'add') {
            $data = new PracticalExaminationSchedule();
            $data->title = $request->title;
            $data->from_date = $request->from_date;
            $data->to_date = $request->to_date;
            $data->save();

            return redirect()->route('practical.examination.schedule.list')->with('success', 'Practical Examination Schedule Added Successfully.');
        } else {
            $data = PracticalExaminationSchedule::find($id);
            $data->title = $request->title;
            $data->from_date = $request->from_date;
            $data->to_date = $request->to_date;
            $data->update();

            return redirect()->route('practical.examination.schedule.list')->with('success', 'Practical Examination Schedule Updated Successfully.');
        }
    }

    public function practicalExaminationScheduleDelete($id)
    {
        $data = PracticalExaminationSchedule::find($id);
        if ($data) {
            $data->delete();
        }
        return redirect()->route('practical.examination.schedule.list')->with('success', 'Practical Examination Schedule Deleted Successfully.');
    }
}
