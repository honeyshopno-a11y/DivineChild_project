@extends('admin.common')
@section('title', 'Category')

@section('content')

    <div class="px-3 px-md-5 flex-grow-1 container-p-y">

        <div
            class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 row-gap-4">

            <div class="d-flex flex-column justify-content-center">
                <h4 class="mb-1 ps-1">
                    @if ($category_data == '')
                        Add New Category
                    @else
                        Edit Category
                    @endif
                </h4>
            </div>

        </div>

        <div class="row">
            <div class="col-12 col-lg-12">

                <div class="card mb-6">
                    <div class="card-body">

                        <form action="{{ route('category-store') }}" method="POST">
                            @csrf

                            <input type="hidden" name="id" @if ($category_data == '') value="add" @else
                            value="{{ $category_data->id }}" @endif>

                            <div class="row">

                                <div class="col-lg-6 mb-3">
                                    <div class="form-group">

                                        <label class="form-label">
                                            Category Name
                                            <span class="text-danger">*</span>
                                        </label>

                                        <input type="text" name="title"
                                            class="form-control @error('title') is-invalid @enderror"
                                            placeholder="Enter Category Name" @if ($category_data == '')
                                            value="{{ old('title') }}" @else value="{{ $category_data->title }}" @endif>

                                        @error('title')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                    </div>
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