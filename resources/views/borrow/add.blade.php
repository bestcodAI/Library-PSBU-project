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
              <form id="quickForm" action="{{ admin_url('borrowers') }}" method="POST" enctype="multipart/form-data">
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
                              <label for="bstudent">{{__('admin.students')}}</label>
                              <select class="form-control select2" name="student_id" id="bstudent" style="width: 100%;">
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
                              <input type="text" name="books" id="add_item" class="form-control form-control-lg border-none" placeholder="search book here" aria-describedby="books" autofocus>
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
                                
                                {{-- <tr>
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
                                </tr> --}}
                              </tbody>
                              {{-- <tfoot>
                                <tr>
                                  <td colspan="3">Total items</td>
                                  <td>$180</td>
                                </tr>
                                
                              </tfoot> --}}
                            </table>
                          </div>
                        </div>
                        
                        <div class="col-md-12 mt-4">
                            <div class="card card-outline card-info">
                              <div class="card-header">
                                <h3 class="card-title">
                                  {{__('admin.description')}}
                                </h3>
                              </div>
                               <textarea id="summernote" name="description"></textarea>
                              {{-- <div class="card-body">
                               
                              </div> --}}
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

  var britems = JSON.parse(localStorage.getItem("britems")) || {};


  // Define the unique key and object to store
// const newKey = "2503da23d635ce491564f6c98551b5be7d463733";
// const newValue = {
//   id: "2503da23d635ce491564f6c98551b5be7d463733"
// };

// // Retrieve existing data from localStorage or initialize an empty object
// let storageData = JSON.parse(localStorage.getItem("myStorageKey")) || {};

// // Add the new key-value pair
// storageData[newKey] = newValue;

// // Save the updated object back to localStorage
// localStorage.setItem("myStorageKey", JSON.stringify(storageData));

// console.log("Data saved:", storageData);

$(document).ready(function () {

  
    // If there is any item in localStorage
    if (localStorage.getItem("britems")) {
        loadItems();
    }

    function loadItems() {
        if (localStorage.getItem("britems")) {
            // britems = JSON.parse(localStorage.getItem("britems"));

            var tr_html = "";
            let i = 1;
            $.each(britems, function (index, data) {
              tr_html += `<tr id="row_${index}" class="row_${index}" data-item-id="${index}">
                        <th scope="row">${i}</th>
                        <td>${data.row.code}</td>
                        <td>${data.row.title}</td>
                        <td><input type="text" class="form-control text-center rquantity" value="${data.row.qty}" data-id="${index}" data-item="${index}" id="quantity_${index}" onclick="this.select()">
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
            // if (!is_numeric($(this).val())) {
            //     // $(this).val(old_row_qty);
            //     alert('unexpected_value');
            //     // bootbox.alert(lang.unexpected_value);
            //     return;
            // }
            var new_qty = parseFloat($(this).val()),
                item_id = row.attr('data-item-id');
            britems[item_id].row.qty = new_qty;
            localStorage.setItem('britems', JSON.stringify(britems));
            loadItems();
        });

    /* ----------------------
     * Delete Row Method
     * ---------------------- */

    $(document).on("click", ".brdel", function () {
        var row = $(this).closest("tr");
        var item_id = row.attr("data-item-id");
        delete britems[item_id];
        localStorage.setItem("britems", JSON.stringify(britems));
        row.remove();
        if (britems.hasOwnProperty(item_id)) {
        } else {
            localStorage.setItem('britems', JSON.stringify(britems));
            loadItems();
            return;
        }
    });

    $("#add_item").autocomplete({
        source: function (request, response) {

            if (!$('#bstudent').val()) {
                $('#add_item').val('').removeClass('ui-autocomplete-loading');
                alert('select_above');
                $('#add_item').focus();
                return false;
            }
            let term = request.term;
            $.ajax({
                type: "GET",
                url: `<?= admin_url('borrowers/get_data/${term}'); ?>`,
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
                var row = add_item(ui.item);
                if (row) {
                    $(this).val("");
                }
            } else {
                alert("no_data");
            }
        },
    });

    // add item to local storage
    function add_item(item) {

        if (count == 1) {
            if ($('#bstudent').val()) {
              $("#bstudent").prop("disabled", true);
            } else {

              alert('select_student_above');
                // bootbox.alert(lang.select_above);
                item = null;
                return;
            }
        }

        if (item == null) return;

        var site = {"settings" : 0};

        var item_id = site.settings == 1 ? item.item_id : item.id;
  
        if (britems[item_id]) {
            var new_qty = parseFloat(britems[item_id].row.qty) + 1;
            // britems[item_id].row.base_quantity = new_qty;
            britems[item_id].row.qty = new_qty;
        } else {
            britems[item_id] = item;
        }

        britems[item_id].order = new Date().getTime();

        localStorage.setItem('britems', JSON.stringify(britems));
        loadItems();
        return true;
    }

});

</script>

@endsection