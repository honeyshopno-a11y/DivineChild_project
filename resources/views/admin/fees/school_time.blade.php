@extends('admin.common')

@section('content')

    <div class="px-3 px-md-5 flex-grow-1 container-p-y">

        <div
            class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 row-gap-4">
            <div>
                <h4 class="mb-1 ps-1">School Time</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-body">

                        <div class="d-flex justify-content-end mb-3">
                            <button type="button" class="btn btn-success" id="add-more">
                                + Add More
                            </button>
                        </div>

                        <form action="{{ route('school-time-store') }}" method="POST">
                            @csrf
                            <!-- #region -->
                            <div id="timing-wrapper">

                                @if(isset($schoolTiming) && count($schoolTiming) > 0)

                                    @foreach($schoolTiming as $timing)

                                        <div class="timing-item border rounded p-3 mb-3">
                                            <div class="row">

                                                <div class="col-md-3 mb-3">
                                                    <label class="form-label">Name</label>
                                                    <input type="text" name="name[]" class="form-control"
                                                        value="{{ $timing->title }}">
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label class="form-label">Reporting Time</label>
                                                    <input type="time" name="reporting_time[]" class="form-control"
                                                        value="{{ $timing->reporting_time }}">
                                                </div>

                                                <div class="col-md-2 mb-3">
                                                    <label class="form-label">School Start Time</label>
                                                    <input type="time" name="school_start_time[]" class="form-control"
                                                        value="{{ $timing->school_start_time }}">
                                                </div>

                                                <div class="col-md-2 mb-3">
                                                    <label class="form-label">School End Time</label>
                                                    <input type="time" name="school_end_time[]" class="form-control"
                                                        value="{{ $timing->school_end_time }}">
                                                </div>

                                                <div class="col-md-2 mb-3 d-flex align-items-end">
                                                    <button type="button" class="btn btn-danger remove-row w-100">
                                                        Remove
                                                    </button>
                                                </div>

                                            </div>
                                        </div>

                                    @endforeach

                                @else

                                    <div class="timing-item border rounded p-3 mb-3">
                                        <div class="row">

                                            <div class="col-md-3 mb-3">
                                                <label class="form-label">Name</label>
                                                <input type="text" name="name[]" class="form-control"
                                                    placeholder="Nursery to Sr. Kg.">
                                            </div>

                                            <div class="col-md-3 mb-3">
                                                <label class="form-label">Reporting Time</label>
                                                <input type="time" name="reporting_time[]" class="form-control">
                                            </div>

                                            <div class="col-md-2 mb-3">
                                                <label class="form-label">School Start Time</label>
                                                <input type="time" name="school_start_time[]" class="form-control">
                                            </div>

                                            <div class="col-md-2 mb-3">
                                                <label class="form-label">School End Time</label>
                                                <input type="time" name="school_end_time[]" class="form-control">
                                            </div>

                                            <div class="col-md-2 mb-3 d-flex align-items-end">
                                                <button type="button" class="btn btn-danger remove-row w-100">
                                                    Remove
                                                </button>
                                            </div>

                                        </div>
                                    </div>

                                @endif

                            </div>

                            <button type="submit" class="btn btn-primary">
                                Submit
                            </button>

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

        $(document).ready(function () {

            $('#add-more').click(function () {

                let html = `
                    <div class="timing-item border rounded p-3 mb-3">
                        <div class="row">

                            <div class="col-md-3 mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name[]" class="form-control">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label class="form-label">Reporting Time</label>
                                <input type="time" name="reporting_time[]" class="form-control">
                            </div>

                            <div class="col-md-2 mb-3">
                                <label class="form-label">School Start Time</label>
                                <input type="time" name="school_start_time[]" class="form-control">
                            </div>

                            <div class="col-md-2 mb-3">
                                <label class="form-label">School End Time</label>
                                <input type="time" name="school_end_time[]" class="form-control">
                            </div>

                            <div class="col-md-2 mb-3 d-flex align-items-end">
                                <button type="button" class="btn btn-danger remove-row w-100">
                                    Remove
                                </button>
                            </div>

                        </div>
                    </div>
                    `;

                $('#timing-wrapper').append(html);
            });

            $(document).on('click', '.remove-row', function () {

                if ($('.timing-item').length > 1) {
                    $(this).closest('.timing-item').remove();
                }

            });

        });
    </script>

@endsection