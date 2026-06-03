@extends('admin.common')
@section('content')

    <div class="px-3 px-md-5 flex-grow-1 container-p-y">
        <div
            class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 row-gap-4">
            <div class="d-flex flex-column justify-content-center">
                <h4 class="mb-1 ps-1">
                    @if ($ageCriteria_data == '')
                        Add New Age Criteria
                    @else
                        Edit Age Criteria
                    @endif
                </h4>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card mb-6">
                    <div class="card-body">

                        <form class="form" action="{{ route('ageCriteria-store') }}" method="POST">
                            @csrf

                            <input type="hidden" name="id" @if ($ageCriteria_data == '') value="add" @else
                            value="{{ $ageCriteria_data->id }}" @endif>

                            <div class="row">

                                <div class="col-12 col-lg-6 mb-3">
                                    <div class="form-group">
                                        <label class="form-label">
                                            Year
                                            <span class="text-danger">*</span>
                                        </label>

                                        <input type="text" class="form-control @error('year') is-invalid @enderror"
                                            name="year" placeholder="Enter Year" @if ($ageCriteria_data == '')
                                            value="{{ old('year') }}" @else value="{{ $ageCriteria_data->year }}" @endif>

                                        @error('year')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12 col-lg-6 mb-3">
                                    <div class="form-group">
                                        <label class="form-label">
                                            Standard
                                            <span class="text-danger">*</span>
                                        </label>

                                        <input type="text" class="form-control @error('standard') is-invalid @enderror"
                                            name="standard" placeholder="Enter Standard" @if ($ageCriteria_data == '')
                                            value="{{ old('standard') }}" @else value="{{ $ageCriteria_data->standard }}"
                                            @endif>

                                        @error('standard')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12 col-lg-6 mb-3">
                                    <div class="form-group">
                                        <label class="form-label">
                                            From Date
                                            <span class="text-danger">*</span>
                                        </label>

                                        <input type="date" class="form-control @error('from') is-invalid @enderror"
                                            name="from" @if ($ageCriteria_data == '') value="{{ old('from') }}" @else
                                            value="{{ $ageCriteria_data->from }}" @endif>

                                        @error('from')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12 col-lg-6 mb-3">
                                    <div class="form-group">
                                        <label class="form-label">
                                            To Date
                                            <span class="text-danger">*</span>
                                        </label>

                                        <input type="date" class="form-control @error('to') is-invalid @enderror" name="to"
                                            @if ($ageCriteria_data == '') value="{{ old('to') }}" @else
                                            value="{{ $ageCriteria_data->to }}" @endif>

                                        @error('to')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
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

@endsection