@extends('layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Users</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Users</li>
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
                {{-- <h3 class="card-title"></h3> --}}
                <a class="btn btn-primary btn-sm" style="float: right" href="{{ admin_url('peoples/users/create') }}">Add</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>image</th>
                    <th>name</th>
                    <th>phone</th>
                    <th>email</th>
                    <th>skills</th>
                    <th>action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($users as $user)
                  <tr class="text-center">
                    <td><img width="50px" src="{{ $user->avatar ? asset('uploads/profile/'. $user->avatar) : asset('images/no_image.png');  }}"></td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->skills }}</td>
                    <td>
                        <button class="btn btn-info btn-sm view-modal" data-id="{{ $user->id  }}" data-toggle="modal" data-target="#modal-lg">view</button>
                        <a href="{{ admin_url('peoples/users/'. $user->id.'/edit') }}" class="btn btn-primary btn-sm">Edit</a>
                        <form  action="{{ admin_url('peoples/users/'. $user->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
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
