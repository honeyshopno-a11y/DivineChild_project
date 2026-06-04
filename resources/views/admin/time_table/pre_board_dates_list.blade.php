@extends('admin.common')
@section('title', 'Pre-Board Dates List')
@section('content')

    <div class="px-3 px-md-5 flex-grow-1 container-p-y">
        <div
            class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 row-gap-4">
            <div class="d-flex flex-column justify-content-center">
                <h4 class="mb-1 ps-1">Pre-Board Dates List</h4>
            </div>
            <div class="d-flex align-content-center flex-wrap gap-4 mt-2 mt-md-0">
                <a href="{{ route('pre.board.dates.addedit', 'add') }}" role="button" class="btn btn-primary">Add Pre-Board Dates</a>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card mb-6">
                    <div class="card-body">
                        <table class="datatables-products table dataTable dtr-column collapsed mt-3 text-center"
                            id="myTable" aria-describedby="DataTables_Table_0_info" style="width: 100%;">
                            <thead class="border-top">
                                <tr>
                                    <th class="text-center">Sr No.</th>
                                    <th class="text-center">Title</th>
                                    <th class="text-center">Exam Date</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($preBoardDatesList))
                                    @foreach ($preBoardDatesList as $key => $list)
                                        <tr>
                                            <td class="text-center">{{ $key + 1 }}</td>
                                            <td class="text-center">{{ $list->title }}</td>
                                            <td class="text-center">
                                                {{ $list->from_date ? \Carbon\Carbon::parse($list->from_date)->format('d/m/Y') : '-' }}
                                                To
                                                {{ $list->to_date ? \Carbon\Carbon::parse($list->to_date)->format('d/m/Y') : '-' }}
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('pre.board.dates.addedit', $list->id) }}"
                                                    role="button" class="btn btn-primary p-0">
                                                    <i class='bxr  bx-edit m-0 p-2' style="font-size: 17px;"></i>
                                                </a>
                                                <a href="{{ route('pre.board.dates.delete', $list->id) }}"
                                                    class="btn btn-danger p-0"
                                                    onclick="confirmDelete(event, '{{ route('pre.board.dates.delete', $list->id) }}')">
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