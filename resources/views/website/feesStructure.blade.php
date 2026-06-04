@extends('website.main')
@section('content')

    <!-- Page Banner -->
    <div class="section page-banner-section">
        <div class="container">
            <div class="page-banner-wrap">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-banner text-center">
                            <h2 class="title">Fee Structure</h2>
                            <ul class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                <li class="breadcrumb-item active">Fee Structure</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Fee Structure Section -->
    <div class="section section-padding">
        <div class="container">

            {{-- ===== FEE TABLE ===== --}}
       <div class="info-card mb-4">
                <h3 class="info-sec-title">Fee Structure for the Academic Year 2026–27 (CBSE) Suggested</h3>
                <div class="table-responsive">
                    <table class="fee-table">
                        <thead>
                            <tr>
                                <th style="width:20%">Instalment Date</th>
                                @foreach($categories as $cat)
                                    <th>{{ $cat->title }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($feeDetails as $row)
                                <tr>
                                    <td>{{ $row->title }}</td>
                                    @foreach($categories as $cat)
                                        <td>{{ $row->fee_details[$cat->title] ?? '-' }}</td>
                                    @endforeach
                                </tr>
                            @endforeach

                            {{-- ✅ Total row --}}
                            <tr class="total-row">
                                <td><strong>Total</strong></td>
                                @foreach($categories as $cat)
                                    <td><strong>{{ $totals[$cat->title] ?? 0 }}</strong></td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
                <p class="note-list mt-3">
                   {!! $fee_structure_details_note->description !!}
                </p>
            </div>



            {{-- ===== SCHOOL TIMING ===== --}}
            <div class="info-card mb-4">
                <h3 class="info-sec-title">School Timing</h3>
                <div class="timing-list">
                    @if(isset($timing) && count($timing) > 0)
                        @foreach($timing as $t)
                            <div class="timing-item">
                                <div class="timing-dot"></div>
                                <div>
                                    <div class="timing-label">{{ $t->title }}</div>
                                    <div class="timing-val">
                                        @if($t->reporting_time)
                                            Reporting Time – {{ \Carbon\Carbon::parse($t->reporting_time)->format('g:ia') }} | 
                                        @endif
                                        School Time – {{ \Carbon\Carbon::parse($t->school_start_time)->format('g:ia') }}@if($t->school_end_time) to {{ \Carbon\Carbon::parse($t->school_end_time)->format('g:ia') }}@endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-12 text-center">
                            <p>No school timing found.</p>
                        </div>
                    @endif
                </div>
            </div>

            {{-- ===== EXTRA CO-CURRICULAR ===== --}}
            <div class="info-card mb-4">
                <h3 class="info-sec-title">Extra Co-Curricular Activities (Dedicated Classrooms)</h3>
                <div class="activity-grid">
                    @if(count($activities) > 0)
                        @foreach($activities as $act)
                            <div class="activity-item">{{ $act->name }}</div>
                        @endforeach
                    @else
                        <div class="col-12 text-center">
                            <p>No extra co-curricular activities found.</p>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>

@endsection

<style>
    :root {
        --brand-primary: #225178;
        --brand-light: #e8f0f7;
        --brand-muted: #5a82a0;
        --brand-border: #c5d8e8;
        --brand-accent: #f07b57;
    }

    .info-card {
        background: #fff;
        border: 0.5px solid var(--brand-border);
        border-radius: 14px;
        padding: 1.5rem;
    }

    .info-sec-title {
        font-size: 25px;
        font-weight: 600;
        color: var(--brand-primary);
        text-align: center;
        padding-bottom: 12px;
        border-bottom: 2px solid var(--brand-primary);
        margin-bottom: 1.25rem;
    }

    /* Fee Table */
    .fee-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 15px;
    }

    .fee-table thead tr {
        font-size: 17px;
    }

    .fee-table thead th {
        background: var(--brand-primary);
        color: var(--brand-light);
        padding: 10px 8px;
        font-weight: 500;
        text-align: center;
    }

    .fee-table thead th:first-child {
        text-align: left;
        border-radius: 8px 0 0 0;
    }

    .fee-table thead th:last-child {
        border-radius: 0 8px 0 0;
    }

    .fee-table tbody td {
        padding: 8px 8px;
        text-align: center;
        border-bottom: 0.5px solid var(--brand-border);
        color: #333;
        vertical-align: middle;
    }

    .fee-table tbody td:first-child {
        text-align: left;
        color: var(--brand-primary);
        font-weight: 500;
    }

    .fee-table tbody tr:nth-child(even) td {
        background: #f5f9fc;
    }

    .fee-table tbody tr.total-row td {
        font-weight: 600;
        background: var(--brand-light);
        border-bottom: none;
    }

    /* Notes */
    .note-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .note-list li {
        padding: 4px 0 4px 20px;
        position: relative;
        font-size: 16px;
        color: #555;
        line-height: 1.6;
    }

    .note-list li::before {
        content: "❖";
        position: absolute;
        left: 0;
        color: var(--brand-muted);
        font-size: 15px;
        top: 6px;
    }

    /* Timing */
    .timing-list {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .timing-item {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        padding: 12px 16px;
        background: var(--brand-light);
        border-radius: 10px;
    }

    .timing-dot {
        width: 9px;
        height: 9px;
        border-radius: 50%;
        background: var(--brand-primary);
        flex-shrink: 0;
        margin-top: 10px;
    }

    .timing-label {
        font-weight: 600;
        color: var(--brand-primary);
        font-size: 17px;
    }

    .timing-val {
        font-size: 15px;
        color: var(--brand-muted);
        margin-top: 3px;
    }

    /* Activities */
    .activity-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 10px;
    }

    .activity-item {
        background: var(--brand-light);
        border: 0.5px solid var(--brand-border);
        border-radius: 8px;
        padding: 12px 10px;
        text-align: center;
        font-size: 17px;
        font-weight: 500;
        color: var(--brand-primary);
        justify-content: center;
        display: flex;
        align-items: center;
    }

    @media (max-width: 576px) {
        .info-sec-title {
            font-size: 14px;
        }

        .fee-table {
            font-size: 11px;
        }

        .activity-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

     @media (max-width: 376px) {

        .activity-grid {
            grid-template-columns: repeat(1, 1fr);
        }
    }
</style>