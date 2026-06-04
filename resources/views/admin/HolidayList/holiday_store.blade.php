@extends('admin.common')
@section('title', 'Holiday')
@section('content')

    <div class="px-3 px-md-5 flex-grow-1 container-p-y">
        <div
            class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 row-gap-4">
            <div class="d-flex flex-column justify-content-center">
                <h4 class="mb-1 ps-1">
                    @if ($holiday_data == '')
                        Add New Holiday
                    @else
                        Edit Holiday
                    @endif
                </h4>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card mb-6">
                    <div class="card-body">

                        <form action="{{ route('holiday-store') }}" method="POST">
                            @csrf

                            <input type="hidden" name="id" @if ($holiday_data == '') value="add" @else
                            value="{{ $holiday_data->id }}" @endif>

                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">
                                        Year
                                        <span class="text-danger">*</span>
                                    </label>

                                    <input type="text" name="year"
                                        class="form-control @error('year') is-invalid @enderror"
                                        placeholder="Enter Year"
                                        value="{{ $holiday_data == '' ? old('year') : $holiday_data->year }}">

                                    @error('year')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">
                                        Holiday
                                        <span class="text-danger">*</span>
                                    </label>

                                    <input type="text" name="holiday"
                                        class="form-control @error('holiday') is-invalid @enderror"
                                        placeholder="Enter Holiday Name"
                                        value="{{ $holiday_data == '' ? old('holiday') : $holiday_data->holiday }}">

                                    @error('holiday')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label">
                                        Month
                                        <span class="text-danger">*</span>
                                    </label>

                                    <input type="text" name="month"
                                        class="form-control @error('month') is-invalid @enderror" placeholder="Enter Month"
                                        value="{{ $holiday_data == '' ? old('month') : $holiday_data->month }}">

                                    @error('month')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label">
                                        Day
                                        <span class="text-danger">*</span>
                                    </label>

                                    <input type="text" name="day" class="form-control @error('day') is-invalid @enderror"
                                        placeholder="Enter Day"
                                        value="{{ $holiday_data == '' ? old('day') : $holiday_data->day }}">

                                    @error('day')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label">
                                        Date
                                        <span class="text-danger">*</span>
                                    </label>

                                    <input type="date" name="date" class="form-control @error('date') is-invalid @enderror"
                                        value="{{ $holiday_data == '' ? old('date') : $holiday_data->date }}">

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