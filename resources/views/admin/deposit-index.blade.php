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

            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <!--begin::Table container-->
            <div class="table-responsive">
                <!--begin::Table-->
                <table id="kt_profile_overview_table" class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bolder">
                    <!--begin::Head-->
                    <thead class="fs-7 text-gray-400 text-uppercase">
                        <tr>
                            <th class="min-w-50px">Tanggal</th>
                            <th class="min-w-50px">User</th>
                            <th class="min-w-250px">Bank Tujuan</th>
                            <th class="min-w-50px">Jumlah</th>
                            <th class="min-w-50px">Status</th>
                            <th class="min-w-300px">Aksi</th>
                        </tr>
                    </thead>
                    <!--end::Head-->
                    <!--begin::Body-->
                    <tbody class="fs-6">
                        @forelse ($data as $d)
                        <tr>
                            <td>{{ $d->created_at }}</td>
                            <td>{{ $d->user->name }}</td>
                            <td>{{ $d->bank_name }}<br>{{ $d->bank_number }}<br>{{ $d->bank_account }}</td>
                            <td>{{ $d->total }}</td>
                            <td>
                                @if ($d->status == 0)
                                    <span class="badge badge-light-warning fw-bolder px-4 py-3">Pending</span>
                                @elseif ($d->status == 1)
                                   <span class="badge badge-light-success fw-bolder px-4 py-3">Sukses</span>
                                @else
                                   <span class="badge badge-light-danger fw-bolder px-4 py-3">Gagal</span>
                                @endif
                            </td>
                            <td>
                                @if ($d->status == 0)
                                <a href="admin/deposit/confirm/{{$d->ref}}" onclick="return confirm('Validasi data ini menjadi sukses dan balance masuk ke User?')" class="btn btn-success btn-sm"><i class="fa fa-check"></i> Validasi</a>
                                @endif
                                <a href="admin/deposit/delete/{{$d->ref}}" onclick="return confirm('Yakin untuk menghapus data ini?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6">
                                <div class="fs-6 text-gray-700 pe-7" style="font-style: italic;">No Data...</div>
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