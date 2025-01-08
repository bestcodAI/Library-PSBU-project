@extends('layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit user</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit user</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Please fill in the information below. The field labels marked with * are required input fields.</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" action="{{ admin_url('peoples/users/'. $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" value="{{ $user->name }}" class="form-control" id="name"  placeholder="Enter name">
                            </div>
                            <div class="form-group">
                                <label for="name">Email</label>
                                <input type="email" name="email" value="{{ $user->email }}" class="form-control" id="name" placeholder="Enter email">
                              </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" value="{{ $user->phone }}" class="form-control" id="phone" placeholder="Enter Phone">
                            </div>
                            
                            {{-- <div class="form-group">
                                <label>Parent</label>
                                <select class="form-control select2" name="parent" id="parent" style="width: 100%;">
                                  <option>Select Parent cateory</option>
                                  @foreach($categories as $cate)
                                  <option value="{{ $cate->id }}" {{$user->parent_id == $cate->id ? 'selected' : ''}}>{{ $cate->name }}</option>
                                  @endforeach
                                </select>
                            </div> --}}
                        </div>
                        <div class="col-md-12">
                            {{-- <div class="card card-outline card-info">
                              <div class="card-header">
                                <h3 class="card-title">
                                  Description
                                </h3>
                              </div>
                              <!-- /.card-header -->
                              <div class="card-body">
                                <textarea id="summernote" name="description">{{ html_entity_decode($category->description) }}</textarea>
                              </div>
                              <div class="card-footer">
                    
                              </div>
                            </div> --}}
                          </div>
                          <!-- /.col-->
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@stop