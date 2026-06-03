@extends('admin.common')
@section('content')

    <style>
        .stat-card {
            width: 100%;
            height: 160px;
            border-radius: 16px;
            padding: 25px;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            transition: all 0.3s ease;
            color: #333;
            position: relative;
            overflow: hidden;
            /* Important for many modern effects */
            border: 1px solid #5f8b332e;
            cursor: pointer;
        }

        /* Hover Effect for all default-style cards */
        .stat-card:not(.neumorph):not(.tilt):not(.animated-border):hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.07);

        }

        .stat-card .icon {
            font-size: 26px;
            margin-bottom: 12px;
            z-index: 2;
            /* Ensures icon is above background effects */
        }

        .stat-card .title {
            font-size: 16px;
            color: #666;
            font-weight: 500;
            margin-bottom: 6px;
            z-index: 2;
        }

        .stat-card .value {
            font-size: 26px;
            font-weight: bold;
            z-index: 2;
        }

        .blurred-icon {
            background: #fff;
        }

        .blurred-icon::after {
            content: attr(data-value);
            /* Use data attribute for large number */
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            font-size: 70px;
            font-weight: 900;
            /* color: rgba(0, 123, 255, 0.08);  */
            color: rgba(105, 108, 255, 0.10);
            z-index: 1;
            transition: all 0.3s ease;
        }

        .blurred-icon:hover::after {
            right: 20px;
            /* color: rgba(0, 123, 255, 0.15); */
            color: rgba(105, 108, 255, 0.35)
        }
    </style>

    <div class="px-3 px-md-5 flex-grow-1 container-p-y mt-4">
        <h4 class="mx-0 mb-3">Dashboard</h4>
        <div class="row">
            <div class="col-12 col-sm-6 col-md-6 col-lg-3">

                <div class="stat-card blurred-icon">

                    <div class="icon">
                        <img src="{{ asset('admin_css/assets/img/man.png') }}" style="width:30%;" alt="">
                    </div>
                    <div class="title">Total Users</div>
                    <div class="value">0</div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                <div class="stat-card blurred-icon">
                    <div class="icon">
                        <img src="{{ asset('admin_css/assets/img/blog.png') }}" style="width:30%;" alt="">
                    </div>
                    <div class="title">Total Blogs</div>
                    <div class="value">0</div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                <div class="stat-card blurred-icon">
                    <div class="icon">
                        <img src="{{ asset('admin_css/assets/img/management.png') }}" style="width:30%;" alt="">
                    </div>
                    <div class="title">Total Inquiry</div>
                    <div class="value">0</div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                <div class="stat-card blurred-icon">
                    <div class="icon">
                        <img src="{{ asset('admin_css/assets/img/request.png') }}" style="width:30%;" alt="">
                    </div>
                    <div class="title">Total Request</div>
                    <div class="value">0</div>
                </div>
            </div>
        </div>
    </div>



@endsection