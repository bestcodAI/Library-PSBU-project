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
                <a class="btn btn-primary btn-sm" style="float: right" href="{{ admin_url('categories/create') }}">Add</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>image</th>
                    <th>code</th>
                    <th>name</th>
                    <th>slug</th>
                    <th>Parent</th>
                    <th>action</th>
                  </tr>
                  
                  </thead>
                  <tbody>
                    @foreach($borrowings as $borrowing)
                  <tr class="text-center">
                    <td>{{  $borrowing->reference_no }}</td>
                    <td>{{ $borrowing->book_name }}</td>
                    <td>{{ $borrowing->student_name }}</td>
                    <td>{{ $borrowing->quantity }}</td>
                    <td>
                        <button class="btn btn-info btn-sm view-modal" data-id="{{ $category->id}}" data-toggle="modal" data-target="#modal-lg"><i class="fas fa-eye"></i></button>
                        <a href="{{ admin_url('categories/'. $borrowing->id.'/edit') }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                        <form  action="{{ admin_url('categories/'. $borrowing->id) }}" method="post">
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
  @include('components.modal-lg')
@stop
