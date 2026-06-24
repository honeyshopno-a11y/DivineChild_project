@extends('admin.common')
@section('title', $primaryToSecondaryExamScheduleData ? 'Edit Primary to Secondary Exam Schedule' : 'Add New Primary to Secondary Exam Schedule')
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
                    @if ($primaryToSecondaryExamScheduleData == '')
                        Add a New
                    @else
                        Edit
                    @endif Primary to Secondary Exam Schedule
                </h4>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card mb-6">
                    <div class="card-body">
                        <form action="{{ route('primary.to.secondary.exam.schedule.store') }}" class="form" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id"
                                value="{{ isset($primaryToSecondaryExamScheduleData) ? $primaryToSecondaryExamScheduleData->id : 'add' }}">
                            <div class="row">
                                <div class="col-12 col-lg-12 mb-3">
                                    <div class="form-group">
                                        <label class="form-label"> Exam Name <span class="text-danger m-0 p-0"
                                                style="font-size:16px;"> *</span></label>
                                        <input type="text" class="form-control @error('exam_name') is-invalid @enderror"
                                            placeholder="ex. Periodic Test-1" name="exam_name"
                                            value="{{ isset($primaryToSecondaryExamScheduleData) ? $primaryToSecondaryExamScheduleData->exam_name : old('exam_name') }}">

                                        @error('exam_name')
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
                                            class="form-control @error('exam_from_date') is-invalid @enderror"
                                            placeholder="ex. Start good habits" name="exam_from_date"
                                            value="{{ isset($primaryToSecondaryExamScheduleData) ? $primaryToSecondaryExamScheduleData->exam_from_date : old('exam_from_date') }}">
                                        @error('exam_from_date')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 mb-3">
                                    <div class="form-group">
                                        <label class="form-label"> To Date <span class="text-danger m-0 p-0"
                                                style="font-size:16px;"> *</span></label>
                                        <input type="date" class="form-control @error('exam_to_date') is-invalid @enderror"
                                            placeholder="ex. Start good habits" name="exam_to_date"
                                            value="{{ isset($primaryToSecondaryExamScheduleData) ? $primaryToSecondaryExamScheduleData->exam_to_date : old('exam_to_date') }}">
                                        @error('exam_to_date')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-lg-12 mb-3">
                                    <div class="form-group">
                                        <label class="form-label"> PTM Date</label>
                                        <input type="date" class="form-control @error('ptm_date') is-invalid @enderror"
                                            placeholder="ex. Start good habits" name="ptm_date"
                                            value="{{ isset($primaryToSecondaryExamScheduleData) ? $primaryToSecondaryExamScheduleData->ptm_date : old('ptm_date') }}">
                                    </div>
                                </div>
                            </div>
                            <button type="submit"
                                class="btn btn-primary mt-4">{{ isset($primaryToSecondaryExamScheduleData) ? 'UPDATE' : 'SUBMIT' }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection