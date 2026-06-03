@extends('admin.common')
@section('content')

    <div class="px-3 px-md-5 flex-grow-1 container-p-y">

        <h4 class="mb-4">
            @if ($doc_contact_data != '')
                Edit
            @else
                Add
            @endif
            Document Contact Details
        </h4>

        <form class="form" action="{{ route('doc-contact-store') }}" method="POST">
            @csrf

            <input type="hidden" name="id" value="{{ $doc_contact_data->id ?? '' }}">

            <div class="card p-4">

                <h5 class="m-0 p-0">Document Contact Details :</h5>
                <hr style="border-bottom: 1px solid lightgray;">

                <div class="row mt-2">

                    <!-- Transport -->
                    <div class="col-12 mb-3">
                        <label class="form-label">Transport</label>

                        <textarea name="transport" id="transport"
                            class="form-control @error('transport') is-invalid @enderror" rows="1"
                            placeholder="Enter Transport Contact">{!! optional($doc_contact_data)->transport !!}</textarea>

                        @error('transport')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Uniform Vendor -->
                    <div class="col-12 mb-3">
                        <label class="form-label">Uniform Vendor</label>

                        <textarea name="uniformvendor" id="uniformvendor"
                            class="form-control @error('uniformvendor') is-invalid @enderror" rows="1"
                            placeholder="Enter Uniform Vendor Contact">{!! optional($doc_contact_data)->uniformvendor !!}</textarea>

                        @error('uniformvendor')
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

    @session('success')
        <div class="custom-alert" id="custom_alert" role="alert">
            <div>
                ✅ <strong>{{ session('success') }}</strong><br>
            </div>
            <span class="close-btn" onclick="this.parentElement.style.display='none';">
                &times;
            </span>
        </div>
    @endsession

@endsection