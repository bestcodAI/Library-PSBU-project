
@extends('layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>System Settings</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">System Settings</li>
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
                <h3 class="card-title">Please update the information below. The field labels marked with * are required input fields.</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ admin_url('settings') }}" method="POST" enctype="multipart/form-data" >
                @csrf
                <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="site_name">Site name</label>
                            <input type="text" class="form-control" name="site_name" value="{{ $setting->site_name }}" id="site_name" placeholder="Site name">
                          </div>
                          <div class="form-group">
                            <label>Warehouse</label>
                            <select class="form-control select2" style="width: 100%;"  name="warehouse" id="warehouse">
                              @foreach($warehouses as $warehouse)
                              <option  value="{{ $warehouse->id }}" {{ $setting->default_warehouse  == $warehouse->id ? 'selected="selected"' :'' }} >{{ $warehouse->name }}</option>
                              @endforeach
  
                            </select>
                          </div>
                          <div class="form-group">
                            <label>Warehouse</label>
                            <select class="form-control select2" style="width: 100%;"  name="account" id="warehouse">
                              
                              <option  value="1" {{ $setting->default_warehouse  == $warehouse->name ? 'selected="selected"' :'' }} >{{ $warehouse->name }}</option>
                           
  
                            </select>
                          </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Lanuage</label>
                        <select class="form-control select2" style="width: 100%;"  name="language" id="language">
                          <option value="khmer" {{ $setting->language  == 'khmer'? 'selected="selected"' :'' }} >Khmer</option>
                          <option value="english" {{ $setting->language  == 'english'? 'selected="selected"' :'' }}>English</option>
                        </select>
                      </div>
                        <div class="form-group">
                            <label for="">language</label>
                            <input type="text" class="form-control" value="" placeholder="Lanuage">
                          </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Currency</label>
                        <select class="form-control select2" style="width: 100%;"  name="currency" id="currency">
                          @foreach($currencies as $currency)
                          <option value="{{ $currency->code }}" {{ $setting->default_currency  == $currency->code ? 'selected="selected"' :'' }} >{{ $currency->name }}</option>
                          @endforeach
                          {{-- <option value="english" {{ $setting->language  == 'english'? 'selected="selected"' :'' }}>English</option> --}}
                        </select>
                      </div>
                        <div class="form-group">
                            <label for="">language</label>
                            <input type="text" class="form-control" value="" placeholder="Lanuage">
                        </div>
                        <div class="form-group">
                          <label for="">language</label>
                          <input type="text" class="form-control" value="" placeholder="Lanuage">
                      </div>
                      <div class="form-group">
                        <label for="">language</label>
                        <input type="text" class="form-control" value="" placeholder="Lanuage">
                    </div>
                    <div class="form-group">
                      <label for="">language</label>
                      <input type="text" class="form-control" value="" placeholder="Lanuage">
                  </div>
                    </div>
                </div>
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image">
                        <label class="custom-file-label" for="image">Choose file</label>
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