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
                            <h2 class="title">About Us</h2>
                            <ul class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">About Us</li>
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
                            <h2 class="title">Divine Child High School</h2>
                            <p class="text">Divine Child High School, DCHS, aims to provide an exciting all round education
                                as the first in a personally fulfilling and socially useful life. It provides a balanced
                                environment focused on shaping children into leaders of tomorrow. Our school environment
                                promotes order, independence, a love for learning, a connection to the world and a sense of
                                social responsibility.</p>

                            <p class="text">DCHS is located in the heart of the bustling and vibrant city of Surat, one of
                                India’s fastest growing cities. Since 1996, when DCHS was established, perseverance,
                                dedication and hard work have seen the school grow and earn the trust of thousands of
                                parents to entrust their children to the care of the school.</p>

                            <p class="text">The medium of instruction is English and the curriculum offered is Central Board
                                Certificate Examination (CBSE) along with the Gujarat State Education Board (GSEB). The
                                students of DCHS are as diverse as Surat city itself. We encourage our students to maintain
                                openness of mind, dignity of conduct and mutual respect in the face of cultural, economic,
                                religious and linguistic diversity.</p>

                            <p class="text">The school buildings are modern and spacious providing students the comfortable
                                environment they need for an all round education.</p>
                        </div>
                    </div>
                </div>
                <div class="row pt-4">
                    <div class="col-md-3">
                        <img src="{{ asset('website/assets/images/about/ashik-narsee.jpg') }}" alt="Ashik Narsee">
                        <h4>President - Ashik Narsee</h4>
                    </div>
                    <div class="col-md-3">
                        <img src="{{ asset('website/assets/images/about/hame-narsee.jpg') }}" alt="Hama Narsee">
                        <h4>Principal - Hama Narsee</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
    <!-- InstanceEndEditable -->



@endsection