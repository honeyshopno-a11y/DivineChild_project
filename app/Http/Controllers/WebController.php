<?php

namespace App\Http\Controllers;

use App\Models\AgeCriteria;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Events;
use App\Models\ExamSchedule;
use App\Models\Gallery;
use App\Models\HolidayList;
use App\Models\HomeSlider;
use App\Models\News;
use App\Models\PublicDisclosure;
use App\Models\Syllabus;
use App\Models\DocContact;
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
        return view("website.ageCriteria" , compact("ageCriteria"));
    }

    public function feesStructure()
    {
            return view("website.feesStructure");
    }

    public function syllabus()
    {
        $syllabus = Syllabus::all();

        return view('website.syllabus', compact('syllabus'));
    }
    public function timetable()
    {
        return view("website.timetable");
    }


     public function events()
    {
         $event_data = Events::orderBy('date', 'asc')->get();
        return view("website.events" , compact("event_data"));
    }

    public function awards()
    {
        // $awards = $awards::all();
        return view("website.awards");
    }

    public function documents()
    {
        $categories = Category::with('documents')->whereHas('documents')->get();
        $doc_contact = DocContact::first();

        return view("website.RequiredDocuments", compact('categories', 'doc_contact'));
    }

    public function transferCertificates()
    {
        return view("website.transfer-certificates");
    }

}
