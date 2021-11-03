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

            <!-- <div class="notice d-flex p-6">
                <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                    <div class="mb-3 mb-md-0 fw-bold">
                    <div class="fs-6 text-gray-700">
                    </div>
                    </div>
                    <a href="{{url('admin/users/add')}}" class="btn btn-primary px-6 align-self-center text-nowrap">+ Add New</a>
                </div>
            </div> -->

            <!-- <br> -->

            <!--begin::Table container-->
            <div class="table-responsive">
                <!--begin::Table-->
                <table id="kt_profile_overview_table" class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bolder">
                    <!--begin::Head-->
                    <thead class="fs-7 text-gray-400 text-uppercase">
                        <tr>
                            <th class="min-w-50px">Name</th>
                            <th class="min-w-50px">Email</th>
                            <th class="min-w-50px">Phone</th>
                            <th class="min-w-50px">Status</th>
                            <th class="min-w-50px">Registered</th>
                            <th class="min-w-50px">Actions</th>
                        </tr>
                    </thead>
                    <!--end::Head-->
                    <!--begin::Body-->
                    <tbody class="fs-6">
                        @forelse ($data as $d)
                        <tr>
                            <td>{{ $d->name }}</td>
                            <td>{{ $d->email }}</td>
                            <td>{{ $d->phone }}</td>
                            <td>
                                @php if ($d->status == 0) {
                                    $status = '<span class="badge badge-light-danger fw-bolder px-4 py-3">Inactive</span>';
                                } else if ($d->status == 1) {
                                    $status = '<span class="badge badge-light-success fw-bolder px-4 py-3">Active</span>';
                                } else {
                                    $status = '';
                                }
                                @endphp
                                {!! $status !!}
                            </td>
                            <td>{{ $d->created_at }}</td>
                            <td>
                                <a href="#" id="UserEdit" data-bs-toggle="modal" data-bs-target='#practice_modal' data-id="{{ $d->id }}"><span class="btn btn-dark btn-sm"><i class="fa fa-file"></i> Edit</span></a>
                                <a href="admin/user/{{$d->id}}/delete" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
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
    <div class="modal fade" id="practice_modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-body py-10 px-lg-17">
                <form class="form" method="POST" action="{{route('user.update')}}">
                @csrf
                <div class="m-header" id="kt_modal_add_customer_header">
                    <h2 class="fw-bolder">Edit User</h2>
                </div>
                <input type="text" class="form-control" id="id" name="id" placeholder="" value="{{$d->id}}" readonly style="display:none;">

                <label class="col-lg-4 col-form-label required fw-bold fs-6">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="" value="{{$d->name}}">

                <label class="col-lg-4 col-form-label required fw-bold fs-6">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="" value="{{$d->email}}">

                <label class="col-lg-4 col-form-label required fw-bold fs-6">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="" value="{{$d->phone}}">

                <label class="col-lg-4 col-form-label required fw-bold fs-6">Status</label>
                <select class="form-control" id="status" name="status">
                    <option value="1" {{($d->status =='1') ? 'selected' : ''}}> Active </option>
                    <option value="0" {{($d->status =='0') ? 'selected' : ''}}> Inactive </option>
                </select>

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
@stop


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
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
    var name = $("#name").val();
    var email = $("#email").val();
    var phone = $("#phone").val();
    var status = $("#status").val();
   
    $.ajax({
      url: 'admin/user',
      type: "POST",
      data: {
        id: id,
        name: name,
        email: email,
        phone: phone,
        status: status,
      },
      dataType: 'json',
      success: function (data) {
          
          $('#companydata').trigger("reset");
          $('#practice_modal').modal('hide');
          window.location.reload(true);
      }
  });
});

$('body').on('click', '#UserEdit', function (event) {

    event.preventDefault();
    var id = $(this).data('id');
    console.log(id)
    $.get('admin/user/' + id + '/edit', function (data) {
         //$('#userCrudModal').html("Edit category");
         $('#submit').val("Edit category");
         $('#practice_modal').modal('show');
         $('#id').val(data.data.id);
         $('#name').val(data.data.name);
         $('#email').val(data.data.email);
         $('#phone').val(data.data.phone);
         $('#status').val(data.data.status);
     })
});

}); 
</script>