    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">


            @foreach($sliders as $key => $slider)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <img src="{{ ($slider->file) }}" class="d-block w-100" alt="{{ $slider->title }}">
                </div>
            @endforeach

            <!-- <div class="carousel-item">
                    <img src="{{ asset('website/assets/images/slider/slider06.jpg') }}" class="d-block w-100"
                        alt="Divine Child High School, DCHS">
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('website/assets/images/slider/slider07.jpg') }}" class="d-block w-100"
                        alt="Divine Child High School, DCHS">
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('website/assets/images/slider/slider04.jpg') }}" class="d-block w-100"
                        alt="Divine Child High School, DCHS">
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('website/assets/images/slider/slider03.jpg') }}" class="d-block w-100"
                        alt="Divine Child High School, DCHS">
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('website/assets/images/slider/slider02.jpg') }}" class="d-block w-100"
                        alt="Divine Child High School, DCHS">
                </div> -->
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
 
    <div class="section upstudy-about-section-04 section-padding-02">
        <div class="container">
            <div class="about-wrap">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="about-content">
                            <h2 class="title">Who We Are</h2>
                            <p class="text">Divine Child High School, DCHS, aims to provide an exciting all round
                                education as the first in a personally fulfilling and socially useful life. It
                                provides a balanced environment focused on shaping children into leaders of
                                tomorrow. Our school environment promotes order, independence, a love for learning,
                                a connection to the world and a sense of social responsibility.</p>
                            <p class="text">DCHS is located in the heart of the bustling and vibrant city of Surat,
                                one of India’s fastest growing cities. Since 1996, when DCHS was established,
                                perseverance, dedication and hard work have seen the school grow and earn the trust
                                of thousands of parents to entrust their children to the care of the school.</p>
                            <div class="hero-btn aos-init aos-animate pt-4" data-aos="fade-up" data-aos-delay="900">
                                <a class="btn" href="about-us.html">Read More</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="about-img-wrap">
                            <div class="about-img-big">
                                <img src="{{ asset('website/assets/images/about/divine-school.jpg') }}"
                                    alt="Divin Child High School">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    
    <div class="section upstudy-category-section section-padding pt-0">
        <div class="container">
            <div class="category-wrap">
                <div class="row">
                    <div class="section-title text-center">
                        <h2 class="title">School <span>Facilities</span></h2>
                    </div>
                </div>

                <div class="category-content-wrap">
                    <div class="row">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="category-item">
                                <div class="category-icon">
                                    <img src="{{ asset('website/assets/images/icons/spacious-classroom.png') }}"
                                        alt="Spacious Classrooms">
                                </div>
                                <div class="category-content">
                                    <h3 class="title">Spacious Classrooms</h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="category-item color-2">
                                <div class="category-icon">
                                    <img src="{{ asset('website/assets/images/icons/computer-lab.png') }}"
                                        alt="Computer Lab">
                                </div>
                                <div class="category-content">
                                    <h3 class="title">Computer Lab</h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="category-item color-3">
                                <div class="category-icon">
                                    <img src="{{ asset('website/assets/images/icons/cctv-surveillance.png') }}"
                                        alt="CCTV Surveillance">
                                </div>
                                <div class="category-content">
                                    <h3 class="title">CCTV Surveillance</h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="category-item color-4">
                                <div class="category-icon">
                                    <img src="{{ asset('website/assets/images/icons/fire-safety.png') }}" alt="Fire Safety">
                                </div>
                                <div class="category-content">
                                    <h3 class="title">Fire Safety</h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="category-item color-4">
                                <div class="category-icon">
                                    <img src="{{ asset('website/assets/images/icons/extensive-play-ground.png') }}"
                                        alt="Extensive Play Ground">
                                </div>
                                <div class="category-content">
                                    <h3 class="title">Extensive Play Ground</h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="category-item">
                                <div class="category-icon">
                                    <img src="{{ asset('website/assets/images/icons/indoor-games.png') }}"
                                        alt="Indoor Games">
                                </div>
                                <div class="category-content">
                                    <h3 class="title">Indoor Games</h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="category-item color-2">
                                <div class="category-icon">
                                    <img src="{{ asset('website/assets/images/icons/indoor-outdoor.png') }}"
                                        alt="Indoor & Outdoor Play Area">
                                </div>
                                <div class="category-content">
                                    <h3 class="title">Indoor &amp; Outdoor Play Area</h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="category-item color-3">
                                <div class="category-icon">
                                    <img src="{{ asset('website/assets/images/icons/smart-classroom.png') }}"
                                        alt="Smart Classroom">
                                </div>
                                <div class="category-content">
                                    <h3 class="title">Smart Classroom</h3>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <div class="section upstudy-courses-section section-padding">
        <div class="shape-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="894.5px" height="718.5px">
                <path
                    d="M48.156,544.509 C64.534,603.904 12.951,766.86 238.584,698.280 C464.217,630.472 598.785,634.27 657.34,674.214 C757.251,743.356 940.642,708.949 878.541,444.905 C782.683,37.332 185.798,-131.815 64.798,119.817 C-56.201,371.449 31.778,485.114 48.156,544.509 Z" />
            </svg>
        </div>

        <div class="shape-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="890px" height="714px">
                <path
                    d="M843.343,170.989 C826.965,111.595 878.548,-50.587 652.915,17.219 C427.282,85.26 292.714,81.471 234.465,41.284 C134.248,-27.856 -49.142,6.549 12.958,270.593 C108.816,678.166 705.701,847.314 826.701,595.681 C947.701,344.48 859.721,230.384 843.343,170.989 Z" />
            </svg>
        </div>

        <div class="shape-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="1000.5px" height="745.5px">
                <path
                    d="M861.499,135.498 C825.499,85.498 817.499,-84.501 629.499,57.498 C441.499,199.498 297.499,273.498 245.499,225.498 C193.499,177.498 -184.500,227.498 117.499,517.499 C419.499,807.498 967.499,817.498 993.499,539.498 C1019.499,261.499 897.499,185.498 861.499,135.498 Z" />
            </svg>
        </div>

        <div class="container">
            <div class="section-title text-center">
                <h2 class="title">News / Events / Updates</h2>
            </div>
            <div class="courses-wrap">
                <div class="swiper-container courses-active">
                    <div class="swiper-wrapper">
                        @foreach($news as $item)
                            <div class="swiper-slide">
                                <div class="single-course">
                                    <div class="courses-image">
                                        <img src="{{ asset($item->image) }}" alt="">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="section upstudy-features-section section-padding">
        <div class="container">
            <div class="features-wrap">
                <div class="section-title text-center">
                    <h2 class="title">Activities At Divine Child High School</h2>
                </div>
                <div class="features-content-wrap">
                    <div class="row">
                        <div class="col-lg-3 col-sm-6">
                            <div class="features-item text-center">
                                <div class="features-img"><img src="{{ asset('website/assets/images/icons/icon-01.png') }}"
                                        alt=""></div>
                                <div class="features-content">
                                    <h3 class="title">Entertainment Programme</h3>
                                    <p>Fancy Dress Competition</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6">
                            <div class="features-item text-center">
                                <div class="features-img"><img src="{{ asset('website/assets/images/icons/icon-02.png') }}"
                                        alt=""></div>
                                <div class="features-content">
                                    <h3 class="title">Festive Programme</h3>
                                    <p>Holi, Diwali, Eid, Christmas Eve.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6">
                            <div class="features-item text-center">
                                <div class="features-img"><img src="{{ asset('website/assets/images/icons/icon-03.png') }}"
                                        alt=""></div>
                                <div class="features-content">
                                    <h3 class="title">Cultural Programme</h3>
                                    <p>Bharat Natyam Classes and Competition.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6">
                            <div class="features-item text-center">
                                <div class="features-img"><img src="{{ asset('website/assets/images/icons/icon-04.png') }}"
                                        alt=""></div>
                                <div class="features-content">
                                    <h3 class="title">Physical Training</h3>
                                    <p>Karate, Basket Ball, Volley Ball, Gymnastic, Skating, Hockey, Football,
                                        Cricket, Swimming.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="section social-media-section section-padding">
        <div class="container">
            <div class="features-wrap">
                <div class="section-title text-center">
                    <h2 class="title">Stay connected with our social feeds</h2>
                </div>

                <div class="row justify-content-center pt-80">
                    <div class="col-md-4 pb-2">
                        <iframe
                            src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fdivinesurat%2F&tabs=timeline&width=363&height=570&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId"
                            width="363" height="570" style="border:none;overflow:hidden" scrolling="no" frameborder="0"
                            allowfullscreen="true"
                            allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                    </div>

                    <div class="col-md-4 pt-2">
                        <blockquote class="instagram-media" data-instgrm-captioned
                            data-instgrm-permalink="https://www.instagram.com/p/DWnlwDGCFuj/?utm_source=ig_embed&amp;utm_campaign=loading"
                            data-instgrm-version="14"
                            style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:363px; min-width:363px; height: 570px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);">
                            <div style="padding:16px;">
                                <a href="https://www.instagram.com/p/DWnlwDGCFuj/?utm_source=ig_embed&amp;utm_campaign=loading"
                                    style=" background:#FFFFFF; line-height:0; padding:0 0; text-align:center; text-decoration:none; width:100%;"
                                    target="_blank">
                                    <div style=" display: flex; flex-direction: row; align-items: center;">
                                        <div
                                            style="background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 40px; margin-right: 14px; width: 40px;">
                                        </div>
                                        <div
                                            style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center;">
                                            <div
                                                style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 100px;">
                                            </div>
                                            <div
                                                style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 60px;">
                                            </div>
                                        </div>
                                    </div>
                                    <div style="padding: 19% 0;"></div>
                                    <div style="display:block; height:50px; margin:0 auto 12px; width:50px;">
                                        <svg width="50px" height="50px" viewBox="0 0 60 60" version="1.1"
                                            xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <g transform="translate(-511.000000, -20.000000)" fill="#000000">
                                                    <g>
                                                        <path
                                                            d="M556.869,30.41 C554.814,30.41 553.148,32.076 553.148,34.131 C553.148,36.186 554.814,37.852 556.869,37.852 C558.924,37.852 560.59,36.186 560.59,34.131 C560.59,32.076 558.924,30.41 556.869,30.41 M541,60.657 C535.114,60.657 530.342,55.887 530.342,50 C530.342,44.114 535.114,39.342 541,39.342 C546.887,39.342 551.658,44.114 551.658,50 C551.658,55.887 546.887,60.657 541,60.657 M541,33.886 C532.1,33.886 524.886,41.1 524.886,50 C524.886,58.899 532.1,66.113 541,66.113 C549.9,66.113 557.115,58.899 557.115,50 C557.115,41.1 549.9,33.886 541,33.886 M565.378,62.101 C565.244,65.022 564.756,66.606 564.346,67.663 C563.803,69.06 563.154,70.057 562.106,71.106 C561.058,72.155 560.06,72.803 558.662,73.347 C557.607,73.757 556.021,74.244 553.102,74.378 C549.944,74.521 548.997,74.552 541,74.552 C533.003,74.552 532.056,74.521 528.898,74.378 C525.979,74.244 524.393,73.757 523.338,73.347 C521.94,72.803 520.942,72.155 519.894,71.106 C518.846,70.057 518.197,69.06 517.654,67.663 C517.244,66.606 516.755,65.022 516.623,62.101 C516.479,58.943 516.448,57.996 516.448,50 C516.448,42.003 516.479,41.056 516.623,37.899 C516.755,34.978 517.244,33.391 517.654,32.338 C518.197,30.938 518.846,29.942 519.894,28.894 C520.942,27.846 521.94,27.196 523.338,26.654 C524.393,26.244 525.979,25.756 528.898,25.623 C532.057,25.479 533.004,25.448 541,25.448 C548.997,25.448 549.943,25.479 553.102,25.623 C556.021,25.756 557.607,26.244 558.662,26.654 C560.06,27.196 561.058,27.846 562.106,28.894 C563.154,29.942 563.803,30.938 564.346,32.338 C564.756,33.391 565.244,34.978 565.378,37.899 C565.522,41.056 565.552,42.003 565.552,50 C565.552,57.996 565.522,58.943 565.378,62.101 M570.82,37.631 C570.674,34.438 570.167,32.258 569.425,30.349 C568.659,28.377 567.633,26.702 565.965,25.035 C564.297,23.368 562.623,22.342 560.652,21.575 C558.743,20.834 556.562,20.326 553.369,20.18 C550.169,20.033 549.148,20 541,20 C532.853,20 531.831,20.033 528.631,20.18 C525.438,20.326 523.257,20.834 521.349,21.575 C519.376,22.342 517.703,23.368 516.035,25.035 C514.368,26.702 513.342,28.377 512.574,30.349 C511.834,32.258 511.326,34.438 511.181,37.631 C511.035,40.831 511,41.851 511,50 C511,58.147 511.035,59.17 511.181,62.369 C511.326,65.562 511.834,67.743 512.574,69.651 C513.342,71.625 514.368,73.296 516.035,74.965 C517.703,76.634 519.376,77.658 521.349,78.425 C523.257,79.167 525.438,79.673 528.631,79.82 C531.831,79.965 532.853,80.001 541,80.001 C549.148,80.001 550.169,79.965 553.369,79.82 C556.562,79.673 558.743,79.167 560.652,78.425 C562.623,77.658 564.297,76.634 565.965,74.965 C567.633,73.296 568.659,71.625 569.425,69.651 C570.167,67.743 570.674,65.562 570.82,62.369 C570.966,59.17 571,58.147 571,50 C571,41.851 570.966,40.831 570.82,37.631">
                                                        </path>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    </div>
                                    <div style="padding-top: 8px;">
                                        <div
                                            style=" color:#3897f0; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:550; line-height:18px;">
                                            View this post on Instagram</div>
                                    </div>
                                    <div style="padding: 12.5% 0;"></div>
                                    <div
                                        style="display: flex; flex-direction: row; margin-bottom: 14px; align-items: center;">
                                        <div>
                                            <div
                                                style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(0px) translateY(7px);">
                                            </div>
                                            <div
                                                style="background-color: #F4F4F4; height: 12.5px; transform: rotate(-45deg) translateX(3px) translateY(1px); width: 12.5px; flex-grow: 0; margin-right: 14px; margin-left: 2px;">
                                            </div>
                                            <div
                                                style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(9px) translateY(-18px);">
                                            </div>
                                        </div>
                                        <div style="margin-left: 8px;">
                                            <div
                                                style=" background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 20px; width: 20px;">
                                            </div>
                                            <div
                                                style=" width: 0; height: 0; border-top: 2px solid transparent; border-left: 6px solid #f4f4f4; border-bottom: 2px solid transparent; transform: translateX(16px) translateY(-4px) rotate(30deg)">
                                            </div>
                                        </div>
                                        <div style="margin-left: auto;">
                                            <div
                                                style=" width: 0px; border-top: 8px solid #F4F4F4; border-right: 8px solid transparent; transform: translateY(16px);">
                                            </div>
                                            <div
                                                style=" background-color: #F4F4F4; flex-grow: 0; height: 12px; width: 16px; transform: translateY(-4px);">
                                            </div>
                                            <div
                                                style=" width: 0; height: 0; border-top: 8px solid #F4F4F4; border-left: 8px solid transparent; transform: translateY(-4px) translateX(8px);">
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center; margin-bottom: 24px;">
                                        <div
                                            style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 224px;">
                                        </div>
                                        <div
                                            style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 144px;">
                                        </div>
                                    </div>
                                </a>
                                <p
                                    style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;">
                                    <a href="https://www.instagram.com/p/DWnlwDGCFuj/?utm_source=ig_embed&amp;utm_campaign=loading"
                                        style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none;"
                                        target="_blank">A post shared by Divine Child High School
                                        (@divine_child_high_school_surat)</a>
                                </p>
                            </div>
                        </blockquote>
                        <script async src="//www.instagram.com/embed.js"></script>
                    </div>
                </div>
            </div>
        </div>
    </div>