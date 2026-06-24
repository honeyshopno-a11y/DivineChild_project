@extends('website.main')
@section('content')

    <style>
        .transfer-certificate-img {
            width: 100%;
            height: 500px;
            object-fit: contain;
        }
    </style>

    <div class="section page-banner-section">
        <div class="container">
            <div class="page-banner-wrap">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-banner text-center">
                            <h2 class="title">Transfer Certificates</h2>
                            <ul class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item">
                                    <a href="{{ url('/') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    Transfer Certificates
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section upstudy-category-section-02 section-padding-02">
        <div class="container">
            <div class="row">

                @forelse($transfer_certificate as $item)

                    <div class="col-md-4 pt-3">
                        <img src="{{ asset($item->image) }}" class="img-thumbnail transfer-certificate-img w-100"
                            alt="Transfer Certificate">
                    </div>

                @empty

                    <div class="col-12 text-center">
                        <h5>No Transfer Certificates Found</h5>
                    </div>

                @endforelse

            </div>
        </div>
    </div>

@endsection