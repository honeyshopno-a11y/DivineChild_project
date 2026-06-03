@extends('admin.common')

@section('content')

    <style>
        .inquiry-card {
            border-radius: 12px;
            border: 1px solid #e5e5e5;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            margin-bottom: 25px;
            overflow: hidden;
            background: #fff;
        }

        .card-header-custom {
            background: #225178;
            color: #fff;
            padding: 15px 20px;
        }

        .card-header-custom h4 {
            margin: 0;
            color: #fff;
            font-size: 20px;
            font-weight: 600;
        }

        .detail-box {
            border: 1px solid #ececec;
            border-radius: 10px;
            padding: 15px;
            height: 100%;
            background: #fafafa;
        }

        .detail-box strong {
            display: block;
            color: #225178;
            margin-bottom: 5px;
            font-size: 14px;
        }

        .detail-box p {
            margin: 0;
            color: #333;
            font-size: 15px;
            word-break: break-word;
        }

        .profile-image {
            width: 130px;
            height: 130px;
            border-radius: 10px;
            object-fit: cover;
            border: 2px solid #ddd;
        }

        .section-title {
            font-size: 22px;
            font-weight: 600;
            margin-bottom: 20px;
            color: #333;
        }
    </style>

    <div class="container py-4">

        <div class="section-title">
            Inquiry Form Details
        </div>

        <!-- BASIC DETAILS -->
        <div class="inquiry-card">

            <div class="card-header-custom">
                <h4>Basic Details</h4>
            </div>

            <div class="card-body p-4">

                <div class="row g-4">

                    <!-- <div class="col-md-3 text-center">

                                                                        @if($inquiry->child_photo)
                                                                                <img src="{{ asset('uploads/inquiry/'.$inquiry->child_photo) }}"
                                                                                    class="profile-image">
                                                                            @else
                                                                                <img src="https://via.placeholder.com/130"
                                                                                    class="profile-image">
                                                                            @endif

                                                                        <h6 class="mt-2">Child Photo</h6>

                                                                    </div> -->

                    @if($inquiry->child_photo)

                        <div class="col-md-3 text-center">

                            <img src="{{ asset('uploads/inquiry/' . $inquiry->child_photo) }}" class="profile-image">

                            <h6 class="mt-2">Child Photo</h6>

                        </div>

                    @endif

                    <div class="col-md-9">

                        <div class="row g-3">

                            <div class="col-md-4">
                                <div class="detail-box">
                                    <strong>Academic Year</strong>
                                    <p>{{ $inquiry->academic_year }}</p>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="detail-box">
                                    <strong>Class</strong>
                                    <p>{{ $inquiry->class }}</p>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="detail-box">
                                    <strong>Student Name</strong>
                                    <p>{{ $inquiry->student_name }}</p>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="detail-box">
                                    <strong>Email</strong>
                                    <p>{{ $inquiry->primary_email_id }}</p>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="detail-box">
                                    <strong>Mobile No</strong>
                                    <p>{{ $inquiry->primary_mobile_no }}</p>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="detail-box">
                                    <strong>Gender</strong>
                                    <p>{{ $inquiry->select_gender }}</p>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="detail-box">
                                    <strong>Date Of Birth</strong>
                                    <p>{{ $inquiry->date_of_birth }}</p>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="detail-box">
                                    <strong>Current Class</strong>
                                    <p>{{ $inquiry->current_class }}</p>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="detail-box">
                                    <strong>School</strong>
                                    <p>{{ $inquiry->name_of_the_present_school }}</p>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- PARENT DETAILS -->
        <div class="inquiry-card">

            <div class="card-header-custom">
                <h4>Parent Details</h4>
            </div>

            <div class="card-body p-4">

                <div class="row g-3">

                    <div class="col-md-6">
                        <div class="detail-box">
                            <strong>Family Category</strong>
                            <p>{{ $inquiry->family_category }}</p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="detail-box">
                            <strong>Total Family Members</strong>
                            <p>{{ $inquiry->total_family_members }}</p>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <!-- FATHER DETAILS -->
        <div class="inquiry-card">

            <div class="card-header-custom">
                <h4>Father Details</h4>
            </div>

            <div class="card-body p-4">

                <div class="row g-4">

                    <!-- <div class="col-md-3 text-center">

                                                                    @if($inquiry->father_photo)

                                                                        <img src="{{ asset('uploads/inquiry/' . $inquiry->father_photo) }}" class="profile-image">

                                                                    @else

                                                                        <img src="https://via.placeholder.com/130" class="profile-image">

                                                                    @endif

                                                                    <h6 class="mt-2">Father Photo</h6>

                                                                </div> -->

                    @if($inquiry->father_photo)

                        <div class="col-md-3 text-center">

                            <img src="{{ asset('uploads/inquiry/' . $inquiry->father_photo) }}" class="profile-image">

                            <h6 class="mt-2">Father Photo</h6>

                        </div>

                    @endif

                    <div class="col-md-9">

                        <div class="row g-3">

                            <div class="col-md-4">
                                <div class="detail-box">
                                    <strong>Father Name</strong>
                                    <p>{{ $inquiry->father_name }}</p>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="detail-box">
                                    <strong>Qualification</strong>
                                    <p>{{ $inquiry->father_qualification }}</p>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="detail-box">
                                    <strong>Occupation</strong>
                                    <p>{{ $inquiry->father_occupation }}</p>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- MOTHER DETAILS -->
        <div class="inquiry-card">

            <div class="card-header-custom">
                <h4>Mother Details</h4>
            </div>

            <div class="card-body p-4">

                <div class="row g-4">

                    <!-- <div class="col-md-3 text-center">

                                    @if($inquiry->mother_photo)

                                        <img src="{{ asset('uploads/inquiry/' . $inquiry->mother_photo) }}" class="profile-image">

                                    @else

                                        <img src="https://via.placeholder.com/130" class="profile-image">

                                    @endif

                                    <h6 class="mt-2">Mother Photo</h6>

                                </div> -->


                    @if($inquiry->mother_photo)

                        <div class="col-md-3 text-center">

                            <img src="{{ asset('uploads/inquiry/' . $inquiry->mother_photo) }}" class="profile-image">

                            <h6 class="mt-2">Mother Photo</h6>

                        </div>

                    @endif  

                    <div class="col-md-9">

                        <div class="row g-3">

                            <div class="col-md-4">
                                <div class="detail-box">
                                    <strong>Mother Name</strong>
                                    <p>{{ $inquiry->mother_name }}</p>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="detail-box">
                                    <strong>Qualification</strong>
                                    <p>{{ $inquiry->mother_qualification }}</p>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="detail-box">
                                    <strong>Occupation</strong>
                                    <p>{{ $inquiry->mother_occupation }}</p>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- ADDITIONAL DETAILS -->
        <div class="inquiry-card">

            <div class="card-header-custom">
                <h4>Additional Details</h4>
            </div>

            <div class="card-body p-4">

                <div class="row g-3">

                    <div class="col-md-6">
                        <div class="detail-box">
                            <strong>Current Address</strong>
                            <p>{{ $inquiry->current_address }}</p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="detail-box">
                            <strong>Medical History</strong>
                            <p>{{ $inquiry->medical_history }}</p>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection