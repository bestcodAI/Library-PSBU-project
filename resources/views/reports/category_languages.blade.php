@extends('layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ __('admin.book_report') }}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">{{ __('admin.home')}}</a></li>
              <li class="breadcrumb-item active">{{ __('admin.books') }}</li>
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
                {{-- <h3 class="card-title">DataTable with minimal features & hover style</h3> --}}
                <a class="btn btn-primary btn-sm" style="float: right" href="{{ admin_url('books/create') }}">{{__('admin.add_book')}}</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="book-table" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>{{ __('admin.image') }}</th>
                    <th>{{ __('admin.code') }}</th>
                    <th>{{ __('admin.title') }}</th>
                    <th>{{ __('admin.slug') }}</th>
                    <th>{{ __('admin.action') }}</th>
                  </tr>
                  
                  </thead>
                  <tbody>
                    @foreach($category_langs as $book)
                  <tr class="text-center">
                    <td><img width="50px" src="{{ $book->image ? asset('uploads/books/'. $book->image) : asset('images/no_image.png');  }}"></td>
                    <td>{{  $book->code }}</td>
                    <td>{{ $book->name }}</td>
                    <td>{{ $book->slug }}</td>
                    <td>
                        <button class="btn btn-info btn-sm view-modal" data-id="{{ $book->id}}" data-toggle="modal" data-target="#modal-lg">view</button>
                        <a href="{{ admin_url('categories/'. $book->id.'/edit') }}" class="btn btn-primary btn-sm">Edit</a>
                        <form  action="{{ admin_url('categories/'. $book->id) }}" method="post">
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
