$(document).ready(function() {

    var table = $('.js-dataTable-simple').DataTable({
        select: true,
        rowId: 'id',
        pageLength: 10,
        lengthMenu: false,
        searching: false,
        autoWidth: false,
        dom: "<'row'<'col-sm-12'tr>>" +
             "<'row'<'col-sm-6'i><'col-sm-6'p>>",
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: "/dtctztbl/dtctz?dasawisma={{ Session::get('dasawisma')}}",
        columns: [
            { data: 'nik'},
            { data: 'nama'},
            { data: 'rt'},
            { data: 'rw'},
            { data: 'kelurahan'},
            { data: 'kader'}
            
          ]
    });

    $('.js-dataTable-simple tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    } );


} );