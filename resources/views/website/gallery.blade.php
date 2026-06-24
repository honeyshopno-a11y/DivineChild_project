@extends('website.main')
@section('content')

    <!-- Page Banner Start -->
    <div class="section page-banner-section">
        <div class="container">
            <div class="page-banner-wrap">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-banner text-center">
                            <h2 class="title">Gallery</h2>
                            <ul class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Gallery</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Banner End -->

    <!-- Gallery Start -->
    <div class="section upstudy-blog-section section-padding">
        <div class="container">
            <div class="blog-wrap">
                <div class="blog-content-wrap">
                    <div class="row">

                        @foreach($gallery as $index => $i)
                            <div class="col-lg-4 col-sm-6 mb-4">
                                <div class="single-blog text-center">
                                    <div class="blog-img gallery-thumb" data-index="{{ $index }}"
                                        style="cursor: pointer; overflow: hidden; border-radius: 8px;">
                                        <img src="{{ $i->image }}" class="img-fluid w-100" alt="{{ $i->title }}"
                                            style="width:100%; height:300px; object-fit:cover; transition: transform 0.3s ease;"
                                            onmouseover="this.style.transform='scale(1.05)'"
                                            onmouseout="this.style.transform='scale(1)'">
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Gallery End -->


    <!-- ===== LIGHTBOX ===== -->
    <div id="galleryLightbox" style="
                display: none;
                position: fixed;
                inset: 0;
                background: rgba(0,0,0,0.88);
                z-index: 9999;
                align-items: center;
                justify-content: center;
            ">
        <!-- Close Button (top-right) -->
        <button id="lb-close" onclick="closeLightbox()" title="Close" style="
                    position: fixed;
                    top: 20px;
                    right: 24px;
                    background: rgba(255,255,255,0.15);
                    border: none;
                    color: #fff;
                    width: 42px;
                    height: 42px;
                    border-radius: 50%;
                    font-size: 22px;
                    cursor: pointer;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    z-index: 10000;
                    transition: background 0.2s;
                " onmouseover="this.style.background='rgba(255,255,255,0.3)'"
            onmouseout="this.style.background='rgba(255,255,255,0.15)'">
            &times;
        </button>

        <!-- Prev Button -->
        <button onclick="changeImage(-1)" title="Previous" style="
                    position: fixed;
                    left: 20px;
                    top: 50%;
                    transform: translateY(-50%);
                    background: rgba(255,255,255,0.15);
                    border: none;
                    color: #fff;
                    width: 48px;
                    height: 48px;
                    border-radius: 50%;
                    font-size: 26px;
                    cursor: pointer;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    z-index: 10000;
                    transition: background 0.2s;
                " onmouseover="this.style.background='rgba(255,255,255,0.3)'"
            onmouseout="this.style.background='rgba(255,255,255,0.15)'">
            &#8249;
        </button>

        <!-- Image -->
        <div style="text-align: center; max-width: 90vw; max-height: 90vh;">
            <img id="lb-image" src="" alt="" style="
                            max-width: 90vw;
                            max-height: 80vh;
                            object-fit: contain;
                            border-radius: 8px;
                            box-shadow: 0 8px 40px rgba(0,0,0,0.5);
                         ">
            <p id="lb-counter" style="color: rgba(255,255,255,0.6); margin-top: 12px; font-size: 14px;"></p>
        </div>

        <!-- Next Button -->
        <button onclick="changeImage(1)" title="Next" style="
                    position: fixed;
                    right: 20px;
                    top: 50%;
                    transform: translateY(-50%);
                    background: rgba(255,255,255,0.15);
                    border: none;
                    color: #fff;
                    width: 48px;
                    height: 48px;
                    border-radius: 50%;
                    font-size: 26px;
                    cursor: pointer;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    z-index: 10000;
                    transition: background 0.2s;
                " onmouseover="this.style.background='rgba(255,255,255,0.3)'"
            onmouseout="this.style.background='rgba(255,255,255,0.15)'">
            &#8250;
        </button>
    </div>
    <!-- ===== END LIGHTBOX ===== -->


    <!-- Lightbox JS -->
    <script>
        // PHP se saari images ka array JS me pass karo
        const galleryImages = @json($gallery->map(fn($i) => ['src' => $i->image, 'title' => $i->title])->values());

        let currentIndex = 0;

        // Har thumbnail pe click listener lagao
        document.querySelectorAll('.gallery-thumb').forEach(function (el) {
            el.addEventListener('click', function () {
                currentIndex = parseInt(this.getAttribute('data-index'));
                openLightbox(currentIndex);
            });
        });

        function openLightbox(index) {
            currentIndex = index;
            updateLightboxImage();
            const lb = document.getElementById('galleryLightbox');
            lb.style.display = 'flex';
            document.body.style.overflow = 'hidden'; // scroll band karo
        }

        function closeLightbox() {
            document.getElementById('galleryLightbox').style.display = 'none';
            document.body.style.overflow = '';
        }

        function changeImage(direction) {
            currentIndex = (currentIndex + direction + galleryImages.length) % galleryImages.length;
            updateLightboxImage();
        }

        function updateLightboxImage() {
            const img = galleryImages[currentIndex];
            document.getElementById('lb-image').src = img.src;
            document.getElementById('lb-image').alt = img.title;
            document.getElementById('lb-counter').textContent = (currentIndex + 1) + ' / ' + galleryImages.length;
        }

        // Background click se bhi band ho
        document.getElementById('galleryLightbox').addEventListener('click', function (e) {
            if (e.target === this) closeLightbox();
        });

        // Keyboard support: Arrow keys + Escape
        document.addEventListener('keydown', function (e) {
            const lb = document.getElementById('galleryLightbox');
            if (lb.style.display === 'flex') {
                if (e.key === 'ArrowRight') changeImage(1);
                if (e.key === 'ArrowLeft') changeImage(-1);
                if (e.key === 'Escape') closeLightbox();
            }
        });
    </script>

@endsection