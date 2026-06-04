@extends('admin.common')
@section('title', 'Add & Edit Facilities')
@section('content')

<div class="px-3 px-md-5 flex-grow-1 container-p-y">
    <div
        class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 row-gap-4">
        <div class="d-flex flex-column justify-c ontent-center">
            <h4 class="mb-1 ps-1">
                Facilities
            </h4>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card mb-6">
                <div class="card-body">
                    <form action="{{ route('facilities.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-lg-12 mb-3">
                                <div class="form-group">
                                    <label class="form-label">Facilities <span class="text-danger m-0 p-0" style="font-size:16px;">*</span></label>

                                    <textarea id="editor" name="notes">@if(isset($facilitiesData->description)) {{ $facilitiesData->description ?? '' }} @endif</textarea>

                                    @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-4">SUBMIT</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @session('success')
    <div class="custom-alert" id="custom_alert" role="alert">
        <div>
            ✅ <strong>{{ session('success') }}</strong><br>
        </div>
        <span class="close-btn" onclick="this.parentElement.style.display='none';">&times;</span>
    </div>
    @endsession
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function() {
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    });

    setTimeout(function() {
        const alert = document.getElementById('custom_alert');
        if (alert) {
            alert.style.transition = 'opacity 0.5s ease';
            alert.style.opacity = '0';
            setTimeout(function() {
                alert.style.display = 'none';
            }, 500);
        }
    }, 2000);
</script>

@endsection