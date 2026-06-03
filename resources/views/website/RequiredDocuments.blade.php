@extends('website.main')
@section('content')

    <!-- Page Banner Start -->
    <div class="section page-banner-section">
        <div class="container">
            <div class="page-banner-wrap">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-banner text-center">
                            <h2 class="title">Admission Documents</h2>
                            <ul class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                <li class="breadcrumb-item active">Admission Documents</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Documents Section -->
    <div class="section section-padding">
        <div class="container">

            <div class="text-center mb-5">
                <h2 class="doc-main-title">DOCUMENTS REQUIRED AT THE TIME OF ADMISSION</h2>
            </div>

            @if(count($categories) != 0)
                <!-- Tabs -->
                <div class="doc-tab-row">
                    @foreach($categories as $key => $category)
                        <button class="doc-tab-btn {{ $key == 0 ? 'active' : '' }}"
                            onclick="switchDocTab('{{ $category->id }}', this)">
                            {{ $category->title }}
                        </button>
                    @endforeach
                </div>

                @foreach($categories as $key => $category)
                    <div id="doc-tab-{{ $category->id }}" class="doc-tab-content {{ $key == 0 ? 'active' : '' }}">
                        <div class="doc-list">
                            @foreach($category->documents as $i => $doc)
                                <div class="doc-item">
                                    <div class="doc-num">{{ $i + 1 }}</div>
                                    <div class="doc-text">{{ $doc->document_name }}</div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            @else
                <div class="doc-list">
                    <div class="doc-item">
                        <div class="doc-text">No documents available.</div>
                    </div>
                </div>
            @endif

            <!-- Contact Row -->
            @if($doc_contact)
            <div class="doc-contact-row">
                <div class="doc-contact-card">
                    <div class="doc-contact-icon">
                        <i class="fas fa-phone"></i>
                    </div>
                    <div>
                        <div class="doc-contact-label">Transport</div>
                        <div class="doc-contact-num">{!! nl2br(e($doc_contact->transport)) !!}</div>
                    </div>
                </div>
                <div class="doc-contact-card">
                    <div class="doc-contact-icon">
                        <i class="fas fa-tshirt"></i>
                    </div>
                    <div>
                        <div class="doc-contact-label">Uniform Vendor</div>
                        <div class="doc-contact-num">{!! nl2br(e($doc_contact->uniformvendor)) !!}</div>
                    </div>
                </div>
            </div>
            @endif

        </div>
    </div>

@endsection

<style>
    .doc-main-title {
        font-size: 30px;
        font-weight: 700;
        color: #c0392b;
        letter-spacing: 1px;
        display: inline-block;
    }

    .doc-tab-row {
        display: flex;
        gap: 10px;
        margin-bottom: 24px;
        flex-wrap: wrap;
    }

    .doc-tab-btn {
        padding: 9px 20px;
        border-radius: 6px;
        border: 1.5px solid #225178;
        background: #fff;
        color: #225178;
        font-size: 17px;
        font-weight: 500;
        cursor: pointer;
        transition: all .2s ease;
    }

    .doc-tab-btn.active {
        background: #225178;
        color: #fff;
    }

    .doc-tab-btn:hover:not(.active) {
        background: #e8eef8;
    }

    .doc-tab-content {
        display: none;
    }

    .doc-tab-content.active {
        display: block;
    }

    .doc-list {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .doc-item {
        display: flex;
        align-items: flex-start;
        gap: 14px;
        background: #f4f6fb;
        border-radius: 8px;
        padding: 12px 18px;
        font-size: 17px;
        color: #333;
    }

    .doc-num {
        min-width: 28px;
        height: 28px;
        border-radius: 50%;
        background: #225178;
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 13px;
        font-weight: 600;
        flex-shrink: 0;
    }

    .doc-text {
        line-height: 1.6;
        padding-top: 3px;
    }

    .doc-contact-row {
        display: flex;
        gap: 14px;
        margin-top: 28px;
        flex-wrap: wrap;
    }

    .doc-contact-card {
        flex: 1;
        min-width: 200px;
        background: #f4f6fb;
        border-radius: 10px;
        padding: 16px 20px;
        display: flex;
        align-items: center;
        gap: 14px;
    }

    .doc-contact-icon {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: #225178;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 16px;
        flex-shrink: 0;
    }

    .doc-contact-label {
        font-size: 14px;
        font-weight: 600;
        color: #225178;
    }

    .doc-contact-num {
        font-size: 13px;
        color: #666;
        margin-top: 3px;
    }

    @media (max-width: 576px) {
        .doc-main-title { font-size: 16px; }
        .doc-tab-btn { font-size: 12px; padding: 7px 14px; }
        .doc-item { font-size: 14px; }
    }
</style>

<script>
    function switchDocTab(tab, btn) {
        document.querySelectorAll('.doc-tab-btn').forEach(b => b.classList.remove('active'));
        document.querySelectorAll('.doc-tab-content').forEach(c => c.classList.remove('active'));
        btn.classList.add('active');
        document.getElementById('doc-tab-' + tab).classList.add('active');
    }
</script>
