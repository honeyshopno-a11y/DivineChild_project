@extends('website.main')
@section('content')


    <!-- InstanceBeginEditable name="slider" -->
    <!-- Page Banner Start -->
    <div class="section page-banner-section">
        <div class="container">
            <div class="page-banner-wrap">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-banner text-center">
                            <h2 class="title">Time Table</h2>
                            <ul class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Time Table</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Banner End -->
    <!-- InstanceEndEditable -->

    <!-- InstanceBeginEditable name="matter" -->
    <!-- Timetable Content Start -->
    <div class="timetable-section">
        <div class="container">

            <!-- ── EXAM & PTM DATES ── -->
            <div class="sub-section">
                <div class="timetable-heading">
                    <h3>Exam &amp; PTM Dates</h3>
                </div>

                <div class="exam-tables-row">

                    <!-- Pre-Primary Exam Schedule -->
                    <div class="exam-card">
                        <div class="exam-card-header">
                            <i class="far fa-calendar-alt"></i>
                            Pre-Primary Exam Schedule
                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Name of Exam</th>
                                    <th>Exam Date</th>
                                    <th>PTM Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td rowspan="4">1</td>
                                    <td>Term-1</td>
                                    <td>07/09/2026 To 30/09/2026</td>
                                    <td>09/08/2026</td>
                                </tr>
                                <tr>
                                    <td>Open House</td>
                                    <td>10/10/2026</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Result</td>
                                    <td>15/10/2026</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Open House</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td rowspan="4">2</td>
                                    <td>Term-2</td>
                                    <td>08/02/2027 To 27/02/2027</td>
                                    <td>09/01/2027</td>
                                </tr>
                                <tr>
                                    <td>Open House</td>
                                    <td>15/03/2027</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Result</td>
                                    <td>27/03/2027</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Open House</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Primary to Secondary Exam Schedule -->
                    <div class="exam-card">
                        <div class="exam-card-header">
                            <i class="far fa-calendar-alt"></i>
                            Primary to Secondary Exam Schedule
                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <th>Sr. No</th>
                                    <th>Name of Exam</th>
                                    <th>Exam Date</th>
                                    <th>PTM Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($primaryToSecondaryExamScheduleList) && $primaryToSecondaryExamScheduleList->count() > 0)
                                    @foreach ($primaryToSecondaryExamScheduleList as $key => $list)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $list->exam_name }}</td>
                                            <td>
                                                {{ $list->exam_from_date ? \Carbon\Carbon::parse($list->exam_from_date)->format('d/m/Y') : '-' }}
                                                To
                                                {{ $list->exam_to_date ? \Carbon\Carbon::parse($list->exam_to_date)->format('d/m/Y') : '-' }}
                                            </td>
                                            <td>{{ $list->ptm_date ? \Carbon\Carbon::parse($list->ptm_date)->format('d/m/Y') : '-' }}
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4" class="text-center py-4">
                                            <img src="{{ asset('no_data_image.avif') }}" alt="No Data Found"
                                                style="width: 200px; opacity: 0.7;">
                                            <p class="text-muted mt-2">No Data Found</p>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>

                </div><!-- /exam-tables-row -->
            </div><!-- /sub-section -->

            <!-- ── PRE-BOARD DATES ── -->
            <div class="sub-section">
                <div class="timetable-heading">
                    <h3>Pre-Board Dates</h3>
                </div>

                <div class="preboard-grid">
                    @if (isset($preBoardDatesList) && $preBoardDatesList->count() > 0)
                        @foreach ($preBoardDatesList as $data)
                            <div class="preboard-date-card">
                                <div class="card-label"><i class="far fa-calendar-check"></i> {{ $data->title }}</div>
                                <p>Date: <span>{{ $data->from_date ? \Carbon\Carbon::parse($data->from_date)->format('d/m/Y') : '-' }}
                                        TO
                                        {{ $data->to_date ? \Carbon\Carbon::parse($data->to_date)->format('d/m/Y') : '-' }}</span>
                                </p>
                            </div>
                        @endforeach
                    @else
                        <img src="{{ asset('no_data_image.avif') }}" alt="No Data Found"
                            style="width: 200px; opacity: 0.7;">
                        <p class="text-muted mt-2">No Data Found</p>
                    @endif
                </div>
            </div><!-- /sub-section -->

            <!-- ── PRACTICAL EXAMINATION SCHEDULE ── -->
            <div class="sub-section">
                <div class="timetable-heading">
                    <h3>Practical Examination Schedule</h3>
                </div>

                <div class="practical-grid">
                    @if (isset($practicalExaminationScheduleList) && $practicalExaminationScheduleList->count() > 0)
                        @foreach ($practicalExaminationScheduleList as $data)
                            <div class="practical-card">
                                <div class="practical-card-header">
                                    <i class="fas fa-flask"></i> {{ $data->title }}
                                </div>
                                <div class="practical-card-body">
                                    <p>Date:</p>
                                    <div class="date-value">
                                        {{ $data->from_date ? \Carbon\Carbon::parse($data->from_date)->format('d/m/Y') : '-' }}
                                        TO
                                        {{ $data->to_date ? \Carbon\Carbon::parse($data->to_date)->format('d/m/Y') : '-' }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div><!-- /sub-section -->

        </div>
    </div>
    <!-- Timetable Content End -->
    <!-- InstanceEndEditable -->



@endsection




<style>
    /* ── Timetable Custom Styles ── */

    .timetable-section {
        padding: 80px 0;
    }

    /* Section heading (orange, centered, underline) */
    .timetable-heading {
        text-align: center;
        margin-bottom: 40px;
    }

    .timetable-heading h3 {
        font-size: 30px;
        font-weight: 700;
        color: #2f2a55;
        display: inline-block;
        position: relative;
        padding-bottom: 12px;
        padding-top: 25px;
    }

    .timetable-heading h3::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 60px;
        height: 3px;
        background: #2f2a55;
        border-radius: 2px;
    }

    /* Two-column grid for exam tables */
    .exam-tables-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 30px;
        margin-bottom: 50px;
    }

    @media (max-width: 991px) {
        .exam-tables-row {
            grid-template-columns: 1fr;
        }
    }

    /* Card wrapper */
    .exam-card {
        background: #fff;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.07);
    }

    /* Card header – dark blue matching DCHS theme */
    .exam-card-header {
        background: #225178;
        color: #fff;
        padding: 16px 22px;
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 16px;
        font-weight: 600;
    }

    .exam-card-header i {
        color: #f5a623;
        font-size: 18px;
    }

    /* Table inside card */
    .exam-card table {
        width: 100%;
        border-collapse: collapse;
    }

    .exam-card table thead tr {
        background: #edf1f9;
    }

    .exam-card table thead th {
        padding: 11px 14px;
        font-size: 13px;
        font-weight: 700;
        color: #225178;
        text-align: left;
        border-bottom: 2px solid #d8e2f3;
    }

    .exam-card table tbody tr {
        border-bottom: 1px solid #eaeef6;
        transition: background 0.15s;
    }

    .exam-card table tbody tr:hover {
        background: #f5f8ff;
    }

    .exam-card table tbody td {
        padding: 10px 14px;
        font-size: 13px;
        color: #444;
        vertical-align: middle;
    }

    .exam-card table tbody td:first-child {
        font-weight: 700;
        color: #225178;
        text-align: center;
        width: 60px;
    }

    /* Pre-Board date cards grid */
    .preboard-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
        margin-bottom: 50px;
    }

    @media (max-width: 991px) {
        .preboard-grid {
            grid-template-columns: 1fr 1fr;
        }
    }

    @media (max-width: 575px) {
        .preboard-grid {
            grid-template-columns: 1fr;
        }
    }

    .preboard-date-card {
        border: 2px dashed #c9d7ee;
        border-radius: 10px;
        padding: 20px 18px;
        transition: border-color 0.2s, box-shadow 0.2s;
    }

    .preboard-date-card:hover {
        border-color: #225178;
        box-shadow: 0 4px 16px rgba(26, 54, 105, 0.1);
    }

    .preboard-date-card .card-label {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 14px;
        font-weight: 700;
        color: #225178;
        margin-bottom: 8px;
    }

    .preboard-date-card .card-label i {
        color: #f5a623;
    }

    .preboard-date-card p {
        font-size: 13px;
        color: #666;
    }

    .preboard-date-card p span {
        font-weight: 600;
        color: #333;
    }

    /* Practical exam cards */
    .practical-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 22px;
    }

    @media (max-width: 575px) {
        .practical-grid {
            grid-template-columns: 1fr;
        }
    }

    .practical-card {
        background: #fff;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 3px 14px rgba(0, 0, 0, 0.07);
    }

    .practical-card-header {
        background: #225178;
        color: #fff;
        padding: 14px 20px;
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 15px;
        font-weight: 600;
    }

    .practical-card-header i {
        color: #f5a623;
    }

    .practical-card-body {
        padding: 18px 20px;
    }

    .practical-card-body p {
        font-size: 13px;
        color: #666;
        margin-bottom: 4px;
    }

    .practical-card-body .date-value {
        font-size: 15px;
        font-weight: 700;
        color: #225178;
    }

    /* Sub-section spacing */
    .sub-section {
        margin-bottom: 60px;
    }

    .sub-section:last-child {
        margin-bottom: 0;
    }
</style>
