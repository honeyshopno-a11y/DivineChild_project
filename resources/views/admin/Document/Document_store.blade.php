@extends('admin.common')
@section('content')

    <div class="px-3 px-md-5 flex-grow-1 container-p-y">

        <div class="d-flex flex-column justify-content-center mb-4">
            <h4 class="mb-1 ps-1">
                Add Documents
            </h4>
        </div>

        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-body">

                        <form action="{{ route('document-store') }}" method="POST">
                            @csrf

                            <div class="row">

                                <div class="col-lg-6 mb-3">
                                    <label class="form-label">
                                        Category
                                        <span class="text-danger">*</span>
                                    </label>

                                    <select name="category_id"
                                        class="form-control @error('category_id') is-invalid @enderror">

                                        <option value="">
                                            Select Category
                                        </option>

                                        @foreach($category_data as $category)

                                            <option value="{{ $category->id }}">
                                                {{ $category->title }}
                                            </option>

                                        @endforeach

                                    </select>

                                    @error('category_id')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                            </div>


                            <div id="documentContainer">

                                <div class="row document-row">

                                    <div class="col-lg-8 mb-3">

                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <label class="form-label mb-0">
                                                Document Name
                                                <span class="text-danger">*</span>
                                            </label>

                                            <button type="button" class="btn btn-success btn-sm addRow">
                                                <i class="bx bx-plus"></i>
                                            </button>
                                        </div>

                                        <input type="text" name="document_name[]" class="form-control"
                                            placeholder="Enter Document Name">

                                    </div>

                                    <div class="col-lg-4 mb-3 d-flex align-items-end">

                                        <button type="button" class="btn btn-success addRow me-2">
                                            +
                                        </button>

                                        <!-- <button type="button" class="btn btn-danger removeRow">
                                                    -
                                                </button> -->

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

        $(document).ready(function () {

            $(document).on('click', '.addRow', function () {

                let html = `
                    <div class="row document-row">

                        <div class="col-lg-8 mb-3">

                            <input type="text"
                                name="document_name[]"
                                class="form-control"
                                placeholder="Enter Document Name">

                        </div>

                        <div class="col-lg-4 mb-3">

                            <button type="button"
                                class="btn btn-success addRow me-2">
                                +
                            </button>

                            <button type="button"
                                class="btn btn-danger removeRow">
                                -
                            </button>

                        </div>

                    </div>`;

                $('#documentContainer').append(html);

            });


            $(document).on('click', '.removeRow', function () {

                if ($('.document-row').length > 1) {
                    $(this).closest('.document-row').remove();
                }

            });

        });

    </script>

@endsection