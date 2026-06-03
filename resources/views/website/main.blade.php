<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Divine Child High School</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('website/assets/images/favicon.png') }}">

    <link rel="stylesheet" href="{{ asset('website/assets/css/plugins/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('website/assets/css/plugins/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('website/assets/css/plugins/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('website/assets/css/plugins/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('website/assets/css/plugins/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('website/assets/css/plugins/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('website/assets/css/plugins/jquery.powertip.min.css') }}">
    <link rel="stylesheet" href="{{ asset('website/assets/css/plugins/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('website/assets/css/style.css') }}">
</head>

<body>
    <div class="main-wrapper">
        <!-- Preloader start -->
        <!--
		<div id="preloader">
			<div class="preloader preloader-02">
				<span></span>
				<span></span>
			</div>
		</div>
-->
        <!-- Preloader End -->

        <!-- Header Start  -->
        <div class="section header header-section-02 header-section-05">
            <div class="header-top d-none d-lg-flex">
                <div class="container">
                    <div class="header-top-aff">
                        <div class="header-top-detail">
                            <h5 class="top-head">Affiliation No. 430099 &nbsp; | &nbsp; School DISE Code: ------- &nbsp;
                                | &nbsp; School Code: -----</h5>
                        </div>
                    </div>
                </div>
            </div>

            <div class="header-top-section d-none d-lg-flex">
                <div class="container">
                    <div class="header-top-wrap">
                        <div class="header-top-info">
                            <ul>
                                <li><i class="flaticon-phone-call"></i> Call +91–261–2231515 </li>
                                <li><i class="fas fa-envelope"></i> info.dchs07@gmail.com</li>
                            </ul>
                        </div>

                        <div class="header-social">
                            <ul class="social">
                                <li>
                                    <a href="https://www.facebook.com/divinesurat/" target="_blank"><i
                                            class="fab fa-facebook-f"></i></a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/divine_child_high_school_surat/"
                                        target="_blank"><i class="fab fa-instagram"></i></a>
                                </li>
                                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="header-bottom-section">
                <div class="container-fluid custom-container">
                    <div class="header-bottom-wrap">
                        <div class="header-logo"><a href="{{ url('/') }}"><img
                                    src="{{ asset('website/assets/images/logo/dchs-logo.png') }}" alt="logo"></a></div>
                        <div class="header-menu d-none d-lg-block">
                            <ul class="main-menu">
                                <li class="active-menu"><a href="{{url('/')}}">Home</a></li>

                                <li><a href="#">About Us</a>
                                    <ul class="sub-menu">
                                        <li><a href="{{ route('about-us') }}">About School</a></li>
                                        <li><a href="{{route('principal-desk')}}">Principal's Desk</a></li>
                                        <li><a href="{{ route('mission-vision') }}">Mission / Vision</a></li>
                                        <li><a href="#">Management</a></li>
                                        <li><a href="#">Staff</a></li>
                                        <li><a href="#">Affiliation</a></li>
                                    </ul>
                                </li>

                                <li><a href="#">Admission</a>
                                    <ul class="sub-menu">
                                        <li><a href="{{ route('documents') }}">Required Documents</a></li>
                                        <li><a href="{{ route('ageCriteria') }}">Age Criteria</a></li>
                                        <li><a href="{{ route('feesStructure') }}">Fee Structure</a></li>
                                        <li><a href="{{ route('transfer-certificates') }}">Transfer Certificate</a></li>
                                    </ul>
                                </li>

                                <li><a href="#">Academics</a>
                                    <ul class="sub-menu">
                                        <li><a href="{{route('timetable')}}">Timetable</a></li>
                                        <li><a href="{{ route('syllabus') }}">Syllabus</a></li>
                                        <li><a href="{{ route('ExamSchedule') }}">Examination Schedule</a></li>
                                        <li><a href="{{ route('holidayList') }}">Holiday List</a></li>
                                    </ul>
                                </li>

                                <li><a href="{{ route('public-disclosure') }}">Public Disclosure</a></li>

                                <li><a href="#">Media</a>
                                    <ul class="sub-menu">
                                        <li><a href="{{ route('gallery') }}">Photo Gallery</a></li>
                                        <li><a href="{{ route('events') }}">News / Events</a></li>
                                        <li><a href="{{ route('awards') }}">Awards / Achievements</a></li>
                                    </ul>
                                </li>

                                <li><a href="{{ route('prospectus') }}">Prospectus</a></li>

                                <li><a href="{{ route('contact-us') }}">Contact Us</a></li>
                                <li><a href="{{ route('inquiryform') }}">Inquiry Form</a></li>
                            </ul>
                        </div>

                        <div class="header-meta">
                            <div class="header-toggle d-lg-none">
                                <button data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->

        <!-- Offcanvas Start -->
        <!-- <div class="offcanvas offcanvas-start" id="offcanvasMenu">
            <div class="offcanvas-header">
                <div class="offcanvas-logo"><a href="#"><img
                            src="{{ asset('website/assets/images/logo/dchs-logo.png') }}" alt=""></a></div>
                <button type="button" class="close-btn" data-bs-dismiss="offcanvas"><i
                        class="flaticon-close"></i></button>
            </div>
            <div class="offcanvas-body">
                <div class="offcanvas-menu">
                    <ul class="main-menu">
                        <li class="active-menu"><a href="index.html">Home</a></li>

                        <li><a href="#">About Us</a>
                            <ul class="sub-menu">
                                <li><a href="{{ route('about-us') }}">About School</a></li>
                                <li><a href="principals-mesage.html">Principal's Desk</a></li>
                                <li><a href="mission-vision.html">Mission / Vision</a></li>
                                <li><a href="#">Management</a></li>
                                <li><a href="#">Staff</a></li>
                                <li><a href="#">Affiliation</a></li>
                            </ul>
                        </li>

                        <li><a href="#">Admission</a>
                            <ul class="sub-menu">
                                <li><a href="#">Required Documents</a></li>
                                <li><a href="#">Age Criteria</a></li>
                                <li><a href="#">Fee Structure</a></li>
                                <li><a href="transfer-certificates.html">Transfer Certificate</a></li>
                            </ul>
                        </li>

                        <li><a href="#">Academics</a>
                            <ul class="sub-menu">
                                <li><a href="timetable.html">Timetable</a></li>
                                <li><a href="syllabus.html">Syllabus</a></li>
                                <li><a href="#">Examination Schedule</a></li>
                                <li><a href="#">Holiday List</a></li>
                            </ul>
                        </li>

                        <li><a href="public-disclosure.html">Public Disclosure</a></li>

                        <li><a href="#">Media</a>
                            <ul class="sub-menu">
                                <li><a href="gallery.html">Photo Gallery</a></li>
                                <li><a href="#">News / Events</a></li>
                                <li><a href="#">Awards / Achievements</a></li>
                            </ul>
                        </li>

                        <li><a href="prospectus.html">Prospectus</a></li>

                        <li><a href="contact-us.html">Contact Us</a></li>
                        <li><a href="inquiryform.html">Inquiry Form</a></li>
                    </ul>
                </div>
            </div>
        </div> -->
        <!-- Offcanvas End -->

        @yield('content')

        <!-- Map Starts -->
        <!--
		<div>
			<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d930.1070449582529!2d72.81245257116394!3d21.1751429621072!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04e0cd06399a3%3A0x3ea35e61ddf87e50!2sDivine%20Child%20High%20School!5e0!3m2!1sen!2sin!4v1691142633923!5m2!1sen!2sin" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
		</div>
-->
        <!-- Map End -->
        <!-- InstanceEndEditable -->

        <!-- Footer Start -->
        <div class="footer-section section">
            <div class="container">
                <div class="footer-widget-wrap">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="footer-widget">
                                <h4 class="footer-widget-title">Navigation Link</h4>
                                <div class="widget-info widget-link">
                                    <ul class="link">
                                        <li><a href="{{ route('about-us') }}">About School</a></li>
                                        <li><a href="{{ route('principal-desk') }}">Principal's Desk</a></li>
                                        <li><a href="{{ route('mission-vision') }}">Mission / Vision</a></li>
                                        <li><a href="#">Management</a></li>
                                        <li><a href="#">Staff</a></li>
                                        <li><a href="#">Affiliation</a></li>
                                        <li><a href="{{ route('public-disclosure') }}">Public Disclosure</a></li>
                                        <li><a href="{{ route('prospectus') }}">Prospectus</a></li>
                                        <li><a href="{{ route('contact-us') }}">Contact Us</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="footer-widget">
                                <h4 class="footer-widget-title">Useful Link</h4>
                                <div class="widget-info widget-link">
                                    <ul class="link">
                                        <li><a href="{{ route('documents') }}">Required Documents</a></li>
                                        <li><a href="{{ route('feesStructure') }}">Fee Structure</a></li>
                                        <li><a href="{{ route('transfer-certificates') }}">Transfer Certificate</a></li>
                                        <li><a href="{{ route('timetable') }}">Timetable</a></li>
                                        <li><a href="{{ route('syllabus') }}">Syllabus</a></li>
                                        <li><a href="{{ route('ExamSchedule') }}">Examination Schedule</a></li>
                                        <li><a href="{{ route('holidayList') }}">Holiday List</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="footer-widget">
                                <h4 class="footer-widget-title">Contact Info.</h4>
                                <div class="widget-info widget-info-3">
                                    <ul>
                                        <div class="info-text pb-4">
                                            <p class="call-text pb-1">Main Building</p>
                                            <p>{{ $contact->main_building ?? '-' }}</p>
                                        </div>

                                        <div class="info-text pb-4">
                                            <p class="call-text pb-1">Old Building</p>
                                            <p>{{ $contact->old_building ?? '-' }}</p>
                                        </div>

                                        <div class="info-text pb-4">
                                            <p class="call-text pb-1">Call Us Free</p>
                                            <p>{{ $contact->number ?? '-' }}</p>
                                        </div>

                                        <div class="info-text pb-4">
                                            <p class="call-text pb-1">Email Id</p>
                                            <p>{{ $contact->email ?? '-' }}</p>
                                        </div>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="footer-widget">
                                <h4 class="footer-widget-title">Locate Us</h4>
                                <div class="widget-info widget-link">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d930.1070449582529!2d72.81245257116394!3d21.1751429621072!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04e0cd06399a3%3A0x3ea35e61ddf87e50!2sDivine%20Child%20High%20School!5e0!3m2!1sen!2sin!4v1691142633923!5m2!1sen!2sin"
                                        width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Footer Widget Wrapper End -->

                <!-- Footer Copyright Start -->
                <div class="footer-copyright">
                    <div class="copyright-wrapper">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-6">
                                <div class="copyright-text">
                                    <p>© 2026 Divine Child High School. All rights reserved. Design &amp; Developed By:
                                        <a href="http://www.desirationhub.com" target="_blank">Desiration Hub</a>
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="copyright-social">
                                    <ul class="social">
                                        <li><a href="https://www.facebook.com/divinesurat/" target="_blank"><i
                                                    class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="https://www.instagram.com/divine_child_high_school_surat/"
                                                target="_blank"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->

        <!-- back to top start -->
        <div class="progress-wrap">
            <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
            </svg>
        </div>
        <!-- back to top end -->
    </div>


    <!-- JS -->
    <script src="{{ asset('website/assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('website/assets/js/vendor/modernizr-3.11.2.min.js') }}"></script>
    <script src="{{ asset('website/assets/js/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('website/assets/js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('website/assets/js/plugins/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('website/assets/js/plugins/aos.js') }}"></script>
    <script src="{{ asset('website/assets/js/plugins/waypoints.min.js') }}"></script>
    <script src="{{ asset('website/assets/js/plugins/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('website/assets/js/plugins/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('website/assets/js/plugins/back-to-top.js') }}"></script>
    <script src="{{ asset('website/assets/js/plugins/jquery.powertip.min.js') }}"></script>
    <script src="{{ asset('website/assets/js/plugins/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('website/assets/js/main.js') }}"></script>

</body>

</html>