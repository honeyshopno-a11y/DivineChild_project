@extends('admin.common')
@section('title', 'Public Disclosure')

@section('content')

    <style>
        .store_img_view {
            width: 130px !important;
            height: 130px !important;
            object-fit: cover !important;
            border: 1px solid lightgray !important;
            background-color: white !important;
        }
    </style>

    <div class="px-3 px-md-5 flex-grow-1 container-p-y">

        <div
            class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 row-gap-4">
            <div class="d-flex flex-column justify-content-center">
                <h4 class="mb-1 ps-1">
                    @if ($disclosure_data == '')
                        Add a New
                    @else
                        Edit
                    @endif
                    Public Disclosure
                </h4>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card mb-6">
                    <div class="card-body">
                        <form class="form" action="{{ route('public-disclosure-store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" @if ($disclosure_data == '') value="add" @else
                            value="{{ $disclosure_data->id }}" @endif>
                            <div class="row">
                                {{-- Title Dropdown --}}
                                <div class="col-12 col-lg-6 mb-3">
                                    <div class="form-group">
                                        <label class="form-label">
                                            Select Title
                                            <span class="text-danger">*</span>
                                        </label>
                                        <select name="title_id" class="form-control">
                                            <option value="">
                                                Select Title
                                            </option>

                                            @foreach($title_data as $item)
                                                <option value="{{ $item->id }}" @if(
                                                    $disclosure_data != '' &&
                                                    $disclosure_data->title_id == $item->id
                                                ) selected @endif>
                                                    {{ $item->title }}
                                                </option>
                                            @endforeach

                                        </select>

                                        @error('title_id')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                    </div>

                                </div>

                                {{-- Description --}}
                                <div class="col-12 col-lg-12 mb-3">
                                    <div class="form-group">
                                        <label class="form-label">
                                            Description
                                            <span class="text-danger">*</span>
                                        </label>

                                        <textarea name="description" rows="5"
                                            class="form-control @error('description') is-invalid @enderror"
                                            placeholder="Enter Description">{{ $disclosure_data->description ?? old('description') }}</textarea>

                                        @error('description')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                    </div>

                                </div>

                                {{-- PDF Upload --}}
                                <!-- <div class="col-12 col-lg-6 mb-3">

                                                <div class="form-group">

                                                    <label class="form-label">

                                                        Upload PDF

                                                        <span class="text-danger">*</span>

                                                    </label>

                                                    <input type="file" name="pdf" id="pdfInput"
                                                        class="form-control @error('pdf') is-invalid @enderror"
                                                        accept="application/pdf">

                                                    @error('pdf')
                                                        <span class="text-danger">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror

                                                    @if($disclosure_data != '' && $disclosure_data->pdf)

                                                        <div class="mt-3">

                                                            <p class="mb-2 text-primary fw-bold">

                                                                {{ basename($disclosure_data->pdf) }}

                                                            </p>

                                                            <a href="{{ asset($disclosure_data->pdf) }}" target="_blank"
                                                                class="btn btn-primary btn-sm">
                                                                View PDF
                                                            </a>

                                                        </div>

                                                    @endif

                                                    <div class="mt-3">

                                                        <p id="selected_pdf_name" class="mb-2 text-success fw-bold">
                                                        </p>


                                                        <a href="" target="_blank" id="view_pdf_btn"
                                                            class="btn btn-success btn-sm d-none">
                                                            View Selected PDF
                                                        </a>

                                                    </div>

                                                </div>

                                            </div> -->

                                {{-- PDF Upload --}}
                                <div class="col-12 col-lg-6 mb-3">

                                    <div class="form-group">

                                        <label class="form-label">

                                            Upload PDF

                                            <span class="text-danger">*</span>

                                        </label>

                                        {{-- Single PDF Input --}}
                                        <input type="file" name="pdf" id="pdfInput"
                                            class="form-control @error('pdf') is-invalid @enderror"
                                            accept="application/pdf">

                                        @error('pdf')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                        {{-- PDF Preview Section --}}
                                        <div class="mt-3">

                                            {{-- Existing PDF Name --}}
                                            <p id="selected_pdf_name" class="mb-2 fw-bold text-primary">

                                                @if($disclosure_data != '' && $disclosure_data->pdf)

                                                    <!-- {{ basename($disclosure_data->pdf) }} -->
                                                    {{ $disclosure_data->pdf_name }}

                                                @endif

                                            </p>

                                            {{-- View PDF Button --}}
                                            <a href="@if($disclosure_data != '' && $disclosure_data->pdf){{ asset($disclosure_data->pdf) }}@endif"
                                                target="_blank" id="view_pdf_btn" class="btn btn-primary btn-sm
                                                        @if($disclosure_data == '' || !$disclosure_data->pdf)
                                                            d-none
                                                        @endif">

                                                View PDF

                                            </a>

                                        </div>

                                    </div>

                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary mt-4">
                                SUBMIT
                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <script>

        document.getElementById('pdfInput').addEventListener('change', function (e) {

            const file = e.target.files[0];

            if (file) {

                // Show selected PDF name
                document.getElementById('selected_pdf_name').innerText = file.name;

                // Create temporary URL
                const pdfURL = URL.createObjectURL(file);

                // Update same button
                const viewBtn = document.getElementById('view_pdf_btn');

                viewBtn.href = pdfURL;

                // Show button
                viewBtn.classList.remove('d-none');

                // Change button color to blue
                viewBtn.classList.remove('btn-success');

                viewBtn.classList.add('btn-primary');
            }

        });

    </script>
    <script>
        setTimeout(function () {
            const alert = document.getElementById('custom_alert');
            if (alert) {
                alert.style.transition = 'opacity 0.5s ease';
                alert.style.opacity = '0';
                setTimeout(function () {
                    alert.style.display = 'none';
                }, 500);
            }
        }, 2000);
    </script>
@endsection