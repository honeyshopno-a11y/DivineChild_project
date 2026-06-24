@extends('admin.common')

@section('content')

    <div class="px-3 px-md-5 flex-grow-1 container-p-y">

        <div
            class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 row-gap-4">
            <div class="d-flex flex-column justify-content-center">
                <h4 class="mb-1 ps-1">Fees Structure Details List</h4>
            </div>
            <div class="d-flex align-content-center flex-wrap gap-4 mt-2 mt-md-0">
                <a href="{{ route('fees-structure-details-add-edit', 'add') }}" class="btn btn-primary">
                    Add Fees Structure Details
                </a>
            </div>
        </div>



        {{-- ✅ Table Section --}}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <table class="table dataTable" id="myTable">
                            <thead>
                                <tr>
                                    <th class="text-center">SL</th>
                                    <th class="text-center">Title</th>
                                    <th class="text-center">Categories</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($fee_structure_details as $key => $item)
                                    @php
                                        $details = is_array($item->fee_details)
                                            ? $item->fee_details
                                            : json_decode($item->fee_details, true);
                                    @endphp
                                    <tr>
                                        <td class="text-center">{{ $key + 1 }}</td>

                                        {{-- ✅ Full title --}}
                                        <td>{{ $item->title }}</td>

                                        <td class="text-center">
                                            <button type="button" class="btn btn-primary view-details"
                                                data-title="{{ $item->title }}" data-details='@json($details)'
                                                data-bs-toggle="modal" data-bs-target="#viewModal">
                                                View
                                            </button>
                                        </td>

                                        <td class="text-center">
                                            <a href="{{ route('fees-structure-details-add-edit', $item->id) }}"
                                                class="btn btn-primary p-0">
                                                <i class='bxr bx-edit m-0 p-2' style="font-size:17px;"></i>
                                            </a>
                                            <a href="{{ route('fees-structure-details-delete', $item->id) }}"
                                                class="btn btn-danger p-0"
                                                onclick="confirmDelete(event,'{{ route('fees-structure-details-delete', $item->id) }}')">
                                                <i class="bx bx-trash m-0 p-2" style="font-size:17px;"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <!-- <tr>
                                            <td colspan="4" class="text-center">No Record Found</td>
                                        </tr> -->
                                @endforelse
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

        {{-- ✅ Summer Note / CKEditor Top Note Section --}}
        <div class="row mb-4 mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h5 class="mb-3">Fees Structure Note</h5>

                        <form action="{{ route('fees-structure-note-store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Details / Description</label>
                                <textarea name="note_details" id="noteEditor" class="form-control"
                                    rows="5">{{ $feeNote->details ?? '' }}{{$fee_structure_details_note->description}}</textarea>
                            </div>

                            <button type="submit" class="btn btn-success">
                                <i class="bx bx-save me-1"></i> Save Note
                            </button> 

                        </form>

                    </div>
                </div>
            </div>
        </div>

        @if(session('success'))
            <div class="custom-alert" id="custom_alert">
                <div>✅ <strong>{{ session('success') }}</strong></div>
                <span class="close-btn" onclick="this.parentElement.style.display='none';">&times;</span>
            </div>
        @endif

    </div>

    {{-- ✅ View Modal --}}
    <div class="modal fade"  id="viewModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody id="modalBodyData"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- ✅ CKEditor 5 --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>

    <script>
        // ✅ CKEditor init
        ClassicEditor
            .create(document.querySelector('#noteEditor'), {
                toolbar: [
                    'heading', '|',
                    'bold', 'italic', 'underline', '|',
                    'bulletedList', 'numberedList', '|',
                    'blockQuote', 'link', '|',
                    'undo', 'redo'
                ]
            })
            .then(editor => {
                // ✅ Height 400px set karo
                editor.editing.view.change(writer => {
                    writer.setStyle(
                        'height',
                        '300px',
                        editor.editing.view.document.getRoot()
                    );
                });
            })
            .catch(error => {
                console.error(error);
            });
        // ✅ View modal data populate
        $(document).on('click', '.view-details', function () {

            var title = $(this).data('title');
            var details = $(this).data('details');

            $('#modalTitle').text(title);

            var tbody = $('#modalBodyData');
            tbody.html('');

            if (details && typeof details === 'object') {
                $.each(details, function (category, amount) {
                    tbody.append(
                        '<tr>' +
                        '<td>' + category + '</td>' +
                        '<td>₹' + amount + '</td>' +
                        '</tr>'
                    );
                });
            } else {
                tbody.html('<tr><td colspan="2" class="text-center">No data found</td></tr>');
            }
        });
    </script>

@endsection