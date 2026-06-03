@extends('admin.common')
@section('content')

    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Home Slider List</title>

    <div class="px-3 px-md-5 flex-grow-1 container-p-y">
        <div
            class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 row-gap-4">
            <div class="d-flex flex-column justify-content-center">
                <h4 class="mb-1 ps-1">Home Slider List</h4>
            </div>
            <div class="d-flex align-content-center flex-wrap gap-4 mt-2 mt-md-0">
                <a href="{{ route('slider-add-edit', 'add') }}" role="button" class="btn btn-primary">Add Home
                    Slider</a>
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
                                    <th class="text-center">Type</th>
                                    <th class="text-center">Preview</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <!-- <tbody> 

                                    @if(count($slider_data) != 0)
                                        @foreach ($slider_data as $key => $item)
                                            <tr>
                                                <td class="text-center">{{$key + 1}}</td>
                                                <td class="text-center">{{ $item->type }}</td>

                                                <td class="text-center">
                                                    <img src="{{ asset($item->image) }}" alt="Image" width="80" height="80">
                                                </td>

                                                <td class="text-center">
                                                    <a href="{{ route('slider-add-edit', $item->id) }}" role="button"
                                                        class="btn btn-primary p-0">
                                                        <i class='bxr  bx-edit m-0 p-2' style="font-size: 17px;"></i>
                                                    </a>
                                                    <a href="{{ route('slider-delete', $item->id) }}" class="btn btn-danger p-0"
                                                        onclick="confirmDelete(event, '{{ route('slider-delete', $item->id) }}')">
                                                        <i class="bx bx-trash m-0 p-2" style="font-size: 17px;"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody> -->

                            <tbody>

                                @if(count($slider_data) != 0)

                                    @foreach ($slider_data as $key => $item)

                                        <tr>

                                            <td class="text-center">
                                                {{$key + 1}}
                                            </td>

                                            <td class="text-center">
                                                {{ $item->type }}
                                            </td>

                                            <td class="text-center">

                                                @if($item->type == 'image')

                                                    <img src="{{ asset($item->file) }}" alt="Image" width="80" height="80">

                                                @else

                                                    <video width="120" height="80" controls>
                                                        <source src="{{ asset($item->file) }}">
                                                    </video>

                                                @endif

                                            </td>

                                            <td class="text-center">

                                                <a href="{{ route('slider-add-edit', $item->id) }}" role="button"
                                                    class="btn btn-primary p-0">

                                                    <i class='bxr bx-edit m-0 p-2' style="font-size: 17px;"></i>

                                                </a>

                                                <a href="{{ route('slider-delete', $item->id) }}" class="btn btn-danger p-0"
                                                    onclick="confirmDelete(event, '{{ route('slider-delete', $item->id) }}')">

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

@endsection