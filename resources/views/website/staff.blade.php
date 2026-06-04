@extends('website.main')

@section('content')
 
		 

		<!-- Offcanvas Start -->
		<!-- <div class="offcanvas offcanvas-start" id="offcanvasMenu">
			<div class="offcanvas-header">
				<div class="offcanvas-logo"><a href="#"><img src="assets/images/logo/dchs-logo.png" alt=""></a></div>
				<button type="button" class="close-btn" data-bs-dismiss="offcanvas"><i class="flaticon-close"></i></button>
			</div>
			<div class="offcanvas-body">
				<div class="offcanvas-menu">
					<ul class="main-menu">
						<li class="active-menu"><a href="index.html">Home</a></li>

						<li><a href="#">About Us</a>
							<ul class="sub-menu">
								<li><a href="about-us.html">About School</a></li>
								<li><a href="principals-mesage.html">Principal's Desk</a></li>
								<li><a href="mission-vision.html">Mission / Vision</a></li>
								<li><a href="management.html">Management</a></li>
								<li><a href="staff.html">Staff</a></li>
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
								<li><a href="#">Timetable</a></li>
								<li><a href="#">Syllabus</a></li>
								<li><a href="#">Examination Schedule</a></li>
								<li><a href="#">Holiday List</a></li>
							</ul>
						</li>

						<li><a href="public-disclosure.html">Public Disclosure</a></li>

						<li><a href="#">Media</a>
							<ul class="sub-menu">
								<li><a href="gallery.html">Photo Gallery</a></li>
								<li><a href="news-and-events.html">News / Events</a></li>
								<li><a href="awards-and-achievements.html">Awards / Achievements</a></li>
							</ul>
						</li>
						
						<li><a href="prospectus.html">Prospectus</a></li>

						<li><a href="contact-us.html">Contact Us</a></li>
						
						<li><a href="#">Inquriy Form</a></li>
					</ul>
				</div>
			</div>
		</div> -->
		<!-- Offcanvas End -->

		<!-- InstanceBeginEditable name="slider" -->
		<!-- Page Banner Start -->
		<div class="section page-banner-section">
			<div class="container">
				<div class="page-banner-wrap">
					<div class="row">
						<div class="col-lg-12">
							<div class="page-banner text-center">
								<h2 class="title">Staff</h2>
								<ul class="breadcrumb justify-content-center">
									<li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Staff</li>
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
		<!-- Management Start -->
		<div class="section upstudy-team-section section-padding">
			<div class="container">
				<div class="team-wrap">
					<div class="row">
                        @foreach ($staff as $i)
                        <div class="col-lg-3 col-sm-6">
							<div class="single-team-02">
								<div class="team-img">
									<a href="#"><img src="{{ asset($i->image)}}" alt=""></a>
								</div>
								<div class="team-content text-center">
									<h3 class="name"><a href="#">{{ $i->name }}</a></h3>
									<p class="designation">{{ $i->role }}</p>
								</div>
							</div>
						</div>
                        @endforeach
						 
						 
						
					</div>
				</div>
			</div>
		</div>
        <!-- Management End -->
		<!-- InstanceEndEditable -->

		 

		<!-- back to top start -->
		<div class="progress-wrap">
			<svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102"><path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" /></svg>
		</div>
		<!-- back to top end -->
	</div>
@endsection