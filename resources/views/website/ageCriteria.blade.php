@extends('website.main')
@section('content')

    <!-- Page Banner Start -->
    <div class="section page-banner-section">
        <div class="container">
            <div class="page-banner-wrap">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-banner text-center">
                            <h2 class="title">Age Criteria</h2>
                            <ul class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item">
                                    <a href="{{ url('/') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">
                                   Age Criteria
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Academic Year Start -->
    <div class="section section-padding">
        <div class="container">

            @if(count($ageCriteria) > 0)

                <div class="text-center mb-5">
                    <h2 class="academic-title">
                        Academic Year
                        <span>{{ $ageCriteria->first()->year }}</span>
                    </h2>
                </div>

                <div class="row g-4">

                    @foreach($ageCriteria as $item)
                        <div class="col-lg-4 col-md-6">
                            <div class="academic-card">
                                <h4>{{ $item->standard }}</h4>

                                <p>
                                    {{ \Carbon\Carbon::parse($item->from)->format('d/m/Y') }}
                                    to
                                    {{ \Carbon\Carbon::parse($item->to)->format('d/m/Y') }}
                                </p>
                            </div>
                        </div>
                    @endforeach

                </div>

            @else

                <div class="text-center">
                    <h4>No Age Criteria Available</h4>
                </div>

            @endif

        </div>
    </div>

@endsection

<style>
    .academic-title {
        font-size: 48px;
        font-weight: 500;
        color: #163f8c;
        margin-bottom: 20px;
    }

    .academic-title span {
        color: #f07b57;
        font-weight: 700;
    }

    .academic-card {
        background: #f5f5f5;
        border-radius: 12px;
        padding: 25px;
        transition: all .3s ease;
        height: 100%;
    }

    .academic-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, .08);
    }

    .academic-card h4 {
        font-size: 22px;
        color: #163f8c;
        margin-bottom: 12px;
        font-weight: 600;
    }

    .academic-card p {
        margin: 0;
        color: #8a8a8a;
        font-size: 15px;
    }

    @media(max-width:767px) {
        .academic-title {
            font-size: 32px;
        }

        .academic-card {
            padding: 20px;
        }
    }
</style>