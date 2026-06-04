@extends('admin.common')
@section('title', $preBoardDatesData ? 'Edit Pre-Board Dates' : 'Add Pre-Board Dates')
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
            <div class="d-flex flex-column justify-c ontent-center">
                <h4 class="mb-1 ps-1">
                    @if ($preBoardDatesData == '')
                        Add
                    @else
                        Edit
                    @endif Pre-Board Dates
                </h4>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card mb-6">
                    <div class="card-body">
                        <form action="{{ route('pre.board.dates.store') }}" class="form" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ isset($preBoardDatesData) ? $preBoardDatesData->id : 'add' }}">
                            <div class="row">
                                <div class="col-12 col-lg-12 mb-3">
                                    <div class="form-group">
                                        <label class="form-label"> Title <span class="text-danger m-0 p-0"
                                                style="font-size:16px;"> *</span></label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                                            placeholder="ex. Periodic Test-1" name="title"
                                            value="{{ isset($preBoardDatesData) ? $preBoardDatesData->title : old('title') }}">
                                        @error('title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-lg-6 mb-3">
                                    <div class="form-group">
                                        <label class="form-label"> From Date <span class="text-danger m-0 p-0"
                                                style="font-size:16px;"> *</span></label>
                                        <input type="date"
                                            class="form-control @error('from_date') is-invalid @enderror"
                                            placeholder="ex. Start good habits" name="from_date"
                                            value="{{ isset($preBoardDatesData) ? $preBoardDatesData->from_date : old('from_date') }}">
                                        @error('from_date')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 mb-3">
                                    <div class="form-group">
                                        <label class="form-label"> To Date <span class="text-danger m-0 p-0"
                                                style="font-size:16px;"> *</span></label>
                                        <input type="date"
                                            class="form-control @error('to_date') is-invalid @enderror"
                                            placeholder="ex. Start good habits" name="to_date"
                                            value="{{ isset($preBoardDatesData) ? $preBoardDatesData->to_date : old('to_date') }}">
                                        @error('to_date')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit"
                                class="btn btn-primary mt-4">{{ isset($preBoardDatesData) ? 'UPDATE' : 'SUBMIT' }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
