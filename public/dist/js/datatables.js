$(function () {

    // $("#book-table").DataTable({
    //     "responsive": true, "lengthChange": true, "autoWidth": true,
    //     "buttons": ["copy", "csv", "excel", "pdf", "print"]
    // }).buttons().container().appendTo('#book-table_wrapper .col-md-6:eq(0)');

    $('#table-category').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });

    $('#book-table').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });

    $('#category-table').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });

    // for data report
    // $("#table-category").DataTable({
    //   "responsive": true, "lengthChange": false, "autoWidth": true,
    //   "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    // }).buttons().container().appendTo('#table-category_wrapper .col-md-6:eq(0)');
});