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
                            <h2 class="title">Facilities</h2>
                            <ul class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Facilities</li>
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
                        <div class="about-content">
                            <div class="about-list">
                                {!! $facilities->description !!}
                                {{-- <ul>
                                    <li>
                                        <span class="about-icon"><i class="fas fa-check"></i></span>
                                        <span class="about-text">Two state of the art computer labs, with specially designed
                                            software for different age groups, introduce children to the fascinating world
                                            of computers from Nursery onwards.</span>
                                    </li>

                                    <li>
                                        <span class="about-icon"><i class="fas fa-check"></i></span>
                                        <span class="about-text">A spacious well stocked library has books on a wide variety of subjects.</span>
                                    </li>

                                    <li>
                                        <span class="about-icon"><i class="fas fa-check"></i></span>
                                        <span class="about-text">Overhead Projectors (OHP) in every classroom.</span>
                                    </li>

                                    <li>
                                        <span class="about-icon"><i class="fas fa-check"></i></span>
                                        <span class="about-text">Hi-tech audio visual lab with latest equipment for screening of educational and recreational material.</span>
                                    </li>

                                    <li>
                                        <span class="about-icon"><i class="fas fa-check"></i></span>
                                        <span class="about-text">T.T. Volleyball, Basketball, Badminton,
                                            Yoga/Meditation lab, Carrom, Chess, Skating, Karate, Dancing,
                                            Athletics.</span>
                                    </li>

                                    <li>
                                        <span class="about-icon"><i class="fas fa-check"></i></span>
                                        <span class="about-text">Fully equipped Physics, Chemistry and Biology
                                            laboratories.</span>
                                    </li>

                                    <li>
                                        <span class="about-icon"><i class="fas fa-check"></i></span>
                                        <span class="about-text">Well-lit and ventilated classrooms with beautiful
                                            colour themes, individual to each classroom.</span>
                                    </li>

                                    <li>
                                        <span class="about-icon"><i class="fas fa-check"></i></span>
                                        <span class="about-text">Introducing Swimming from the current academic
                                            year.</span>
                                    </li>
                                </ul> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
    <!-- InstanceEndEditable -->
@endsection
