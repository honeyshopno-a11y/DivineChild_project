@extends('website.main')
@section('content')

    <!-- Page Banner Start -->
    <div class="section page-banner-section">
        <div class="container">
            <div class="page-banner-wrap">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-banner text-center">
                            <h2 class="title">Awards / Achievements</h2>
                            <ul class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                <li class="breadcrumb-item active">Awards / Achievements</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Awards Section -->
    <div class="section upstudy-team-section section-padding">
        <div class="container">

            <div class="team-wrap">
                <div class="row">

                    @forelse($award_data as $award)

                        <div class="col-lg-4 col-sm-6 mb-4">

                            <div class="single-team-02">

                                <div class="team-img">

                                    @if($award->image)
                                        <img src="{{ asset($award->image) }}" alt="{{ $award->title }}"
                                            style="width:100%; height:250px; object-fit:cover;">
                                    @else
                                        <img src="{{ asset('website/assets/images/no-image.png') }}" alt="No Image"
                                            style="width:100%; height:250px; object-fit:cover;">
                                    @endif

                                </div>

                                <div class="team-content text-center">

                                    <h3 class="name">
                                        {{ $award->title ?? 'Untitled Award' }}
                                    </h3>

                                    <p class="designation">
                                        {{ $award->date ? \Carbon\Carbon::parse($award->date)->format('F d, Y') : '' }}
                                    </p>

                                </div>

                            </div>

                        </div>

                    @empty

                        <div class="col-12 text-center">
                            <h5>No Awards Found</h5>
                        </div>

                    @endforelse

                </div>
            </div>

        </div>
    </div>

@endsection