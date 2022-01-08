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
                            <th class="min-w-50px">Date</th>
                            <th class="min-w-50px">User</th>
                            <th class="min-w-50px">Type</th>
                            <th class="min-w-50px">Amount</th>
                            <th class="min-w-50px">Balance</th>
                            <th class="min-w-250px">Notes</th>
                            <th class="min-w-100px">Action</th>
                        </tr>
                    </thead>
                    <!--end::Head-->
                    <!--begin::Body-->
                    <tbody class="fs-6">
                        @forelse ($data as $d)
                        <tr>
                            <td>{{ $d->created_at }}</td>
                            <td>{{ $d->user->name }}</td>
                            <td>
                                @if ($d->type == "credit")
                                    <span class="badge badge-light-success fw-bolder px-4 py-3">Credit</span>
                                @else
                                   <span class="badge badge-light-danger fw-bolder px-4 py-3">Debet</span>
                                @endif
                            </td>
                            <td>{{ $d->amount }}</td>
                            <td>{{ $d->balance }}</td>
                            <td>{{ $d->notes }}</td>
                            <td>
                                <a href="#" id="EditBalance" data-bs-toggle="modal" data-bs-target='#ModalForm' data-id="{{ $d->id }}"><span class="btn btn-dark btn-sm"><i class="fa fa-file"></i> Edit</span></a>
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


        <!--begin::Modal-->
        <div class="modal fade" id="ModalForm" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <div class="modal-content">
                    <div class="modal-body py-10 px-lg-17">
                    <form class="form" method="POST" action="{{route('balance.update')}}">
                    @csrf
                    <div class="m-header" id="kt_modal_add_customer_header">
                        <h2 class="fw-bolder">Edit Balance</h2>
                    </div>
                    <input type="text" class="form-control" id="id" name="id" placeholder="" value="{{$d->id}}" readonly style="display:none;">

                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Balance (USD)</label>
                    <input type="text" class="form-control" id="balance" name="balance" placeholder="" value="{{$d->balance}}">

                    <br><button type="submit" class="btn btn-success">Submit</button>

                    </form>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Modal-->

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

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="//unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>

$(document).ready(function () {

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('body').on('click', '#submit', function (event) {
    event.preventDefault()
    var id = $("#id").val();
    var balance = $("#balance").val();
   
    $.ajax({
      url: 'admin/balance-manager',
      type: "POST",
      data: {
        id: id,
        balance: balance,
      },
      dataType: 'json',
      success: function (data) {
          $('#ModalForm').modal('hide');
          window.location.reload(true);
      }
  });
});

$('body').on('click', '#EditBalance', function (event) {

    event.preventDefault();
    var id = $(this).data('id');
    console.log(id)
    $.get('admin/balance-manager/' + id + '/edit', function (data) {
         $('#ModalForm').modal('show');
         $('#id').val(data.data.id);
         $('#balance').val(data.data.balance);
     })
});

}); 
</script>