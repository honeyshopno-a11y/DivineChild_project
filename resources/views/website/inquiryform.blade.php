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
                            <h2 class="title">Inquiry form</h2>
                            <!-- <ul class="breadcrumb justify-content-center">
                                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Gallery</li>
                                        </ul> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Banner End -->
    <!-- InstanceEndEditable -->

    <!-- InstanceBeginEditable name="matter" -->
    <!-- Inquiry Form Start -->
    <div class="section inquiry-form-section" style="background-color: #f8faff; padding-top: 50px; padding-bottom: 80px;">
        <div class="container">
            <style>
                .premium-form-container {
                    background: #ffffff;
                    border-radius: 8px;
                    border: 1px solid #e2e8f0;
                    padding: 25px;
                    margin-bottom: 25px;
                }

                .form-section-title {
                    display: flex;
                    align-items: center;
                    gap: 15px;
                    margin-bottom: 25px;
                    padding-bottom: 15px;
                    border-bottom: 1px solid #e2e8f0;
                }

                .form-section-title .icon-box {
                    width: 40px;
                    height: 40px;
                    border-radius: 50%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    color: white;
                    font-size: 18px;
                }

                .form-section-title h3 {
                    margin: 0;
                    font-size: 16px;
                    font-weight: 700;
                    color: #2b6cb0;
                    text-transform: uppercase;
                    letter-spacing: 0.5px;
                }

                .form-section-title p {
                    margin: 0;
                    font-size: 13px;
                    color: #718096;
                    margin-top: 2px;
                }

                .premium-input {
                    width: 100%;
                    padding: 0 15px;
                    border: 1px solid #e2e8f0;
                    border-radius: 6px;
                    font-size: 14px;
                    background-color: #ffffff;
                    color: #4a5568;
                    height: 45px;
                    line-height: 45px;
                    transition: all 0.2s;
                }

                .premium-input:focus {
                    border-color: #3182ce;
                    box-shadow: 0 0 0 3px rgba(49, 130, 206, 0.1);
                    outline: none;
                }

                .premium-label {
                    display: block;
                    margin-bottom: 8px;
                    font-size: 13px;
                    font-weight: 500;
                    color: #a0aec0;
                }

                .required-asterisk {
                    color: #e53e3e;
                }

                .file-upload-box {
                    border: 1px dashed #cbd5e0;
                    border-radius: 6px;
                    background: #f8fafc;
                    cursor: pointer;
                    transition: all 0.2s;
                }

                .file-upload-box:hover {
                    border-color: #3182ce;
                    background: #ebf8ff;
                }

                .submit-btn {
                    background: #3182ce;
                    color: white;
                    border: none;
                    padding: 12px 35px;
                    border-radius: 6px;
                    font-size: 16px;
                    font-weight: 600;
                    cursor: pointer;
                    transition: all 0.2s;
                }

                .submit-btn:hover {
                    background: #2b6cb0;
                    box-shadow: 0 4px 12px rgba(43, 108, 176, 0.2);
                }
            </style>

            <div class="row justify-content-center">
                <div class="col-lg-11">
                    <form action="#" id="inquiryForm" method="POST">

                        <!-- Basic Details -->
                        <div class="premium-form-container">
                            <div class="form-section-title">
                                <div class="icon-box" style="background: #3182ce;"><i class="fas fa-id-card"></i>
                                </div>
                                <div>
                                    <h3>BASIC DETAILS :</h3>
                                    <p>Student's personal and academic information.</p>
                                </div>
                            </div>
                            <div class="row">
                                <!-- Row 1 -->
                                <div class="col-md-4 mb-4">
                                    <label class="premium-label">Academic year</label>
                                    <select class="premium-input" name="academic_year">
                                        <option value="">Select Academic Year</option>
                                        <option value="2026-27">2026-27</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="premium-label">Select Class</label>
                                    <select class="premium-input" name="class">
                                        <option value="">Select Class</option>
                                        <option value="">Nur</option>
                                        <option value="">Jr.Kg</option>
                                        <option value="">Sr.Kg</option>
                                        <option value="">I</option>
                                        <option value="">II</option>
                                        <option value="">III</option>
                                        <option value="">IV</option>
                                        <option value="">V</option>
                                        <option value="">VI</option>
                                        <option value="">VII</option>
                                        <option value="">VIII</option>
                                        <option value="">IX</option>
                                        <option value="">X</option>
                                        <option value="">XI Com</option>
                                        <option value="">XI Sci</option>
                                        <option value="">XII Com</option>
                                        <option value="">XII Sci</option>

                                        <!-- Add your options here -->
                                    </select>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="file-upload-box d-flex align-items-center p-3 h-100 w-100"
                                        style="margin:0;cursor:pointer;">
                                        <i class="fas fa-user-circle fa-2x me-3"
                                            style="color: #63b3ed; margin-right: 15px;"></i>
                                        <div>
                                            <p style="margin: 0; font-size: 14px; font-weight: 600; color: #2d3748;">
                                                Child Photo <span class="required-asterisk">*</span>
                                            </p>
                                            <p style="margin: 0; font-size: 11px; color: #718096;">Upload Photos at
                                                the maximum size of 5MB.</p>
                                        </div>
                                        <!-- Added name="child_photo" and required -->
                                        <input type="file" name="child_photo" style="display:none;" accept="image/*"
                                            required />
                                    </label>
                                </div>

                                <!-- Row 2 -->
                                <div class="col-md-8 mb-4">
                                    <label class="premium-label">Student Name (As per Aadhar Card)
                                        <span class="required-asterisk">*</span>
                                    </label>
                                    <!-- Added name="student_name" and required -->
                                    <input type="text" name="student_name" class="premium-input" required>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="premium-label">Select Gender <span
                                            class="required-asterisk">*</span></label>
                                    <!-- Added name="gender" and required -->
                                    <select class="premium-input" name="gender" required>
                                        <option value="">Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>

                                <!-- Row 3 -->
                                <div class="col-md-4 mb-4">
                                    <label class="premium-label">Date of Birth
                                        <span class="required-asterisk">*</span>
                                    </label>
                                    <!-- Added name="date_of_birth" and required -->
                                    <input type="date" name="date_of_birth" class="premium-input" required>
                                </div>

                                <div class="col-md-4 mb-4">
                                    <label class="premium-label">Age as on 31st May 2026</label>
                                    <!-- Added name="age_as_on_31st_may_2026" -->
                                    <input type="text" name="age_as_on_31st_may_2026" class="premium-input" disabled>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="premium-label">Primary Mobile No.
                                        <span class="required-asterisk">*</span>
                                    </label>
                                    <!-- Added name="primary_mobile_no" and required -->
                                    <input type="tel" name="primary_mobile_no" class="premium-input" required>
                                </div>

                                <!-- Row 4 -->
                                <div class="col-md-8 mb-4">
                                    <label class="premium-label">Primary Email Id</label>
                                    <!-- Added name="primary_email_id" -->
                                    <input type="email" name="primary_email_id" class="premium-input">
                                </div>

                                <div class="col-md-4 mb-4">
                                    <label class="premium-label">Current Class</label>
                                    <!-- Added name="current_class" -->
                                    <input type="text" name="current_class" class="premium-input">
                                </div>

                                <!-- Row 5 -->
                                <div class="col-md-4 mb-4">
                                    <label class="premium-label">Name of the present school</label>
                                    <input type="text" name="name_of_the_present_school" class="premium-input">
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="premium-label">Board</label>
                                    <input type="text" name="board" class="premium-input">
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="premium-label">Medium</label>
                                    <input type="text" name="medium" class="premium-input">
                                </div>

                                <!-- Row 6 -->
                                <div class="col-md-4">
                                    <label class="premium-label">Area</label>
                                    <input type="text" name="area" class="premium-input">
                                </div>
                            </div>
                        </div>

                        <!-- Parent Details -->
                        <div class="premium-form-container">
                            <div class="form-section-title">
                                <div class="icon-box" style="background: #38a169;">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div>
                                    <h3 style="color: #2f855a;">PARENT DETAILS :</h3>
                                    <p>Information about father, mother, and guardians</p>
                                </div>
                            </div>
                            <div class="row">
                                <!-- Row 1 -->
                                <div class="col-md-8 mb-4">
                                    <label class="premium-label">Select Family Category</label>
                                    <select class="premium-input" name="family_category">
                                        <option value="">Select Family Category</option>
                                        <option value="">Joint Fmaily</option>
                                        <option value="">Nuclear Fmaily</option>
                                    </select>
                                </div>

                                <div class="col-md-4 mb-4">
                                    <label class="premium-label">Total Family Members</label>
                                    <input type="number" name="total_family_members" class="premium-input">
                                </div>

                                <!-- Row 2 -->
                                <div class="col-md-4 mb-4">
                                    <label class="file-upload-box d-flex align-items-center p-3 h-100 w-100"
                                        style="margin:0;cursor:pointer;">
                                        <i class="fas fa-user-tie fa-2x me-3"
                                            style="color: #63b3ed; margin-right: 15px;"></i>
                                        <div>
                                            <p style="margin: 0; font-size: 14px; font-weight: 600; color: #2d3748;">
                                                Father Photo</p>
                                            <p style="margin: 0; font-size: 11px; color: #718096;">Upload Photos at
                                                the maximum size of 5MB.</p>
                                        </div>
                                        <input type="file" name="father_photo" style="display:none;" accept="image/*" />
                                    </label>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="premium-label">Father Name</label>
                                    <input type="text" name="father_name" class="premium-input">
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="premium-label">Select Father Qualification</label>
                                    <select class="premium-input" name="father_qualification">
                                        <option value="">Select Father Qualification</option>
                                        <option value="">10TH</option>
                                        <option value="">12TH</option>
                                        <option value="">Graduate</option>
                                        <option value="">Post Graduate</option>
                                    </select>
                                </div>

                                <!-- Row 3 -->
                                <div class="col-md-4 mb-4">
                                    <label class="premium-label">Select Father Occupation</label>
                                    <select class="premium-input" name="father_occupation">
                                        <option value="">Select Father Occupation</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="file-upload-box d-flex align-items-center p-3 h-100 w-100"
                                        style="margin:0;cursor:pointer;">
                                        <i class="fas fa-female fa-2x me-3" style="color: #63b3ed; margin-right: 15px;"></i>
                                        <div>
                                            <p style="margin: 0; font-size: 14px; font-weight: 600; color: #2d3748;">
                                                Mother Photo</p>
                                            <p style="margin: 0; font-size: 11px; color: #718096;">Upload Photos at
                                                the maximum size of 5MB.</p>
                                        </div>
                                        <input type="file" name="mother_photo" style="display:none;" accept="image/*" />
                                    </label>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="premium-label">Mother Name</label>
                                    <input type="text" name="mother_name" class="premium-input">
                                </div>

                                <!-- Row 4 -->
                                <div class="col-md-4">
                                    <label class="premium-label">Mother Mobile No.</label>
                                    <input type="tel" name="mother_mobile_no" class="premium-input">
                                </div>
                                <div class="col-md-4">
                                    <label class="premium-label">Select Mother Qualification</label>
                                    <select class="premium-input" name="mother_qualification">
                                        <option value="">Select Mother Qualification</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="premium-label">Select Mother Occupation</label>
                                    <select class="premium-input" name="mother_occupation">
                                        <option value="">Select Mother Occupation</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Sibling Details -->
                        <div class="premium-form-container">
                            <div class="form-section-title">
                                <div class="icon-box" style="background: #2b6cb0;"><i class="fas fa-user-friends"></i></div>
                                <div>
                                    <h3>SIBLING DETAILS :</h3>
                                    <p>Details of siblings studying in the same or other schools.</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-4">
                                    <label class="premium-label">Sibling Name</label>
                                    <input type="text" name="sibling_name" class="premium-input">
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="premium-label">Age</label>
                                    <input type="text" name="sibling_age" class="premium-input">
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="premium-label">Class</label>
                                    <input type="text" name="sibling_class" class="premium-input">
                                </div>
                                <div class="col-md-4">
                                    <label class="premium-label">School</label>
                                    <input type="text" name="school" class="premium-input">
                                </div>
                            </div>
                        </div>

                        <!-- Additional Details -->
                        <div class="premium-form-container">
                            <div class="form-section-title">
                                <div class="icon-box" style="background: #d69e2e;"><i class="fas fa-plus-square"></i></div>
                                <div>
                                    <h3 style="color: #b7791f;">ADDITIONAL DETAILS :</h3>
                                    <p>Extra information like address, Source etc.</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-4">
                                    <label class="premium-label">Current Address</label>
                                    <input type="text" name="current_address" class="premium-input">
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="premium-label">Medical History of Child (If Any)</label>
                                    <input type="text" name="medical_history" class="premium-input">
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="premium-label">Select Source of Information</label>
                                    <select class="premium-input" name="source_of_information">
                                        <option value="">Select Source</option>
                                        <option value="Google">Google</option>
                                        <option value="Friends">Friends</option>
                                        <option value="Advertisement">Advertisement</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="text-end mt-2">
                            <button type="submit" class="submit-btn">Submit</button>
                        </div>

                    </form>



                </div>
            </div>
        </div>
    </div>
    <!-- Inquiry Form End -->
    <!-- InstanceEndEditable -->




@endsection