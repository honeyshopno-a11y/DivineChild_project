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
                            <h2 class="title">Syllabus</h2>
                            <ul class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Syllabus</li>
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
    <!-- Syllabus Content Start -->
    <!-- <div class="syllabus-section">
                                    <h1 style="color:white; ">.</h1>  
                                    <div class="container">
                                        <div class="syllabus-grid">

                                            @if(count($syllabus) > 0)
                                                @foreach($syllabus as $item)

                                                    <a class="syllabus-card has-pdf" href="{{ asset($item->pdf) }}" target="_blank">
                                                        <span class="grade-name"> {{ $item->title }}</span>
                                                        <span class="pdf-icon-btn">
                                                            <i class="fas fa-file-pdf"></i>
                                                        </span>
                                                    </a>
                                                @endforeach
                                            @else
                                                <div class="col-12 text-center">
                                                    <h5>No Syllabus Available</h5>
                                                </div>
                                            @endif





                                        </div>
                                    </div>
                                </div> -->



    <div class="syllabus-section">
        <h1 style="color:white; ">.</h1>
        <div class="container">
            <div class="syllabus-grid">

                @if(count($syllabus) > 0)
                    @foreach($syllabus as $item)

                        @if(!empty($item->pdf))
                            <a class="syllabus-card has-pdf" href="{{ asset($item->pdf) }}" target="_blank">
                                <span class="grade-name">{{ $item->title }}</span>
                                <span class="pdf-icon-btn">
                                    <i class="fas fa-file-pdf"></i>
                                </span>
                            </a>
                        @else
                            <a href="javascript:void(0)" class="syllabus-card no-pdf" onclick="pdfNotAvailable('{{ $item->title }}')">
                                <span class="grade-name">{{ $item->title }}</span>
                                <span class="pdf-icon-btn">
                                    <i class="fas fa-file-pdf"></i>
                                </span>
                            </a>
                        @endif

                    @endforeach
                @else
                    <div class="col-12 text-center">
                        <h5>No Syllabus Available</h5>
                    </div>
                @endif

            </div>
        </div>
    </div>
    <!-- Syllabus Content End -->
    <!-- InstanceEndEditable -->



@endsection

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function pdfNotAvailable(title) {
        Swal.fire({
            icon: 'warning',
            title: 'PDF Not Available',
            text: title + ' Syllabus is not available yet.',
            confirmButtonText: 'OK'
        });
    }
</script>


<style>
    /* ── Syllabus Page Custom Styles ── */

    .syllabus-section {
        padding: 80px 0;
        background: #fff;
    }

    /* 3-column grid */
    .syllabus-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
    }

    @media (max-width: 991px) {
        .syllabus-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 575px) {
        .syllabus-grid {
            grid-template-columns: 1fr;
        }
    }

    /* Each grade card */
    .syllabus-card {
        display: flex;
        align-items: center;
        justify-content: space-between;
        background: #f2f4f7;
        border-radius: 10px;
        padding: 25px 25px;
        text-decoration: none;
        cursor: pointer;
        transition: box-shadow 0.2s, background 0.2s;
        border: 1px solid transparent;
    }

    .syllabus-card:hover {
        background: #eaf0fb;
        border-color: #c5d5ef;
        box-shadow: 0 4px 18px rgba(26, 54, 105, 0.10);
    }

    /* Grade name text */
    .syllabus-card .grade-name {
        font-size: 25px;
        font-weight: 200;
        color: #1a3669;
        text-decoration: none;
    }

    /* Active / uploaded state — orange text like the screenshot */
    .syllabus-card.has-pdf .grade-name {
        color: #1a3669;
    }

    .syllabus-card.no-pdf .grade-name {
        color: #e8551e;
        /* orange = no PDF yet */
    }

    /* PDF icon button */
    .pdf-icon-btn {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        transition: background 0.2s;
    }

    .syllabus-card:hover .pdf-icon-btn {
        background: #ffe8df;
    }

    .pdf-icon-btn i {
        font-size: 16px;
        color: #e8551e;
    }

    /* Grey icon = no PDF linked */
    .syllabus-card.no-pdf .pdf-icon-btn i {
        color: #1a3669;
    }
</style>