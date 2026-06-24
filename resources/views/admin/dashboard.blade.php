@extends('admin.common')
@section('content')

    <style>
        .dashboard-banner {
            background: linear-gradient(135deg, #3e77a5, #225178);
            border-radius: 20px;
            padding: 30px;
            color: white;
            box-shadow: 0 10px 30px rgba(115, 117, 235, 0.25);
        }

        .school-title {
            font-weight: 700;
            margin: 0;
            padding-bottom: 10px;

            color: white;
        }

        .school-subtitle {
            opacity: .9;
            font-size: 15px;
        }

        .banner-icon {
            font-size: 90px;
            opacity: .25;
        }

        .stat-card {
            width: 100%;
            height: 170px;
            border-radius: 18px;
            padding: 20px;
            background: #fff;
            border: none;
            position: relative;
            overflow: hidden;
            transition: .3s;
            box-shadow: 0 4px 20px rgba(0, 0, 0, .05);
        }

        .stat-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, .10);
        }

        .stat-card .title {
            color: black;
            font-size: 20px;
            margin-top: 10px;
        }

        .stat-card .value {
            font-size: 30px;
            font-weight: 700;
            color: #2d3748;
        }

        .icon-box {
            width: 60px;
            height: 60px;
            border-radius: 15px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .icon-box i {
            font-size: 30px;
        }

        .inquiry-icon {
            background: rgba(105, 108, 255, .12);
        }

        .award-icon {
            background: rgba(255, 180, 0, .15);
        }

        .event-icon {
            background: rgba(3, 195, 236, .15);
        }

        .management-icon {
            background: rgba(113, 221, 55, .15);
        }

        .staff-icon {
            background: rgba(255, 62, 29, .15);
        }

        .blurred-icon::after {
            content: attr(data-value);
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 80px;
            font-weight: 900;
            color: rgba(105, 108, 255, .08);
            transition: .3s;
        }

        .blurred-icon:hover::after {
            right: 25px;
            color: rgba(105, 108, 255, .18);
        }

        .quick-card {
            background: white;
            border-radius: 18px;
            padding: 25px;
            text-align: center;
            box-shadow: 0 4px 20px rgba(0, 0, 0, .05);
            transition: .3s;
            height: 100%;
        }

        .quick-card:hover {
            transform: translateY(-5px);
        }

        .quick-card i {
            font-size: 40px;
            color: #696cff;
            margin-bottom: 10px;
        }

        .quick-card h6 {
            margin: 0;
            color: #444;
        }
    </style>

    <div class="px-3 px-md-5 flex-grow-1 container-p-y mt-4">
        <h4 class="mx-0 mb-3">Dashboard</h4>

        <div class="dashboard-banner mb-4">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h2 class="school-title mb-2">
                        🎓 Divine Child School Dashboard
                    </h2>

                    <p class="school-subtitle mb-1">
                        Welcome Back, Administrator
                    </p>

                    <small>
                        {{ date('l, d F Y') }}
                    </small>
                </div>

                <div class="col-md-4 text-end d-none d-md-block">
                    <i class='bx bxs-school banner-icon'></i>
                </div>
            </div>
        </div>


        <!-- <div class="row">

                    <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4">
                        <a href="{{ route('inquiry-form-list') }}" class="text-decoration-none">
                            <div class="stat-card blurred-icon" data-value="{{ $totalInquiry }}">
                                <div class="icon">
                                    <i class='bx bx-message-square-detail' style="font-size:32px;color:#696cff;"></i>
                                </div>
                                <div class="title">Total Inquiry</div>
                                <div class="value">{{ $totalInquiry }}</div>
                            </div>
                        </a>
                    </div>

                    <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4">
                        <a href="{{ route('award-list') }}" class="text-decoration-none">
                            <div class="stat-card blurred-icon" data-value="{{ $totalAwards }}">
                                <div class="icon">
                                    <i class='bx bx-award' style="font-size:32px;color:#ffb400;"></i>
                                </div>
                                <div class="title">Total Awards</div>
                                <div class="value">{{ $totalAwards }}</div>
                            </div>
                        </a>
                    </div>

                    <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4">
                        <a href="{{ route('event-list') }}" class="text-decoration-none">
                            <div class="stat-card blurred-icon" data-value="{{ $totalEvents }}">
                                <div class="icon">
                                    <i class='bx bx-calendar-event' style="font-size:32px;color:#03c3ec;"></i>
                                </div>
                                <div class="title">Total Events</div>
                                <div class="value">{{ $totalEvents }}</div>
                            </div>
                        </a>
                    </div>

                    <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4">
                        <a href="{{ route('management-list') }}" class="text-decoration-none">
                            <div class="stat-card blurred-icon" data-value="{{ $totalManagement }}">
                                <div class="icon">
                                    <i class='bx bx-group' style="font-size:32px;color:#71dd37;"></i>
                                </div>
                                <div class="title">Total Management</div>
                                <div class="value">{{ $totalManagement }}</div>
                            </div>
                        </a>
                    </div>

                    <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4">
                        <a href="{{ route('staff-list') }}" class="text-decoration-none">
                            <div class="stat-card blurred-icon" data-value="{{ $totalStaff }}">
                                <div class="icon">
                                    <i class='bx bx-user-circle' style="font-size:32px;color:#ff3e1d;"></i>
                                </div>
                                <div class="title">Total Staff</div>
                                <div class="value">{{ $totalStaff }}</div>
                            </div>
                        </a>
                    </div>

                </div> -->


        <div class="row">

            <!-- Inquiry -->
            <div class="col-lg-3 col-md-6 mb-4">
                <a href="{{ route('inquiry-form-list') }}" class="text-decoration-none">
                    <div class="stat-card blurred-icon" data-value="{{ $totalInquiry }}">
                        <div class="icon-box inquiry-icon">
                            <i class='bx bx-message-square-detail text-primary'></i>
                        </div>
                        <div class="title">Total Inquiry</div>
                        <div class="value">{{ $totalInquiry }}</div>
                    </div>
                </a>
            </div>

            <!-- Awards -->
            <div class="col-lg-3 col-md-6 mb-4">
                <a href="{{ route('award-list') }}" class="text-decoration-none">
                    <div class="stat-card blurred-icon" data-value="{{ $totalAwards }}">
                        <div class="icon-box award-icon">
                            <i class='bx bx-award text-warning'></i>
                        </div>
                        <div class="title">Total Awards</div>
                        <div class="value">{{ $totalAwards }}</div>
                    </div>
                </a>
            </div>

            <!-- Events -->
            <div class="col-lg-3 col-md-6 mb-4">
                <a href="{{ route('event-list') }}" class="text-decoration-none">
                    <div class="stat-card blurred-icon" data-value="{{ $totalEvents }}">
                        <div class="icon-box event-icon">
                            <i class='bx bx-calendar-event text-info'></i>
                        </div>
                        <div class="title">Total Events</div>
                        <div class="value">{{ $totalEvents }}</div>
                    </div>
                </a>
            </div>

            <!-- Management -->
            <div class="col-lg-3 col-md-6 mb-4">
                <a href="{{ route('management-list') }}" class="text-decoration-none">
                    <div class="stat-card blurred-icon" data-value="{{ $totalManagement }}">
                        <div class="icon-box management-icon">
                            <i class='bx bx-group text-success'></i>
                        </div>
                        <div class="title">Total Management</div>
                        <div class="value">{{ $totalManagement }}</div>
                    </div>
                </a>
            </div>

            <!-- Staff -->
            <div class="col-lg-3 col-md-6 mb-4">
                <a href="{{ route('staff-list') }}" class="text-decoration-none">
                    <div class="stat-card blurred-icon" data-value="{{ $totalStaff }}">
                        <div class="icon-box staff-icon">
                            <i class='bx bx-user-circle text-danger'></i>
                        </div>
                        <div class="title">Total Staff</div>
                        <div class="value">{{ $totalStaff }}</div>
                    </div>
                </a>
            </div>

        </div>



        


    </div>



@endsection