<?php

namespace App\Http\Controllers;

use App\Models\AgeCriteria;
use App\Models\Awards;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Events;
use App\Models\ExamSchedule;
use App\Models\Facilities;
use App\Models\FeeStructure;
use App\Models\FeeStructureDetail;
use App\Models\FeeStructureDetailNote;
use App\Models\Gallery;
use App\Models\HolidayList;
use App\Models\HomeSlider;
use App\Models\News;
use App\Models\PracticalExaminationSchedule;
use App\Models\PreBoardDates;
use App\Models\PrimaryToSecondaryExamSchedule;
use App\Models\PublicDisclosure;
use App\Models\SchoolTiming;
use App\Models\Staff;
use App\Models\Syllabus;
use App\Models\DocContact;
use App\Models\Management;
use App\Models\SchoolActivities;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        $sliders = HomeSlider::get()->map(function ($i) {
            $i->file = asset($i->file);
            return $i;
        });

        $news = News::get();
        $contact = Contact::first();

        return view('website.index', compact('sliders', 'news', 'contact'));
    }

    public function aboutUs()
    {
        return view("website.about-us");
    }


    public function contactUs()
    {
        $data = Contact::first();
        return view("website.contact-us", compact("data"));
    }

    public function gallery()
    {
        $gallery = Gallery::get()->map(function ($i) {
            $i->file = asset($i->file);
            return $i;
        });
        return view("website.gallery", compact("gallery"));
    }


    public function inquiryForm()
    {
        return view("website.inquiryform");
    }

    public function missionVision()
    {
        return view("website.mission-vision");
    }

    public function principalDesk()
    {
        return view("website.principal-desk");
    }

    public function prospectus()
    {
        return view("website.prospectus");
    }

    public function publicDisclosure()
    {

        $data = PublicDisclosure::with('title')->get()
            ->groupBy('title_id');
        return view("website.public-disclosure", compact("data"));
    }

    public function ExamSchedule()
    {
        $ExamSchedule = ExamSchedule::all();

        return view("website.exam-schedule", compact("ExamSchedule"));
    }

    public function holidayList()
    {
        $holiday = HolidayList::all();

        return view("website.holidayList", compact("holiday"));
    }

    public function ageCriteria()
    {
        $ageCriteria = AgeCriteria::all();
        return view("website.ageCriteria", compact("ageCriteria"));
    }

    public function feesStructure()
    {
        $categories = FeeStructure::orderBy('id')->get();


        $feeDetails = FeeStructureDetail::orderBy('id')->get()->map(function ($item) {
            $item->fee_details = is_array($item->fee_details)
                ? $item->fee_details
                : json_decode($item->fee_details, true);
            return $item;
        });


        $totals = [];
        foreach ($categories as $cat) {
            $total = 0;
            foreach ($feeDetails as $row) {
                $total += (float) ($row->fee_details[$cat->title] ?? 0);
            }
            $totals[$cat->title] = $total;
        }


        $fee_structure_details_note = FeeStructureDetailNote::first();
        $activities = SchoolActivities::all();
        $timing = SchoolTiming::all();
        return view("website.feesStructure", compact('activities', 'timing' , 'categories' , 'fee_structure_details_note' ,'feeDetails' ,'totals'));
    }

    public function syllabus()
    {
        $syllabus = Syllabus::all();

        return view('website.syllabus', compact('syllabus'));
    }
    public function timetable()
    {
        $primaryToSecondaryExamScheduleList = PrimaryToSecondaryExamSchedule::get();
        $preBoardDatesList = PreBoardDates::get();
        $practicalExaminationScheduleList = PracticalExaminationSchedule::get();
        return view("website.timetable", compact('primaryToSecondaryExamScheduleList', 'preBoardDatesList', 'practicalExaminationScheduleList'));
    }

    public function events()
    {
        $event_data = Events::orderBy('date', 'asc')->get();
        return view("website.events", compact("event_data"));
    }

    public function awards()
    {
        $award_data = Awards::orderBy('date', 'desc')->get();
        return view("website.awards", compact("award_data"));
    }

    public function management()
    {
        $management_data = Management::all();
        return view("website.management", compact('management_data'));
    }

    public function facilities()
    {
        $facilities = Facilities::first();
        return view("website.facilities",compact('facilities'));
    }

    public function documents()
    {
        $categories = Category::with('documents')->whereHas('documents')->get();
        $doc_contact = DocContact::first();

        return view("website.RequiredDocuments", compact('categories', 'doc_contact'));
    }

    public function staff()
    {
        $staff = Staff::all();
        return view("website.staff", compact("staff"));
    }

    public function transferCertificates()
    {
        return view("website.transfer-certificates");
    }
}
