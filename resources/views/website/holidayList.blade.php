@extends('website.main')
@section('content')

    <!-- Page Banner Start -->
    <div class="section page-banner-section">
        <div class="container">
            <div class="page-banner-wrap">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-banner text-center">
                            <h2 class="title">Holiday List</h2>
                            <ul class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                <li class="breadcrumb-item active">Holiday List</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Holiday List Start -->
    <div class="section section-padding">
        <div class="container">

            <div class="text-center mb-5">
                <h2 class="holiday-title">
                    List of Holidays @if($holiday->isNotEmpty() && !empty($holiday->first()->year)) for the Year {{ $holiday->first()->year }} @endif
                </h2>
            </div>

            <div class="table-responsive">
                <table class="table holiday-table ">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Holiday</th>
                            <th>Month</th>
                            <th>Day</th>
                            <th>Date</th>
                        </tr>
                    </thead>

                    <!-- <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Gud Padva</td>
                                        <td>March</td>
                                        <td>Thursday</td>
                                        <td>19-03-2026</td>
                                    </tr>

                                    <tr>
                                        <td>2</td>
                                        <td>Eid-ul-Fitr</td>
                                        <td>March</td>
                                        <td>Friday</td>
                                        <td>20-03-2026</td>
                                    </tr>

                                    <tr>
                                        <td>3</td>
                                        <td>Ram Navmi</td>
                                        <td>March</td>
                                        <td>Thursday</td>
                                        <td>26-03-2026</td>
                                    </tr>

                                    <tr>
                                        <td>4</td>
                                        <td>Mahavir Jayanti</td>
                                        <td>March</td>
                                        <td>Tuesday</td>
                                        <td>31-03-2026</td>
                                    </tr>

                                    <tr>
                                        <td>5</td>
                                        <td>Good Friday</td>
                                        <td>April</td>
                                        <td>Friday</td>
                                        <td>03-04-2026</td>
                                    </tr>
                                </tbody> -->


                    <tbody>
                        @forelse($holiday as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->holiday }}</td>
                                <td>{{ $item->month }}</td>
                                <td>{{ $item->day }}</td>
                                <td>{{ date('d-m-Y', strtotime($item->date)) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">
                                    No Holiday Records Found
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <!-- Holiday List End -->

@endsection


<style>
    .holiday-title {
        color: #225178;
        font-size: 36px;
        font-weight: 700;
    }

    .holiday-table thead {
        background: #1f5aa6;
        color: #fff;
    }

    .holiday-table {
        width: 100%;
        border-collapse: collapse;
        background: #fff;
        border: 1px solid #dcdcdc;
    }

    .holiday-table thead th {
        background: #225178;
        color: #fff !important;
        padding: 14px;
        font-size: 15px;
        font-weight: 600;
        border: 1px solid #dcdcdc;
    }

    .holiday-table tbody td {
        padding: 14px;
        font-size: 14px;
        color: #333;
        border: 1px solid #dcdcdc;
    }

    .holiday-table tbody tr:nth-child(even) {
        background: #f8f9fa;
    }

    .holiday-table tbody tr:hover {
        background: #eef5ff;
        transition: 0.3s;
    }

    @media(max-width:767px) {
        .holiday-title {
            font-size: 24px;
        }

        .holiday-table th,
        .holiday-table td {
            white-space: nowrap;
        }
    }
</style>