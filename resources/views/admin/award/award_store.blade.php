@extends('admin.common')
@section('title', 'Award')
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
                    @if ($award_data == '')
                        Add a New Award
                    @else
                        Edit Award
                    @endif
                </h4>
            </div>

        </div>

        <div class="row">
            <div class="col-12 col-lg-12">

                <div class="card mb-6">

                    <div class="card-body">

                        <form class="form" action="{{ route('award-store') }}" method="POST" enctype="multipart/form-data">

                            @csrf

                            <input type="hidden" name="id" value="{{ $award_data == '' ? 'add' : $award_data->id }}">

                            <div class="row">



                                <!-- TITLE -->
                                <div class="col-12 col-lg-6 mb-3">

                                    <label class="form-label">
                                        Title
                                        <span class="text-danger">*</span>
                                    </label>

                                    <input type="text" name="title"
                                        class="form-control @error('title') is-invalid @enderror"
                                        placeholder="Enter Award Title"
                                        value="{{ $award_data == '' ? old('title') : $award_data->title }}">

                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>

                                <!-- DATE -->
                                <div class="col-12 col-lg-6 mb-3">

                                    <label class="form-label">
                                        Date
                                        <span class="text-danger">*</span>
                                    </label>

                                    <input type="date" name="date" class="form-control @error('date') is-invalid @enderror"
                                        value="{{ $award_data == '' ? old('date') : $award_data->date }}">

                                    @error('date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>

                                <!-- IMAGE -->
                                <div class="col-12 col-lg-6 mb-3">

                                    <label class="form-label">
                                        Image
                                        <span class="text-danger">*</span>
                                    </label>

                                    <div class="mt-0 pt-0">

                                        @if($award_data != '' && $award_data->image != '')
                                            <img src="{{ asset($award_data->image) }}" id="image_select"
                                                class="rounded store_img_view" onclick="triggerFileInput('image')" />
                                        @else
                                            <img src="{{ asset('image/plus.png') }}" id="image_select"
                                                class="rounded store_img_view" onclick="triggerFileInput('image')" />
                                        @endif

                                        <input type="file" class="form-control d-none" id="image" name="image"
                                            accept="image/*">

                                    </div>

                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

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
        function triggerFileInput(id) {
            document.getElementById(id).click();
        }

        function previewImage(inputId, imageId) {
            const input = document.getElementById(inputId);

            input.addEventListener('change', function () {
                const file = this.files[0];

                if (file) {
                    const reader = new FileReader();

                    reader.onload = function (e) {
                        document.getElementById(imageId).src = e.target.result;
                    }

                    reader.readAsDataURL(file);
                }
            });
        }

        document.addEventListener("DOMContentLoaded", function () {
            previewImage('image', 'image_select');
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