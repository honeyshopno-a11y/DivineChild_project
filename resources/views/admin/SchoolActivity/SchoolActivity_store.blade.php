@extends('admin.common')
@section('title', 'School Activities')

@section('content')

    <div class="px-3 px-md-5 flex-grow-1 container-p-y">

        <div
            class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 row-gap-4">

            <div class="d-flex flex-column justify-content-center">
                <h4 class="mb-1 ps-1">
                    @if ($school_activity_data == '')
                        Add New School Activity
                    @else
                        Edit School Activity
                    @endif
                </h4>
            </div>

        </div>

        <div class="row">
            <div class="col-12 col-lg-12">

                <div class="card mb-6">
                    <div class="card-body">

                        <form action="{{ route('school-activity-store') }}" method="POST">
                            @csrf

                            <input type="hidden" name="id" @if ($school_activity_data == '') value="add" @else
                            value="{{ $school_activity_data->id }}" @endif>

                            <div class="row">

                                <div class="col-lg-6 mb-3">
                                    <div class="form-group">

                                        <label class="form-label">
                                            Activity Name
                                            <span class="text-danger">*</span>
                                        </label>

                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            placeholder="Enter Activity Name" @if ($school_activity_data == '')
                                            value="{{ old('name') }}" @else value="{{ $school_activity_data->name }}"
                                            @endif>

                                        @error('name')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                    </div>
                                </div>

                            </div>

                            <button type="submit" class="btn btn-primary mt-3">
                                SUBMIT
                            </button>

                        </form>

                    </div>
                </div>

            </div>
        </div>

    </div>

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