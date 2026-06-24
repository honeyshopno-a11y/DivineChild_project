@extends('admin.common')
@section('title', 'Inquiry Form List')
@section('content')

    {{--
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Inquiry Form List</title> --}}

    <div class="px-3 px-md-5 flex-grow-1 container-p-y">

        <div
            class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 row-gap-4">
            <div class="d-flex flex-column justify-content-center">
                <h4 class="mb-1 ps-1">Inquiry Form List</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card mb-6">
                    <div class="card-body">

                        <table class="datatables-products table dataTable dtr-column collapsed mt-3" id="myTable"
                            aria-describedby="DataTables_Table_0_info" style="width: 100%;">

                            <thead class="border-top">
                                <tr>
                                    <th class="text-center">SL</th>
                                    <th class="text-center">Student Name</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Mobile No</th>
                                    <th class="text-center">Class</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if (count($inquiry_data) != 0)
                                    @foreach ($inquiry_data as $key => $item)
                                        <tr>
                                            <td class="text-center">{{ $key + 1 }}</td>

                                            <td class="text-center">
                                                <h6 class="text-nowrap mb-0">
                                                    {{ $item->student_name ?? 'N/A' }}
                                                </h6>
                                            </td>

                                            <td class="text-center">
                                                {{ $item->primary_email_id ?? 'N/A' }}
                                            </td>

                                            <td class="text-center">
                                                {{ $item->primary_mobile_no ?? 'N/A' }}
                                            </td>

                                            <td class="text-center">
                                                {{ $item->class ?? 'N/A' }}
                                            </td>

                                            <td class="text-center">
                                                <a href="{{ route('inquiry-form-view', $item->id) }}" role="button"
                                                    class="btn btn-primary p-0">
                                                    <i class="bx bx-show m-0 p-2" style="font-size: 17px;"></i>
                                                </a>

                                                <a href="{{ route('inquiry-form-delete', $item->id) }}" class="btn btn-danger p-0"
                                                    onclick="confirmDelete(event, '{{ route('inquiry-form-delete', $item->id) }}')">
                                                    <i class="bx bx-trash m-0 p-2" style="font-size: 17px;"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>

                        </table>

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
    </script>
@endsection