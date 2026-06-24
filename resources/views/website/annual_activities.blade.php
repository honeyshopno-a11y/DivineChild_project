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
                            <h2 class="title">Annual Activities</h2>
                            <ul class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Annual Activities</li>
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
    <!-- About Start -->
    <div class="section upstudy-about-section-04 section-padding-02">
        <div class="container">
            <div class="about-wrap">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="about-content" style="
                                    align-items: center;
                                    display: flex;
                                    justify-content: center;
                                    padding-right: 0px
                                ">
                            <!-- <h2 class="title">Annual Activities</h2> -->
                            <img src="{{ asset('website/assets/images/work_in_progress.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
    <!-- InstanceEndEditable -->




@endsection