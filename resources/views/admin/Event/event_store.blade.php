@extends('admin.common')
@section('title', 'Event')
@section('content')

    <div class="px-3 px-md-5 flex-grow-1 container-p-y">

        <div
            class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 row-gap-4">
            <div class="d-flex flex-column justify-content-center">
                <h4 class="mb-1 ps-1">
                    @if ($event_data == '')
                        Add New Event
                    @else
                        Edit Event
                    @endif
                </h4>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-12">

                <div class="card mb-6">
                    <div class="card-body">

                        <form action="{{ route('event-store') }}" method="POST">
                            @csrf

                            <input type="hidden" name="id" @if ($event_data == '') value="add" @else
                            value="{{ $event_data->id }}" @endif>

                            <div class="row">

                                <!-- Event -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">
                                        Event
                                        <span class="text-danger">*</span>
                                    </label>

                                    <input type="text" name="event"
                                        class="form-control @error('event') is-invalid @enderror"
                                        placeholder="Enter Event Name"
                                        value="{{ $event_data == '' ? old('event') : $event_data->event }}">

                                    @error('event')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Month -->
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">
                                        Month
                                        <span class="text-danger">*</span>
                                    </label>

                                    <input type="text" name="month"
                                        class="form-control @error('month') is-invalid @enderror" placeholder="Enter Month"
                                        value="{{ $event_data == '' ? old('month') : $event_data->month }}">

                                    @error('month')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Date -->
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">
                                        Date
                                        <span class="text-danger">*</span>
                                    </label>

                                    <input type="date" name="date" class="form-control @error('date') is-invalid @enderror"
                                        value="{{ $event_data == '' ? old('date') : $event_data->date }}">

                                    @error('date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
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