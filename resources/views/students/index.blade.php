@extends('layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{__('admin.students')}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">{{__('admin.home')}}</a></li>
              <li class="breadcrumb-item active">{{__('admin.students')}}</li>
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
                <a class="btn btn-primary btn-sm" style="float: right" href="{{ admin_url('peoples/students/create') }}">{{__('admin.add_student')}}</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>{{__('admin.image')}}</th>
                    <th>{{__('admin.reference_no')}}</th>
                    <th>{{__('admin.first_name')}}</th>
                    <th>{{__('admin.last_name')}}</th>
                    <th>{{__('admin.nick_name')}}</th>
                    <th>{{__('admin.gender')}}</th>
                    <th>{{__('admin.action')}}</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($students as $student)
                  <tr class="text-center">
                    <td><img width="50px" src="{{ $student->image ? asset('uploads/category/'. $student->image) : asset('images/no_image.png');  }}"></td>
                    <td>{{ $student->code }}</td>
                    <td>{{ $student->first_name }}</td>
                    <td>{{ $student->last_name }}</td>
                    <td>{{ $student->nick_name }}</td>
                    <td>{{ $student->dob }}</td>
                    <td>
                        <button class="btn btn-info btn-sm view-modal" data-id="{{ $student->id}}" data-toggle="modal" data-target="#modal-lg"><i class="fas fa fa-eye"></i></button>
                        <a href="{{ admin_url('peoples/students/'. $student->id.'/edit') }}" class="btn btn-primary btn-sm"><i class="fas fa fa-edit"></i></a>
                        <form  action="{{ admin_url('peoples/students/'. $student->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa fa-trash"></i></button>
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
