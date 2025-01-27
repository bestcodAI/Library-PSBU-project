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
                <div class="card-body no-print">
                    <div class="container">
                      <div class="form-group">
                                <label for="slug">{{__('admin.title')}}</label>
                                <input type="text" name="book_name" class="form-control" id="add_book" placeholder="{{__('admin.enter_title')}}" aria-describedby="books" autofocus>
                      </div>
                        <table class="table table-bordered no-print text-center">
                            <thead class="bg-primary">
                              <th>Books Name (Book barcode)</th>
                              <th>Quantity</th>
                              <th width="20px"><i class="fas fa-trash"></i></th>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    
                          <!-- /.col-->
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary no-print">{{__('admin.update')}}</button>
                  <button type="button" class="btn btn-danger no-print" id="reset_item">{{__('admin.reset')}}</button>
                </div>
              </form>
              {{-- barcode block --}}
                <div class="container">
                  @if($barcodes) 
                  <button type="button" class="btn btn-primary btn-block mb-2 no-print" onclick="window.print(); return false;">Print</button>
                        <div class="container">
                          <div class="row m-1">
                            @foreach($barcodes as $barcode)
                                 @for($i = 0; $i < $barcode['quantity']; $i++)
                                    <div style="border: 1px dotted gray;" class="text-center p-2 rounded m-1">
                                        <span>{{ $barcode['book_name']; }}</span><br>
                                        <img style="width: 130px;" src="data:image/png;base64,{!! DNS1D::getBarcodePNG($barcode["barcode"], "C128",1.5) !!}" alt="barcode" /><br>
                                        <span>{{ $barcode['barcode']; }}</span>
                                    </div>
                                  @endfor
                            @endforeach
                        </div>
                      </div>
                    @endif
                </div>
                {{-- end barcode --}}
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

{{-- <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script> --}}

<script>
  var count = 1;
  var bitems = JSON.parse(localStorage.getItem("bitems")) || {};
$(document).ready(function () {
    // If there is any item in localStorage
    if (localStorage.getItem("bitems")) {
        loadItems();
    }

    function loadItems() {
        if (localStorage.getItem("bitems")) {
            var tr_html = "";
            let i = 1;
            $.each(bitems, function (index, data) {
              tr_html += `<tr id="row_${index}" class="row_${index}" data-item-id="${index}">
                        <input type="hidden" value="${data.row.id}" name="book_id[]" id="book_id">
                        <input type="hidden" value="${data.row.code}" name="book_code[]" id="book_code[]">
                        <td>${data.row.title} (${data.row.code})</td>
                        <td><input type="text" name="quantity[]" class="form-control text-center rquantity" value="${data.row.qty}" data-id="${index}" data-item="${index}" id="quantity_${index}" onclick="this.select()">
                          </td>
                        <td><span class="brdel" style="cursor:pointer;"><i class="fas fa-times text-danger"></i></span></td>
                      </tr>`;
              $("tbody").empty().append(tr_html);
              i++;
            });
        }
    }

    /* --------------------------
     * Edit Row Quantity Method
    --------------------------- */
    var old_row_qty;
    $(document).on('focus', '.rquantity', function () {
            old_row_qty = $(this).val();
        })
        .on('change', '.rquantity', function () {
            var row = $(this).closest('tr');
            var item_id = row.attr('data-item-id');
            
            var new_qty = parseFloat($(this).val()),
                item_id = row.attr('data-item-id');
            bitems[item_id].row.qty = new_qty;
            localStorage.setItem('bitems', JSON.stringify(bitems));
            loadItems();
        });

    /* ----------------------
     * Delete Row Method
     * ---------------------- */

    $(document).on("click", ".brdel", function () {
        var row = $(this).closest("tr");
        var item_id = row.attr("data-item-id");
        delete bitems[item_id];
        localStorage.setItem("bitems", JSON.stringify(bitems));
        row.remove();
        if (britems.hasOwnProperty(item_id)) {
        } else {
            localStorage.setItem('bitems', JSON.stringify(bitems));
            loadItems();
            return;
        }
    });

    $("#add_book").autocomplete({
        source: function (request, response) {
            let term = request.term;
            $.ajax({
                type: "GET",
                url: `<?= admin_url('group_book/get_book_data/${term}'); ?>`,
                dataType: "json",
                success: function (data) {
                    $(this).removeClass("ui-autocomplete-loading");
                    response(data);
                },
            });
        },
        minLength: 1,
        autoFocus: false,
        delay: 250,
        response: function (event, ui) {
          
            if ($(this).val().length >= 16 && ui.content[0].id == 0) {
                // $("#add_item").focus();
                $(this).removeClass("ui-autocomplete-loading");
                $(this).removeClass("ui-autocomplete-loading");
                $(this).val("");
            } else if (ui.content.length == 1 && ui.content[0].id != 0) {
                ui.item = ui.content[0];
                $(this)
                    .data("ui-autocomplete")
                    ._trigger("select", "autocompleteselect", ui);
                $(this).autocomplete("close");
                $(this).removeClass("ui-autocomplete-loading");
            } else if (ui.content.length == 1 && ui.content[0].id == 0) {
                $(this).removeClass("ui-autocomplete-loading");
                $(this).val("");
            } 
        },
        select: function (event, ui) {
            event.preventDefault();
            if (ui.item.id !== 0) {
                var row = add_book(ui.item);
                if (row) {
                    $(this).val("");
                }
            } else {
                alert("no_data");
            }
        },
    });

    // add item to local storage
    function add_book(item) {
        if (item == null) return;

        var site = {"settings" : 0};

        var item_id = site.settings == 1 ? item.item_id : item.id;
        if (bitems[item_id]) {
            var new_qty = parseFloat(bitems[item_id].row.qty) + 1;
            // britems[item_id].row.base_quantity = new_qty;
            bitems[item_id].row.qty = new_qty;
        } else {
            bitems[item_id] = item;
        }

        bitems[item_id].order = new Date().getTime();

        localStorage.setItem('bitems', JSON.stringify(bitems));
        loadItems();
        return true;
    }

});

</script>


@endsection