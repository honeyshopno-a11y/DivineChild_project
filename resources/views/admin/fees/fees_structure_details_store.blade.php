@extends('admin.common')

@section('content')

@php
    $categories = \App\Models\FeeStructure::get();

    $details = [];

    if($fee_structure_details != '' && !empty($fee_structure_details->fee_details)){
        $details = is_array($fee_structure_details->fee_details)
            ? $fee_structure_details->fee_details
            : json_decode($fee_structure_details->fee_details, true);
    }
@endphp

<div class="px-3 px-md-5 flex-grow-1 container-p-y">

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 row-gap-4">
        <div>
            <h4 class="mb-1 ps-1">
                @if ($fee_structure_details == '')
                    Add Fees Structure Details
                @else
                    Edit Fees Structure Details
                @endif
            </h4>
        </div>
    </div>

    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-body">

                    <form action="{{ route('fees-structure-details-store') }}" method="POST">
                        @csrf

                        <input type="hidden"
                            name="id"
                            value="{{ $fee_structure_details == '' ? 'add' : $fee_structure_details->id }}">

                        <div class="row">

                            <div class="col-md-12 mb-4">
                                <label class="form-label">
                                    Title <span class="text-danger">*</span>
                                </label>

                                <textarea type="text"
                                    name="title"
                                    class="form-control"
                                    value=""
                                    placeholder="Enter Title" required>{{ $fee_structure_details->title ?? '' }}</textarea>
                            </div>

                        </div>

                        <hr>

                        <div class="row">

                            @foreach($categories as $category)

                                <div class="col-md-3 mb-4">

                                    <label class="form-label">
                                        {{ $category->title }}
                                    </label>

                                    <input type="number"
                                        step="0.01"
                                        class="form-control"
                                        name="category_name[{{ $category->title }}]"
                                        value="{{ $details[$category->title] ?? '' }}"
                                        placeholder="Enter Amount" required>

                                </div>

                            @endforeach

                        </div>

                        <button type="submit" class="btn btn-primary">
                            SUBMIT
                        </button>

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>

@endsection