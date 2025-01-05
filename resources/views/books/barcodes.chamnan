@extends('layouts.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{__('admin_print_barcode')}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">{{__('admin.home')}}</a></li>
              <li class="breadcrumb-item active">{{__('admin.print_barcode')}}</li>
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
              <div class="card-header no-print">
                <h3 class="card-title">Please fill in the information below. The field labels marked with * are required input fields.</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" action="{{ admin_url('group_book/print_barcodes') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <input type="hidden" name="form_type" value="1">
                <div class="card-body">
                    <div class="container">
                        <div class="row no-print">
                          <div class="col-md-4">

                            <div class="form-group">
                              <label>{{__('admin.code')}}</label>
                              <select class="form-control select2bs4" id="code" style="width: 100%;">
                                <option disabled selected>{{__('admin.select_code')}}</option>
                                @foreach($books as $book)
                                <option value="{{$book->title}}">{{$book->title}} ( {{$book->code}} )</option>
                                @endforeach
                    
                              </select>
                            </div>
                                        {{-- <div class="form-group view">
                                <label for="code">{{__('admin.code')}}</label>
                                <input type="text" name="code" class="form-control add_books" id="code"  placeholder="{{__('admin.enter_book_code')}}">
                                <div style="background: #d6d9d2; margin: 1px; border-radius: 2px;" id="suggesstion-box"></div>
                            </div> --}}
                            
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                              <label>{{__('admin.title')}}</label>
                              <select class="form-control select2bs4" id="title" style="width: 100%;">
                                <option disabled selected>{{__('admin.select_code')}}</option>
                                @foreach($books as $book)
                                <option>{{$book->title}} ( {{$book->code}} )</option>
                                @endforeach
                    
                              </select>
                            </div>
                          {{-- <div class="form-group">
                                <label for="name">{{__('admin.title')}}</label>
                                <input type="text" name="title" class="form-control add_books" id="title" placeholder="{{__('admin.enter_book_title')}}">
                              </div> --}}
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="slug">{{__('admin.slug')}}</label>
                                <input type="text" name="slug" class="form-control add_books" id="slug" placeholder="{{__('admin.enter_book_slug')}}">
                            </div>
                            
                        </div>
                        </div>

                        <table class="table table-bordered no-print">
                            <thead class="bg-primary">
                              <th>Books Name(Book barcode)</th>
                              <th>Quantity</th>
                              <th>Variant</th>
                              <th width="20px"><i class="fas fa-trash"></i></th>
                            </thead>
                            <tbody>
                              <tr>
                                <td>Book 1(829929292)</td>
                                <td class="col-2"><input type="text" class="form-control text-center" value="2"></td>
                                <td class="col-4">testing</td>
                                <td><a href="#" class="text-danger" title="Remove"><i class="fas fa-times"></i></a></td>
                              </tr>
                               <tr>
                                <td>Book 2</td>
                                <td class="col-2"><input type="text" class="form-control text-center" value="2"></td>
                                <td class="col-4">testing</td>
                                <td> <a href="#" class="text-danger" title="Remove"><i class="fas fa-times"></i></a></td>
                              </tr>
                            </tbody>
                        </table>
                        
                        {{-- barcode block --}}
                        <button type="button" class="btn btn-primary btn-block mb-2 no-print" onclick="window.print(); return false;">Print</button>
                        <div class="container border rounded">
                          <div class="row m-2">
                            <div class="border text-center p-2 rounded m-1">
                                <span>Khmer history book</span><br>
                                <span>Price: $20</span><br>
                                <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG('PSBU-0001', 'C128',1.4,22) }}" alt="barcode" /><br>
                                <span>PSBU-0001</span>
                            </div>
                            <div class="border text-center p-2 rounded m-1">
                                <span>Khmer history book</span><br>
                                <span>Price: $20</span><br>
                                <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG('PSBU-0001', 'C128',1.4,22) }}" alt="barcode" /><br>
                                <span>PSBU-0001</span>
                            </div>
                            <div class="border text-center p-2 rounded m-1">
                                <span>Khmer history book</span><br>
                                <span>Price: $20</span><br>
                                <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG('PSBU-0001', 'C128',1.4,22) }}" alt="barcode" /><br>
                                <span>PSBU-0001</span>
                            </div>
                            <div class="border text-center p-2 rounded m-1">
                                <span>Khmer history book</span><br>
                                <span>Price: $20</span><br>
                                <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG('PSBU-0001', 'C128',1.4,22) }}" alt="barcode" /><br>
                                <span>PSBU-0001</span>
                            </div>
                            <div class="border text-center p-2 rounded m-1">
                                <span>Khmer history book</span><br>
                                <span>Price: $20</span><br>
                                <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG('PSBU-0001', 'C128',1.4,22) }}" alt="barcode" /><br>
                                <span>PSBU-0001</span>
                            </div>
                            <div class="border text-center p-2 rounded m-1">
                                <span>Khmer history book</span><br>
                                <span>Price: $20</span><br>
                                <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG('PSBU-0001', 'C128',1.4,22) }}" alt="barcode" /><br>
                                <span>PSBU-0001</span>
                            </div>
                            <div class="border text-center p-2 rounded m-1">
                                <span>Khmer history book</span><br>
                                <span>Price: $20</span><br>
                                <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG('PSBU-0001', 'C128',1.4,22) }}" alt="barcode" /><br>
                                <span>PSBU-0001</span>
                            </div>
                            <div class="border text-center p-2 rounded m-1">
                                <span>Khmer history book</span><br>
                                <span>Price: $20</span><br>
                                <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG('PSBU-0001', 'C128',1.4,22) }}" alt="barcode" /><br>
                                <span>PSBU-0001</span>
                            </div>
                            <div class="border text-center p-2 rounded m-1">
                                <span>Khmer history book</span><br>
                                <span>Price: $20</span><br>
                                <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG('PSBU-0001', 'C128',1.4,22) }}" alt="barcode" /><br>
                                <span>PSBU-0001</span>
                            </div>
                            <div class="border text-center p-2 rounded m-1">
                                <span>Khmer history book</span><br>
                                <span>Price: $20</span><br>
                                <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG('PSBU-0001', 'C128',1.4,22) }}" alt="barcode" /><br>
                                <span>PSBU-0001</span>
                            </div>
                            <div class="border text-center p-2 rounded m-1">
                                <span>Khmer history book</span><br>
                                <span>Price: $20</span><br>
                                <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG('PSBU-0001', 'C128',1.4,22) }}" alt="barcode" /><br>
                                <span>PSBU-0001</span>
                            </div>
                            <div class="border text-center p-2 rounded m-1">
                                <span>Khmer history book</span><br>
                                <span>Price: $20</span><br>
                                <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG('PSBU-0001', 'C128',1.4,22) }}" alt="barcode" /><br>
                                <span>PSBU-0001</span>
                            </div>
                            <div class="border text-center p-2 rounded m-1">
                                <span>Khmer history book</span><br>
                                <span>Price: $20</span><br>
                                <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG('PSBU-0001', 'C128',1.4,22) }}" alt="barcode" /><br>
                                <span>PSBU-0001</span>
                            </div>
                            <div class="border text-center p-2 rounded m-1">
                                <span>Khmer history book</span><br>
                                <span>Price: $20</span><br>
                                <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG('PSBU-0002', 'C128',1.4,22) }}" alt="barcode" /><br>
                                <span>PSBU-0002</span>
                            </div>
                            <div class="border text-center p-2 rounded m-1">
                                <span>Khmer history book</span><br>
                                <span>Price: $20</span><br>
                                <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG('PSBU-0003', 'C128',1.4,22) }}" alt="barcode" /><br>
                                <span>PSBU-0003</span>
                            </div>
                            <div class="border text-center p-2 rounded m-1">
                                <span>Khmer history book</span><br>
                                <span>Price: $20</span><br>
                                <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG('PSBU-0004', 'C128',1.4,22) }}" alt="barcode" /><br>
                                <span>PSBU-0004</span>
                            </div>
                            <div class="border text-center p-2 rounded m-1">
                                <span>Khmer history book</span><br>
                                <span>Price: $20</span><br>
                                <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG('PSBU-0005', 'C128',1.4,22) }}" alt="barcode" /><br>
                                <span>PSBU-0005</span>
                            </div>
                            <div class="border text-center p-2 rounded m-1">
                                <span>Khmer history book</span><br>
                                <span>Price: $20</span><br>
                                <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG('PSBU-0006', 'C128',1.4,22) }}" alt="barcode" /><br>
                                <span>PSBU-0006</span>
                            </div>
                            <div class="border text-center p-2 rounded m-1">
                                <span>Khmer history book</span><br>
                                <span>Price: $20</span><br>
                                <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG('PSBU-0007', 'C128',1.4,22) }}" alt="barcode" /><br>
                                <span>PSBU-0007</span>
                            </div>
                            <div class="border text-center p-2 rounded m-1">
                                <span>Khmer history book</span><br>
                                <span>Price: $20</span><br>
                                <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG('PSBU-0008', 'C128',1.4,22) }}" alt="barcode" /><br>
                                <span>PSBU-0008</span>
                            </div>
                            <div class="border text-center p-2 rounded m-1">
                                <span>Khmer history book</span><br>
                                <span>Price: $20</span><br>
                                <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG('PSBU-0009', 'C128',1.4,22) }}" alt="barcode" /><br>
                                <span>PSBU-0009</span>
                            </div>
                            <div class="border text-center p-2 rounded m-1">
                                <span>Khmer history book</span><br>
                                <span>Price: $20</span><br>
                                <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG('PSBU-0010', 'C128',1.4,22) }}" alt="barcode" /><br>
                                <span>PSBU-0010</span>
                            </div>
                            <div class="border text-center p-2 rounded m-1">
                                <span>Khmer history book</span><br>
                                <span>Price: $20</span><br>
                                <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG('PSBU-0011', 'C128',1.4,22) }}" alt="barcode" /><br>
                                <span>PSBU-0011</span>
                            </div>
                            <div class="border text-center p-2 rounded m-1">
                                <span>Khmer history book</span><br>
                                <span>Price: $20</span><br>
                                <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG('PSBU-0012', 'C128',1.4,22) }}" alt="barcode" /><br>
                                <span>PSBU-0012</span>
                            </div>
                        </div>
                        </div>
                          <!-- /.col-->
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary no-print">Submit</button>
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


<script>
  $(document).ready(function() {
    $('#code').change(function() {
      let code = $(this).val();
      alert(code);
    })
  });

  function loadItem() {
    alert('item');
  }
</script>

@endsection