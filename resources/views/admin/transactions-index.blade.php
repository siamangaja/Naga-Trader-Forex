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
                            <th class="min-w-50px">Type</th>
                            <th class="min-w-50px">Symbol</th>
                            <th class="min-w-50px">Price</th>
                            <th class="min-w-50px">Qty</th>
                            <th class="min-w-50px">Total</th>
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
                            <td>
                                @if ($d->type == 'buy')
                                    <span class="badge badge-light-success fw-bolder px-4 py-3">Buy</span>
                                @elseif ($d->type == 'sell')
                                   <span class="badge badge-light-danger fw-bolder px-4 py-3">Sell</span>
                                @endif
                            </td>
                            <td>{{ strtoupper($d->symbol) }}</td>
                            <td>{{ $d->price }}</td>
                            <td>{{ $d->amount }}</td>
                            <td>{{ $d->total }}</td>
                            <td>
                                @if ($d->status == 0)
                                    <span class="badge badge-light-warning fw-bolder px-4 py-3">Pending</span>
                                @elseif ($d->status == 1)
                                   <span class="badge badge-light-success fw-bolder px-4 py-3">Success</span>
                                @elseif ($d->status == 2)
                                   <span class="badge badge-light-danger fw-bolder px-4 py-3">Failed</span>
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
@stop