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
                            <h2 class="title">Gallery</h2>
                            <ul class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Gallery</li>
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
    <!-- Blog Start -->

    <div class="section upstudy-blog-section section-padding">
        <div class="container">
            <div class="blog-wrap">
                <div class="blog-content-wrap">
                    <div class="row">

                        @foreach($gallery as $i)
                            <div class="col-lg-4 col-sm-6 mb-4">
                                <div class="single-blog text-center">
                                    <div class="blog-img">
                                        <img src="{{ $i->image }}" class="img-fluid w-100" alt="{{ $i->title }}"
                                            style="width:100%; height:300px; object-fit:cover;">
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="section upstudy-blog-section section-padding">
                            <div class="container">
                                <div class="blog-wrap">
                                    <div class="blog-content-wrap">
                                        @foreach($gallery as $key => $i)
                                            <div class="row">


                                                <div class="col-lg-4 col-sm-6">
                                                    <div class="single-blog text-center">
                                                        <div class="blog-img">
                                                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                                                <img src="{{ ($i->image) }}" class="d-block w-100" alt="{{ $i->title }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>



                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div> -->



    <!-- Blog End -->
    <!-- InstanceEndEditable -->




@endsection