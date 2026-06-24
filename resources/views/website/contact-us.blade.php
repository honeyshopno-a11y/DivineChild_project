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
                            <h2 class="title">Contact Us</h2>
                            <ul class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
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
    <!-- Contact Start -->
    <div class="section contact-section section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact-info-wrap">
                        <h3 class="info-title">Contact with us</h3>
                        <div class="single-contact-info">
                            <div class="info-icon"><i class="flaticon-phone-call"></i></div>
                            <div class="info-content">
                                
                                    @if($data)
                                                <h5 class="title">Telephone Number</h5>
                                                <p>{{ $data->number }}</p>
                                            </div>
                                        </div>

                                        <div class="single-contact-info">
                                            <div class="info-icon"><i class="flaticon-email"></i></div>
                                            <div class="info-content">
                                                <h5 class="title">Email Address</h5>
                                                <p>{{$data->email}}</p>
                                            </div>
                                        </div>

                                        <div class="single-contact-info">
                                            <div class="info-icon"><i class="flaticon-pin"></i></div>
                                            <div class="info-content">
                                                <h5 class="title">Main Building: </h5>
                                                <p>{{$data->main_building}}</p>
                                            </div>
                                        </div>

                                        <div class="single-contact-info">
                                            <div class="info-icon"><i class="flaticon-pin"></i></div>
                                            <div class="info-content">
                                                <h5 class="title">Old Building: </h5>
                                                <p>{{$data->old_building}}</p>
                                            </div>
                                        </div>
                                    @endif
                                

                    </div>
                </div>

                <div class="col-lg-6">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d930.1070449582529!2d72.81245257116394!3d21.1751429621072!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04e0cd06399a3%3A0x3ea35e61ddf87e50!2sDivine%20Child%20High%20School!5e0!3m2!1sen!2sin!4v1691142633923!5m2!1sen!2sin"
                        width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
    <!-- InstanceEndEditable -->





@endsection