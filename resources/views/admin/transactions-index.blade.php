@extends('layouts.main')
@section('title', $title)

@section('content')
<!--begin::Post-->
<div class="post d-flex flex-column-fluid" id="kt_post">
<!--begin::Container-->
<div id="kt_content_container" class="container-xxl">
<!--begin::Basic info-->
<div class="card mb-5 mb-xl-10">
    <!--begin::Card header-->
    <div class="card-header border-0">
        <!--begin::Card title-->
        <div class="card-title m-0">
            <h3 class="fw-bolder m-0">{{$title}}</h3>
        </div>
        <!--end::Card title-->
    </div>
    <!--begin::Card header-->
    <!--begin::Content-->
    <div id="kt_account_profile_details" class="collapse show">

        <!--begin::Card body-->
        <div class="card-body pt-0">

            <!--begin::Table container-->
            <div class="table-responsive">
                <!--begin::Table-->
                <table id="kt_profile_overview_table" class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bolder">
                    <!--begin::Head-->
                    <thead class="fs-7 text-gray-400 text-uppercase">
                        <tr>
                            <th class="min-w-150px">Timestamp</th>
                            <th class="min-w-150px">Trx ID</th>
                            <th class="min-w-50px">User</th>
                            <th class="min-w-50px">Market</th>
                            <th class="min-w-50px">Type</th>
                            <th class="min-w-50px">Stake</th>
                            <th class="min-w-50px">Qty</th>
                            <th class="min-w-50px">End</th>
                            <th class="min-w-50px">Status</th>
                        </tr>
                    </thead>
                    <!--end::Head-->
                    <!--begin::Body-->
                    <tbody class="fs-6">
                        @forelse ($data as $d)
                        <tr>
                            <td>{{ $d->created_at }}</td>
                            <td>{{ $d->trx_id }}</td>
                            <td>{{ $d->user->name }}</td>
                            <td>{{ strtoupper($d->market) }}</td>
                            <td>
                                @if ($d->type == 'buy 30 seconds')
                                    <span class="badge badge-success fw-bolder px-4 py-3">{{ strtoupper('buy 30 seconds') }}</span>
                                @elseif ($d->type == 'buy 60 seconds')
                                    <span class="badge badge-success fw-bolder px-4 py-3">{{ strtoupper('buy 1 minute') }}</span>
                                @elseif ($d->type == 'buy 180 seconds')
                                    <span class="badge badge-success fw-bolder px-4 py-3">{{ strtoupper('buy 3 minutes') }}</span>
                                @elseif ($d->type == 'buy 300 seconds')
                                    <span class="badge badge-success fw-bolder px-4 py-3">{{ strtoupper('buy 5 minutes') }}</span>
                                @elseif ($d->type == 'buy 1800 seconds')
                                    <span class="badge badge-success fw-bolder px-4 py-3">{{ strtoupper('buy 30 minutes') }}</span>
                                @elseif ($d->type == 'buy 3600 seconds')
                                    <span class="badge badge-success fw-bolder px-4 py-3">{{ strtoupper('buy 1 hour') }}</span>
                                @elseif ($d->type == 'sell 30 seconds')
                                    <span class="badge badge-danger fw-bolder px-4 py-3">{{ strtoupper('sell 30 seconds') }}</span>
                                @elseif ($d->type == 'sell 60 seconds')
                                    <span class="badge badge-danger fw-bolder px-4 py-3">{{ strtoupper('sell 1 minute') }}</span>
                                @elseif ($d->type == 'sell 180 seconds')
                                    <span class="badge badge-danger fw-bolder px-4 py-3">{{ strtoupper('sell 3 minutes') }}</span>
                                @elseif ($d->type == 'sell 300 seconds')
                                    <span class="badge badge-danger fw-bolder px-4 py-3">{{ strtoupper('sell 5 minutes') }}</span>
                                @elseif ($d->type == 'sell 1800 seconds')
                                    <span class="badge badge-danger fw-bolder px-4 py-3">{{ strtoupper('sell 30 minutes') }}</span>
                                @elseif ($d->type == 'sell 3600 seconds')
                                    <span class="badge badge-danger fw-bolder px-4 py-3">{{ strtoupper('sell 1 hour') }}</span>
                                @endif
                            </td>
                            <td>{{ $d->rate_stake }}</td>
                            <td>{{ $d->amount }}</td>
                            <td>{{ $d->rate_end }}</td>
                            <td>
                                @if ($d->status == 0)
                                    <span class="badge badge-light-warning fw-bolder px-4 py-3">WAIT</span>
                                @elseif ($d->status == 1)
                                   <span class="badge badge-light-success fw-bolder px-4 py-3">WIN</span>
                                @elseif ($d->status == 2)
                                   <span class="badge badge-light-danger fw-bolder px-4 py-3">LOSE</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6">
                                <div class="fs-6 text-gray-700 pe-7" style="font-style: italic;">Data not available...</div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <!--end::Body-->
                </table>
                <!--end::Table-->
            </div>
            <!--end::Table container-->

            <div class="d-flex justify-content-start">
                {{ $data->links() }}
            </div>

        </div>
        <!--end::Card body-->

    </div>
    <!--end::Content-->
</div>
<!--end::Basic info-->

</div>
<!--end::Container-->
</div>
<!--end::Post-->

<style>
    .hidden.sm\:flex-1.sm\:flex.sm\:items-center.sm\:justify-between {
        display: none !important;
    }
</style>

@stop