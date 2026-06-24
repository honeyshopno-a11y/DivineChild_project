@extends('admin.common')
@section('title', 'Home Slider')

@section('content')

    <style>
        .upload-box {
            border: 2px dashed #d9d9d9;
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            background: #fafafa;
            transition: 0.3s;
        }

        .upload-box:hover {
            border-color: #696cff;
            background: #f5f5ff;
        }

        .store_img_view {
            width: 180px;
            height: 180px;
            object-fit: cover;
            border-radius: 12px;
            border: 1px solid #ddd;
            cursor: pointer;
            background: #fff;
            padding: 5px;
        }

        .video_preview {
            width: 220px;
            height: 180px;
            border-radius: 12px;
            border: 1px solid #ddd;
            background: #fff;
            padding: 5px;
        }

        .form-label {
            font-weight: 600;
            margin-bottom: 8px;
        }

        .required-star {
            color: red;
            font-size: 16px;
        }

        .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
        }

        .btn-primary {
            padding: 10px 30px;
            border-radius: 8px;
            font-weight: 600;
        }

        .preview-title {
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 10px;
            color: #666;
        }

        select.form-select,
        input.form-control {
            height: 45px;
            border-radius: 8px;
        }
    </style>

    <div class="px-3 px-md-5 flex-grow-1 container-p-y">

        <div
            class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 row-gap-4">

            <div class="d-flex flex-column justify-content-center">
                <h4 class="mb-1 ps-1">

                    @if ($slider_data == '')
                        Add New Home Slider
                    @else
                        Edit Home Slider
                    @endif

                </h4>
            </div>

        </div>

        <div class="row">

            <div class="col-12">

                <div class="card">

                    <div class="card-body p-4">

                        <form action="{{ route('slider-store') }}" method="POST" enctype="multipart/form-data">

                            @csrf

                            <input type="hidden" name="id" value="{{ $slider_data == '' ? 'add' : $slider_data->id }}">

                            <div class="row">

                                {{-- Type --}}
                                <div class="col-lg-6 mb-4">

                                    <label class="form-label">
                                        Type
                                        <span class="required-star">*</span>
                                    </label>

                                    <select name="type" class="form-select">

                                        <option value="">Select Type</option>

                                        <option value="image" {{ ($slider_data != '' && $slider_data->type == 'image') ? 'selected' : '' }}>
                                            Image
                                        </option>

                                        <option value="video" {{ ($slider_data != '' && $slider_data->type == 'video') ? 'selected' : '' }}>
                                            Video
                                        </option>

                                    </select>

                                    @error('type')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror

                                </div>

                                {{-- File Upload --}}
                                <div class="col-lg-6 mb-4">

                                    <label class="form-label">
                                        Upload File
                                        <span class="required-star">*</span>
                                    </label>

                                    <input type="file" name="file" class="form-control @error('file') is-invalid @enderror"
                                        id="fileInput" accept="image/*,video/*">

                                    @error('file')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror

                                </div>

                                {{-- Preview --}}
                                <div class=" col-md-6 mt-3">

                                    <div class="upload-box">

                                        <div class="preview-title">
                                            Preview
                                        </div>

                                        {{-- Existing Preview --}}
                                        <div id="previewContainer">

                                            @if($slider_data != '' && $slider_data->file)

                                                @if($slider_data->type == 'image')

                                                    <img src="{{ asset($slider_data->file) }}" id="imagePreview"
                                                        class="store_img_view">

                                                @else

                                                    <video controls id="videoPreview" class="video_preview">

                                                        <source src="{{ asset($slider_data->file) }}">

                                                    </video>

                                                @endif

                                            @else

                                                <img src="{{ asset('image/plus.png') }}" id="imagePreview"
                                                    class="store_img_view">

                                            @endif

                                        </div>

                                    </div>

                                </div>

                                {{-- Submit --}}
                                <div class="col-12 mt-4">

                                    <button type="submit" class="btn btn-primary">

                                        @if ($slider_data == '')
                                            SAVE
                                        @else
                                            UPDATE
                                        @endif

                                    </button>

                                </div>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <script>

        document.getElementById('fileInput').addEventListener('change', function (e) {

            const file = e.target.files[0];

            if (!file) return;

            const previewContainer = document.getElementById('previewContainer');

            previewContainer.innerHTML = '';

            const fileType = file.type;

            const fileURL = URL.createObjectURL(file);

            // Image Preview
            if (fileType.startsWith('image/')) {

                previewContainer.innerHTML = `
                            <img src="${fileURL}"
                                 class="store_img_view">
                        `;

            }

            // Video Preview
            else if (fileType.startsWith('video/')) {

                previewContainer.innerHTML = `
                            <video controls class="video_preview">
                                <source src="${fileURL}">
                            </video>
                        `;

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