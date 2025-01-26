@extends('layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{__('admin.book_borrowing')}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">{{__('admin.home')}}</a></li>
              <li class="breadcrumb-item active">{{__('admin.category')}}</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with minimal features & hover style</h3>
                <a class="btn btn-primary btn-sm" style="float: right" href="{{ admin_url('borrowers/create') }}">{{__('admin.add_borrower')}}</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover text-center">
                  <thead>
                  <tr>
                    <th>{{__('admin.code')}}</th>
                    <th>{{__('admin.borrow_date')}}</th>
                    <th>{{__('admin.repayment_date')}}</th>
                    <th>{{__('admin.status')}}</th>
                    {{-- <th>{{__('admin.created')}}</th> --}}
                    <th>{{__('admin.action')}}</th>
                  </tr>
                  
                  </thead>
                  <tbody>
                    @foreach($borrowings as $borrowing)
                  <tr class="text-center">
                    <td>{{ $borrowing->reference_no }}</td>
                    <td>{{ $borrowing->start_date }}</td>
                    <td>{{ $borrowing->end_date }}</td>
                    <td>{!! checkStatus($borrowing->status) !!}</td>
                    <td>
                        <button class="btn btn-info btn-sm view-modal" data-id="{{ $borrowing->id}}" data-toggle="modal" data-target="#modal-lg"><i class="fas fa-eye"></i></button>
                        <a href="{{ admin_url('borrowers/'. $borrowing->id.'/edit') }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                        <form  action="{{ admin_url('borrowers/'. $borrowing->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                  </tr>
                  @endforeach
                  
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@if (session('remove_br')) 
    <script>
      if(localStorage.getItem('britems')) {
        localStorage.removeItem('britems');
      }

      if(localStorage.getItem('bstudent')) {
        localStorage.removeItem('bstudent');
      }
    </script>
    {{Session::forget('remove_br');}}
@endif

<script>

    var site =  {url: "<?= admin_url('borrowers/') ?>" , asset: "<?= asset('uploads/student/') ?>" }

    function htmlEntities(str) {
        return String(str).replace(/&/g, '&').replace(/</g, '<').replace(/>/g, '>').replace(/"/g, '"');
    }

    $(function () {
    $(document).on('click', '.view-modal', function () {
        var id = $(this).attr('data-id');
        var html = '';

        $(".modal-title").text('{{__("admin.student_details")}}');

        // alert(site.url);

        $.ajax({
            url: site.url + '/' + id,
            dataType: "json",
            type: "get",
            async: true,
            success: function (data) {    
                html += `
                <div class="row mb-4">
                  <div class="col-md-4">
                    <img src="${data.image ? site.asset + '/' + data.image : site.asset + '/no_image.png'}" alt="${data.name}" width="100%">
                  </div>
                  <div class="col-md-8">
                  
                    <table class="table table-bordered table-strip">
                      <tbody>
                        <tr>
                          <td>{{__('admin.code')}}</td>
                          <td>${data.borrow.reference_no}</td>
                        </tr>
                        <tr>
                          <td>{{__('admin.first_name')}}</td>
                          <td>${data.first_name}</td>
                        </tr>
                        <tr>
                          <td>{{__('admin.last_name')}}</td>
                          <td>${data.last_name}</td>
                        </tr>
                        ${(data.nick_name)  ? '<tr><td>{{__('admin.nick_name')}}</td><td>' + data.nick_name + '</td></tr>' : '' }
                        ${(data.gender)  ? '<tr><td>{{__('admin.gender')}}</td><td>' + data.gender +'</td></tr>' : '' }
                        ${(data.dob)  ? '<tr><td>{{__('admin.dob')}}</td><td>' + data.dob + '</td></tr>' : '' }
                        ${(data.pob)  ? '<tr><td>{{__('admin.pob')}}</td><td>' + data.pob + '</td></tr>' : '' }
                      </tbody>
                    </table>
                  </div>
                </div>
                `;
                $('.modal-body').empty().append(html);


              var qrcode = new QRCode("qrcode", {
                  text: data.code,
                  width: 50,
                  height: 50,
                  correctLevel : QRCode.CorrectLevel.L
              });

            JsBarcode("#barcode", data.code, {
              format: "CODE128",
              lineColor: "#0aa",
              width:1,
              height:40,
              displayValue: true
            });

            },
        });

    });
});
  </script>

  
  @include('components.modal-lg')
@stop
