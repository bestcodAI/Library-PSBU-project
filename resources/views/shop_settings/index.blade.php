
@extends('layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Shop Settings</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Shop Settings</li>
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
              <form action="{{ admin_url('shop_settings') }}" method="POST" enctype="multipart/form-data" >
                @csrf
                @method('POST')
                <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="site_name">Shop name</label>
                            <input type="text" class="form-control" name="shop_name" value="{{ $shop_setting->shop_name }}" id="shop_name" placeholder="shop name">
                          </div>
                          <div class="form-group">
                            <label for="site_name">Shop description</label>
                            <input type="text" class="form-control" name="shop_description" value="{{ $shop_setting->description }}" id="shop_description" placeholder="Shop Description">
                          </div>
                          <div class="form-group">
                            <label for="site_name">Product page description</label>
                            <input type="text" class="form-control" name="product_page" value="{{ $shop_setting->products_description }}" id="product_page" placeholder="Product page">
                          </div>
                          <div class="form-group">
                            <label for="site_name">Phone</label>
                            <input type="text" class="form-control" name="phone" value="{{ $shop_setting->phone }}" id="phone" placeholder="Phone number">
                          </div>
                          
                          <div class="form-group">
                            <label for="site_name">Email</label>
                            <input type="text" class="form-control" name="email" value="{{ $shop_setting->email }}" id="email" placeholder="Email">
                          </div>

                          <div class="form-group">
                            <label for="site_name">Payment text</label>
                            <input type="text" class="form-control" name="payment_text" value="{{ $shop_setting->payment_text }}" id="payment_text" placeholder="Payment text">
                          </div>
                          
                          <div class="form-group">
                            <label>Private shop(for member only)</label>
                            <select class="form-control select2" style="width: 100%;"  name="private_shop" id="private_shop">
                              <option  value="0" {{ ($shop_setting->private == 0) ? 'selected': '' }}>No</option>
                              <option  value="1" {{ ($shop_setting->private == 1) ? 'selected': '' }}>Yes</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="site_name">Keyworkd</label>
                            <input type="text" class="form-control" name="key_word" id="key_word" value="{{ $shop_setting->keyword }}" id="key_word" placeholder="Keywork">
                          </div>
                          <div class="form-group">
                            <label for="site_name">Address</label>
                            <input type="text" class="form-control" name="address" id="address" value="{{ $shop_setting->address }}" id="address" placeholder="Address">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputFile">Logo</label>
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" id="logo" name="logo">
                                <label class="custom-file-label" for="image">Choose file</label>
                              </div>
                             
                            </div>
                          </div>
                          {{-- <div class="form-group">
                            <label>Warehouse</label>
                            <select class="form-control select2" style="width: 100%;"  name="account" id="warehouse">
                              
                              <option  value="1" {{ $shop_setting->default_warehouse  == $warehouse->name ? 'selected="selected"' :'' }} >{{ $warehouse->name }}</option>
                           
  
                            </select>
                          </div> --}}
                    </div>
    
                    <div class="col-md-6">
                      
                        <div class="form-group">
                            <label for="">Shipping</label>
                            <input type="text" class="form-control" name="shipping" value="0" id="shipping" placeholder="Shipping">
                        </div>
                        <div class="form-group">
                        <label>Warehouse</label>
                        <select class="form-control select2" style="width: 100%;"  name="warhouse_name" id="warehous_name">
                          @foreach($warehouses as $warehouse)
                          <option value="{{ $warehouse->id }}" {{ $warehouse->id  == $shop_setting->warehouse ? 'selected="selected"' :'' }} >{{ $warehouse->name }}</option>
                          @endforeach
                          {{-- <option value="english" {{ $setting->language  == 'english'? 'selected="selected"' :'' }}>English</option>  --}}
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Billers</label>
                        <select class="form-control select2" style="width: 100%;"  name="biller" id="biller">
                          @foreach($billers as $bill)
                          <option value="{{ $bill->id }}" {{ $bill->id  == $shop_setting->biller ? 'selected="selected"' :'' }} >{{ $bill->name }}</option>
                          @endforeach
                          {{-- <option value="english" {{ $setting->language  == 'english'? 'selected="selected"' :'' }}>English</option>  --}}
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="">Follow text</label>
                        <input type="text" class="form-control" name="follow_text" id="follow_text" value="{{ $shop_setting->follow_text }}" placeholder="Follow text">
                    </div>
                        <div class="form-group">
                          <label for="">Facebook</label>
                          <input type="text" class="form-control" name="facebook" value="{{ $shop_setting->facebook }}" placeholder="Facebook">
                      </div>
                      <div class="form-group">
                        <label for="">Twitter</label>
                        <input type="text" class="form-control" name="twitter" value="{{ $shop_setting->twitter }}" id="twitter" placeholder="Twitter">
                    </div>
                    <div class="form-group">
                      <label for="">Googel plus</label>
                      <input type="text" class="form-control" name="google_plus" id="google_plus" value="{{ $shop_setting->google_plus }}" placeholder="google plus">
                  </div>
                  <div class="form-group">
                      <label for="">Instagram</label>
                      <input type="text" class="form-control" name="instagram"  id="instagram" value="{{ $shop_setting->instagram }}" placeholder="Instagram">
                  </div>
                  <div class="form-group">
                    <label for="">Message Cookie</label>
                    <input type="text" class="form-control" name="message_cookie" id="message_cookie" value="{{ $shop_setting->cookie_message }}" placeholder="Messge cookie">
                </div>
                <div class="form-group">
                  <label for="">Cookie Link</label>
                  <input type="text" class="form-control" name="cookie_link" id="cookie_link" value="{{ $shop_setting->cookie_link }}" placeholder="Cookie Link">
              </div>
                </div>
                </div>
                  <div class="col-md-12">
                    <div class="card card-outline card-info">
                      <div class="card-header">
                        <h3 class="card-title">
                          Bank details
                        </h3>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                        <textarea id="summernote" name="bank_details" id="bank_destails"></textarea>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
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