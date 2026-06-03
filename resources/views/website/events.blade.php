@extends('website.main')
@section('content')

    <!-- Page Banner -->
    <div class="section page-banner-section">
        <div class="container">
            <div class="page-banner-wrap">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-banner text-center">
                            <h2 class="title">Mega Events</h2>
                            <ul class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                <li class="breadcrumb-item active">Mega Events</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mega Events Section -->
    <div class="section section-padding">
        <div class="container">

            <div class="text-center mb-5">
                <h2 class="mega-events-title">MEGA EVENTS</h2>
            </div>

            <div class="events-card">
                <div class="table-responsive">
                    <table class="events-table">
                        <thead>
                            <tr>
                                <th class="col-sr">SR.NO.</th>
                                <th>EVENT</th>
                                <th class="col-month">MONTH</th>
                                <th class="col-date">DATE</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $events = [
                                    ['event' => 'Investiture Ceremony', 'month' => 'JUNE', 'date' => '29/06/2024'],
                                    ['event' => 'Science Exhibition', 'month' => 'AUGUST', 'date' => '10/08/2024'],
                                    ['event' => 'Garba Celebration', 'month' => 'OCTOBER', 'date' => '05/10/2024'],
                                    ['event' => 'Sports Day', 'month' => 'OCTOBER', 'date' => '18/10/2024 to 19/10/2024'],
                                    ['event' => 'Flea', 'month' => 'DECEMBER', 'date' => '24/12/2024'],
                                    ['event' => 'Picnic', 'month' => 'JANUARY', 'date' => '11/01/2025'],
                                ];
                            @endphp
                            @foreach($events as $i => $ev)
                                <tr>
                                    <td class="td-sr">{{ $i + 1 }}</td>
                                    <td class="td-event">{{ $ev['event'] }}</td>
                                    <td><span class="month-badge">{{ $ev['month'] }}</span></td>
                                    <td class="td-date">{{ $ev['date'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
    }

    .mega-events-title {
        font-size: 32px;
        font-weight: 700;
        color: var(--brand-primary);
        letter-spacing: 3px;
    }

    .events-table {
        width: 100%;
        margin: 0 auto;
        border-collapse: collapse;
    }

    .events-card {
        width: 50%;
        margin: 0 auto;
        background: #fff;
        border: 0.5px solid var(--brand-border);
        border-radius: 14px;
        overflow: hidden;
    }

    @media (max-width: 768px) {
        .events-card {
            width: 100%;
            /* mobile ma full width */
        }
    }

    .events-table thead th {
        background: var(--brand-primary);
        color: var(--brand-light);
        padding: 14px 18px;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: 1px;
        text-align: left;
    }

    .events-table thead th.col-sr {
        width: 90px;
        text-align: center;
    }

    .events-table thead th.col-month {
        width: 150px;
    }

    .events-table thead th.col-date {
        width: 180px;
    }

    .events-table tbody tr {
        border-bottom: 0.5px solid var(--brand-border);
        transition: background .15s ease;
    }

    .events-table tbody tr:last-child {
        border-bottom: none;
    }

    .events-table tbody tr:hover td {
        background: var(--brand-light);
    }

    .events-table tbody td {
        padding: 14px 18px;
        font-size: 14px;
        color: #333;
        vertical-align: middle;
    }

    .td-sr {
        text-align: center;
        font-weight: 700;
        font-size: 16px;
        color: var(--brand-primary) !important;
    }

    .td-event {
        font-weight: 500;
        color: var(--brand-primary) !important;
    }

    .month-badge {
        display: inline-block;
        background: var(--brand-light);
        color: var(--brand-primary);
        font-size: 11px;
        font-weight: 600;
        padding: 4px 12px;
        border-radius: 20px;
        letter-spacing: 0.5px;
        border: 0.5px solid var(--brand-border);
    }

    .td-date {
        font-size: 13px;
        color: var(--brand-muted);
        font-weight: 500;
    }

    @media (max-width: 576px) {
        .mega-events-title {
            font-size: 22px;
            letter-spacing: 1px;
        }

        .events-table thead th,
        .events-table tbody td {
            padding: 10px 10px;
            font-size: 12px;
        }

        .month-badge {
            font-size: 10px;
            padding: 3px 8px;
        }
    }
</style>