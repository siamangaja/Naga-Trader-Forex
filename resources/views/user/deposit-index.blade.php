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

        <div class="d-flex justify-content-end">
			<a href="user/deposit/add" class="btn btn-primary justify-content-end text-nowrap">+ Deposit</a>
		</div>

        <br><br>
        <h5>Riwayat Deposit</h5>

            <!--begin::Table container-->
            <div class="table-responsive">
                <!--begin::Table-->
                <table id="kt_profile_overview_table" class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bolder">
                    <!--begin::Head-->
                    <thead class="fs-7 text-gray-400 text-uppercase">
                        <tr>
                            <th class="min-w-100px">Ref</th>
                            <th class="min-w-100px">Tanggal</th>
                            <th class="min-w-250px">Bank Tujuan</th>
                            <th class="min-w-90px">Nominal</th>
                            <th class="min-w-90px">Status</th>
                        </tr>
                    </thead>
                    <!--end::Head-->
                    <!--begin::Body-->
                    <tbody class="fs-6">
                        @forelse ($data as $d)
                        <tr>
                            <td><a href="{{url('user/deposit', $d->ref)}}">{{ $d->ref }}</a></td>
                            <td>{{ $d->created_at }}</td>
                            <td>{{ $d->bank_name }}<br>{{ $d->bank_number }}<br>{{ $d->bank_account }}</td>
                            <td>{{ $d->total }}</td>
                            <td>
                                @if ($d->status == 0)
                                    <span class="badge badge-light-warning fw-bolder px-4 py-3">Diverifikasi</span>
                                @elseif ($d->status == 1)
                                   <span class="badge badge-light-success fw-bolder px-4 py-3">Sukses</span>
                                @elseif ($d->status == 2)
                                   <span class="badge badge-light-danger fw-bolder px-4 py-3">Gagal</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6">
                                <div class="fs-6 text-gray-700 pe-7" style="font-style: italic;">Data masih kosong...</div>
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