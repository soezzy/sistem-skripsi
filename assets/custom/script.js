$(document).ready(function (){
    $("#manageMemberTable").DataTable({         
        "order": [[0, 'asc']],

        "oLanguage": {
          "sLengthMenu" : " _MENU_ data",
          "sSearch" : "Cari :",
          "sZeroRecords" : "Data tidak ditemukan",
          "sInfo" : "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
          "sInfoEmpty" : "Menampilkan 0 sampai 0 dari 0 data",
          "sInfoFiltered" : "(dari _MAX_ total data)",
          "oPaginate" : {
              "sPrevious" : "<<",
              "sNext" : ">>"
          }
        }
    });
});
