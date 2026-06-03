@extends('admin.common')
@section('content')

    <div class="px-3 px-md-5 flex-grow-1 container-p-y">

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4">

            <div>
                <h4 class="mb-1 ps-1">Documents List</h4>
            </div>

            <div>
                <a href="{{ route('document-add-edit', 'add') }}" class="btn btn-primary">
                    Add Documents
                </a>
            </div>

        </div>

        <div class="card">
            <div class="card-body">

                <table class="table" id="myTable">

                    <thead>
                        <tr>
                            <th class="text-center">SL</th>
                            <th class="text-center">Category Name</th>
                            <th class="text-center">Documents</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @if(count($document_data) != 0)

                            @foreach($document_data as $key => $item)

                            <tr>

                                <td class="text-center">
                                    {{ $key + 1 }}
                                </td>

                                <td class="text-center">
                                    {{ $item->title }}
                                </td>

                                <td class="text-center">
                                    {{ count($item->documents) }}
                                </td>

                                <td class="text-center">

                                    <button class="btn btn-info" data-bs-toggle="modal"
                                        data-bs-target="#documentModal{{ $item->id }}">
                                        View
                                    </button>

                                    <a href="{{ route('document-add-edit', 'category-' . $item->id) }}"
                                        class="btn btn-primary p-0">
                                        <i class="bx bx-edit m-0 p-2" style="font-size:17px;"></i>
                                    </a>

                                    <a href="{{ route('document-delete', 'category-' . $item->id) }}"
                                        class="btn btn-danger p-0"
                                        onclick="confirmDelete(event, '{{ route('document-delete', 'category-' . $item->id) }}')">
                                        <i class="bx bx-trash m-0 p-2" style="font-size:17px;"></i>
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


    @foreach($document_data as $item)

        <div class="modal fade" id="documentModal{{ $item->id }}" tabindex="-1">

            <div class="modal-dialog modal-dialog-centered">

                <div class="modal-content">

                    <div class="modal-header">

                        <h5 class="modal-title">
                            {{ $item->title }} Documents
                        </h5>

                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>

                    </div>

                    <div class="modal-body">

                        <div style="max-height:350px; overflow-y:auto;">

                            <table class="table table-bordered">

                                <thead>
                                    <tr>
                                        <th width="10%">#</th>
                                        <th>Document Name</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach($item->documents as $docKey => $doc)

                                        <tr>
                                            <td>{{ $docKey + 1 }}</td>
                                            <td>{{ $doc->document_name }}</td>
                                        </tr>

                                    @endforeach

                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    @endforeach

@endsection
