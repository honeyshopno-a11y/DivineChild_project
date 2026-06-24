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

    @php
        $awardJson = [];
        foreach ($award_data as $a) {
            $awardJson[] = [
                'src' => $a->image ? asset($a->image) : asset('website/assets/images/no-image.png'),
                'title' => $a->title ?? 'Untitled Award',
                'date' => $a->date ? \Carbon\Carbon::parse($a->date)->format('F d, Y') : '',
            ];
        }
        $awardJsonEncoded = json_encode(array_values($awardJson));
    @endphp

    <!-- Awards Section -->
    <div class="section upstudy-team-section section-padding">
        <div class="container">
            <div class="team-wrap">
                <div class="row">

                    @forelse($award_data as $index => $award)

                        <div class="col-lg-4 col-sm-6 mb-4">
                            <div class="single-team-02">

                                <div class="team-img award-thumb" data-index="{{ $index }}"
                                    style="cursor: pointer; overflow: hidden; border-radius: 8px;">

                                    @if($award->image)
                                        <img src="{{ asset($award->image) }}" alt="{{ $award->title }}"
                                            style="width:100%; height:250px; object-fit:cover; transition: transform 0.3s ease;"
                                            onmouseover="this.style.transform='scale(1.05)'"
                                            onmouseout="this.style.transform='scale(1)'">
                                    @else
                                        <img src="{{ asset('website/assets/images/no-image.png') }}" alt="No Image"
                                            style="width:100%; height:250px; object-fit:cover; transition: transform 0.3s ease;"
                                            onmouseover="this.style.transform='scale(1.05)'"
                                            onmouseout="this.style.transform='scale(1)'">
                                    @endif

                                </div>

                                <div class="team-content text-center">
                                    <h3 class="name">{{ $award->title ?? 'Untitled Award' }}</h3>
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


    <!-- ===== LIGHTBOX ===== -->
    <div id="awardLightbox"
        style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.88); z-index:9999; align-items:center; justify-content:center;">

        <button onclick="closeLightbox()" title="Close"
            style="position:fixed; top:20px; right:24px; background:rgba(255,255,255,0.15); border:none; color:#fff; width:42px; height:42px; border-radius:50%; font-size:22px; cursor:pointer; display:flex; align-items:center; justify-content:center; z-index:10000;"
            onmouseover="this.style.background='rgba(255,255,255,0.3)'"
            onmouseout="this.style.background='rgba(255,255,255,0.15)'">
            &times;
        </button>

        <button onclick="changeAward(-1)" title="Previous"
            style="position:fixed; left:20px; top:50%; transform:translateY(-50%); background:rgba(255,255,255,0.15); border:none; color:#fff; width:48px; height:48px; border-radius:50%; font-size:26px; cursor:pointer; display:flex; align-items:center; justify-content:center; z-index:10000;"
            onmouseover="this.style.background='rgba(255,255,255,0.3)'"
            onmouseout="this.style.background='rgba(255,255,255,0.15)'">
            &#8249;
        </button>

        <div style="text-align:center; max-width:90vw; max-height:90vh;">
            <img id="lb-award-image" src="" alt=""
                style="max-width:90vw; max-height:75vh; object-fit:contain; border-radius:8px; box-shadow:0 8px 40px rgba(0,0,0,0.5);">
            <p id="lb-award-title" style="color:#fff; font-size:20px; font-weight:500; margin-top:12px;"></p>
            <p id="lb-award-date" style="color:rgba(255,255,255,0.6); font-size:17px; margin:4px 0 0;"></p>
            <p id="lb-award-counter" style="color:rgba(255,255,255,0.4); font-size:12px; margin-top:6px;"></p>
        </div>

        <button onclick="changeAward(1)" title="Next"
            style="position:fixed; right:20px; top:50%; transform:translateY(-50%); background:rgba(255,255,255,0.15); border:none; color:#fff; width:48px; height:48px; border-radius:50%; font-size:26px; cursor:pointer; display:flex; align-items:center; justify-content:center; z-index:10000;"
            onmouseover="this.style.background='rgba(255,255,255,0.3)'"
            onmouseout="this.style.background='rgba(255,255,255,0.15)'">
            &#8250;
        </button>
    </div>
    <!-- ===== END LIGHTBOX ===== -->


    <script>
        const awardImages = {!! $awardJsonEncoded !!};

        let currentAward = 0;

        document.querySelectorAll('.award-thumb').forEach(function (el) {
            el.addEventListener('click', function () {
                currentAward = parseInt(this.getAttribute('data-index'));
                openAwardLightbox();
            });
        });

        function openAwardLightbox() {
            updateAwardImage();
            document.getElementById('awardLightbox').style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }

        function closeLightbox() {
            document.getElementById('awardLightbox').style.display = 'none';
            document.body.style.overflow = '';
        }

        function changeAward(direction) {
            currentAward = (currentAward + direction + awardImages.length) % awardImages.length;
            updateAwardImage();
        }

        function updateAwardImage() {
            const item = awardImages[currentAward];
            document.getElementById('lb-award-image').src = item.src;
            document.getElementById('lb-award-image').alt = item.title;
            document.getElementById('lb-award-title').textContent = item.title;
            document.getElementById('lb-award-date').textContent = item.date;
            document.getElementById('lb-award-counter').textContent = (currentAward + 1) + ' / ' + awardImages.length;
        }

        document.getElementById('awardLightbox').addEventListener('click', function (e) {
            if (e.target === this) closeLightbox();
        });

        document.addEventListener('keydown', function (e) {
            const lb = document.getElementById('awardLightbox');
            if (lb.style.display === 'flex') {
                if (e.key === 'ArrowRight') changeAward(1);
                if (e.key === 'ArrowLeft') changeAward(-1);
                if (e.key === 'Escape') closeLightbox();
            }
        });
    </script>

@endsection