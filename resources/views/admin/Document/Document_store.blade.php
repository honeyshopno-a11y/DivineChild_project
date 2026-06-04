@extends('admin.common')
@section('title', 'Documents')

@section('content')

<div class="px-3 px-md-5 flex-grow-1 container-p-y">

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4">
        <div>
            <h4 class="mb-1 ps-1">
                @if ($document_data == '')
                    Add Documents
                @else
                    Edit Documents
                @endif
            </h4>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <form action="{{ route('document-store') }}" method="POST">
                        @csrf

                        <input type="hidden" name="id"
                            value="{{ $form_id ?? ($document_data == '' ? 'add' : $document_data->id) }}">

                        <div class="row">

                            <!-- Category -->
                            <div class="col-lg-6 mb-3">
                                <label class="form-label">
                                    Category
                                    <span class="text-danger">*</span>
                                </label>

                                <select name="category_id"
                                    class="form-control @error('category_id') is-invalid @enderror">
                                    <option value="">Select Category</option>

                                    @foreach ($category_data as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('category_id', $selected_category_id ?? '') == $category->id ? 'selected' : '' }}>
                                            {{ $category->title }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('category_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>

                        <!-- Document Heading + Add Button -->
                        <div class="d-flex align-items-center justify-content-between mb-3">

                            <label class="form-label mb-0">
                                Documents
                                <span class="text-danger">*</span>
                            </label>

                            <button type="button"
                                class="btn btn-sm btn-primary"
                                id="addDocument" style="
                                        width: 4%;
                                        padding-right: 10px;
                                        margin-right: 30px;">
                                                                    +
                            </button>

                        </div>

                        <!-- Document Rows -->
                        <div id="documentContainer">

                            @php
                                $documentNames = old(
                                    'document_name',
                                    isset($document_items) && count($document_items) != 0
                                        ? $document_items->pluck('document_name')->toArray()
                                        : ['']
                                );
                            @endphp

                            @foreach ($documentNames as $documentName)

                                <div class="row documentRow">

                                    <div class="col-lg-11 mb-3">
                                        <input type="text"
                                            name="document_name[]"
                                            class="form-control"
                                            placeholder="Enter Document Name"
                                            value="{{ $documentName }}">
                                    </div>

                                    <div class="col-lg-1 mb-3">
                                        <button type="button"
                                            class="btn btn-danger removeDocument">
                                            -
                                        </button>
                                    </div>

                                </div>

                            @endforeach

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

    // Add Document Row
    const addDocumentButton = document.getElementById('addDocument');

    if (addDocumentButton) {
        addDocumentButton.addEventListener('click', function () {

            let html = `
                <div class="row documentRow">

                    <div class="col-lg-11 mb-3">
                        <input type="text"
                            name="document_name[]"
                            class="form-control"
                            placeholder="Enter Document Name">
                    </div>

                    <div class="col-lg-1 mb-3">
                        <button type="button"
                            class="btn btn-danger removeDocument">
                            -
                        </button>
                    </div>

                </div>
            `;

            document.getElementById('documentContainer')
                .insertAdjacentHTML('beforeend', html);
        });
    }


    // Remove Row
    document.addEventListener('click', function (e) {

        if (e.target.classList.contains('removeDocument')) {

            let rows = document.querySelectorAll('.documentRow');

            if (rows.length > 1) {
                e.target.closest('.documentRow').remove();
            }
        }
    });

</script>
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
