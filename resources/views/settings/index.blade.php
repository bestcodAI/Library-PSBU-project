
@extends('layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{__('admin.system_settings')}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">{{__('admin.home')}}</a></li>
              <li class="breadcrumb-item active">{{__('admin.system_settings')}}</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">{{__('admin.in_required')}}</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ admin_url('settings') }}" method="POST" enctype="multipart/form-data" >
                @csrf
                <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="site_name">{{__('admin.site_name')}}</label>
                            <input type="text" class="form-control" name="site_name" value="{{ $setting->site_name }}" id="site_name" placeholder="Site name">
                          </div>
                          <div class="form-group">
                            <label for="student_prefix">{{__('admin.student_prefix')}}</label>
                            <input type="text" class="form-control" id="student_prefix" name="student_prefix" placeholder="{{__('student_prefix')}}">
                          </div>
                          
                          <div class="form-group">
                            <label for="lat">{{__('admin.lat')}}</label>
                            <input type="text" class="form-control" id="lng" name="lat" value="" placeholder="{{__('admin.lat')}}">
                        </div>
                    
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>{{__('admin.language')}}</label>
                        <select class="form-control select2" style="width: 100%;"  name="language" id="language">
                          <option value="khmer" {{ $setting->language  == 'khmer'? 'selected="selected"' :'' }} >Khmer</option>
                          <option value="english" {{ $setting->language  == 'english'? 'selected="selected"' :'' }}>English</option>
                        </select>
                      </div>

                      <div class="form-group">
                            <label for="">{{__('admin.book_prefix')}}</label>
                            <input type="text" class="form-control" name="book_prefix" id="book_prefix" value="" placeholder="{{__('admin.book_prefix')}}">
                      </div>

                      <div class="form-group">
                            <label for="lng">{{__('admin.lng')}}</label>
                            <input type="text" id="lng" class="form-control" name="lng" value="" placeholder="{{__('admin.lng')}}">
                        </div>
                        
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                          <label for="borrow_prefix">{{__('admin.borrow_prefix')}}</label>
                          <input type="text" class="form-control" id="borrow_prefix" value="" name="borrow_prefix" placeholder="{{__('admin.borrow_prefix')}}">
                      </div>
                      <div class="form-group">
                        <label for="attandence_prefix">{{__('admin.attandence_prefix')}}</label>
                        <input type="text" class="form-control" id="attandence_prefix" name="attandence_prefix" value="" placeholder="{{__('admin.attandence_prefix')}}">
                    </div>

                      <div class="form-group">
                      <label for="exampleInputFile">{{__('admin.logo')}}</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="image" name="image">
                          <label class="custom-file-label" for="image">{{__('admin.choose_file')}}</label>
                        </div>
                      
                      </div>
                    </div>
                    
                    </div>
                </div>
                  

                  <div class="col-md-12">
                    <div class="card card-outline card-info">
                      <div class="card-header">
                        <h3 class="card-title">
                          {{__('admin.description')}}
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
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
      
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @stop