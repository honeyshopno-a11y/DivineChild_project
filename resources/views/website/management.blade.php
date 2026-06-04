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
                            <h2 class="title">Management</h2>
                            <ul class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Management</li>
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
                    @if(count($management_data) > 0)
                        @foreach($management_data as $item)
                        <div class="col-lg-3 col-sm-6">
                            <div class="single-team-02">
                                <div class="team-img">
                                    <a href="#">
                                        @if($item->image != '')
                                            <img src="{{ asset($item->image) }}" alt="{{ $item->name }}" style="width: 100%; height: 300px; object-fit: cover;">
                                        @else
                                            <img src="{{ asset('assets/images/staff/staff.jpg') }}" alt="Staff" style="width: 100%; height: 300px; object-fit: cover;">
                                        @endif
                                    </a>
                                </div>
                                <div class="team-content text-center">
                                    <h3 class="name">{{ $item->name }}</h3>
                                    <p class="designation">{{ $item->post }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <div class="col-12 text-center">
                            <p>No management team members found.</p>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
    <!-- Management End -->
    <!-- InstanceEndEditable -->

@endsection