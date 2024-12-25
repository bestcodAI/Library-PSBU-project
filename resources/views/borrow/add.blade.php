@extends('layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{__('admin.add_book_borrowing')}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">{{__('admin.home')}}</a></li>
              <li class="breadcrumb-item active">{{__('admin.add_book_borrowing')}}</li>
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
              <form id="quickForm" action="{{ admin_url('categories') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="card-body">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                            <label for="reference_no">{{__('admin.date')}}</label>
                            <input type="date" name="date" class="form-control" value="{{ date('Y-m-d')}}" id="date">
                        </div>
                      </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="reference_no">{{__('admin.reference_no')}}</label>
                                <input type="text" name="reference_no" class="form-control" id="reference_no"  placeholder="Enter reference_no">
                            </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                              <label>{{__('admin.students')}}</label>
                              <select class="form-control select2" name="student_id" id="student_id" style="width: 100%;">
                                <option value="" disabled selected>{{__('admin.select_student')}}</option>
                                @foreach($students as $student)
                                <option value="{{ $student->id }}">{{ $student->first_name.' '. $student->last_name; }}</option>
                                @endforeach
                              </select>
                          </div>
                        </div>
                        <div class="col-md-12 mb-4 mt-4">
                          <div class="card">
                            <div class="form-group  m-2">
                              <div class="input-group">
                              <span class="input-group-text" id="books"><i class="fas fa-barcode" style="font-size: 30px;"></i></span>
                              <input type="text" name="books" id="books" class="form-control form-control-lg border-none" placeholder="search book here" aria-describedby="books">
                            </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-12">
                          <h4>Items</h4>
                          <div class="">
                            <table class="table table-striped table-bordered no-print text-center">
                              <thead class="bg-primary">
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">{{__('admin.code')}}</th>
                                  <th scope="col">{{__('title')}}</th>
                                  <th scope="col">{{__('quantity')}}</th>
                                  <th scope="col"><i class="fas fa-trash"></i></th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <th scope="row">1</th>
                                  <td>0293322</td>
                                  <td>Books1</td>
                                  <td><input type="text" class="form-control"></td>
                                  <td><i class="fas fa-times text-danger"></i></td>
                                </tr>
                                <tr>
                                  <th scope="row">2</th>
                                  <td>Jacob</td>
                                  <td>Thornton</td>
                                  <td><input type="text" class="form-control"></td>
                                  <td><i class="fas fa-times text-danger"></i></td>
                                </tr>
                                <tr>
                                  <th scope="row">3</th>
                                  <td>Larry</td>
                                  <td>the Bird</td>
                                  <td><input type="text" class="form-control"></td>
                                  <td><i class="fas fa-times text-danger"></i></td>
                                </tr>
                              </tbody>
                              <tfoot>
                                <tr>
                                  <td colspan="3">Total items</td>
                                  <td>$180</td>
                                </tr>
                                
                              </tfoot>
                            </table>
                          </div>
                        </div>
                        
                        <div class="col-md-12 mt-4">
                            <div class="card card-outline card-info">
                              <div class="card-header">
                                <h3 class="card-title">
                                  Description
                                </h3>
                              </div>
                              <!-- /.card-header -->
                              <div class="card-body">
                                <textarea id="summernote" name="description"></textarea>
                              </div>
                              <div class="card-footer">
                    
                              </div>
                            </div>
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