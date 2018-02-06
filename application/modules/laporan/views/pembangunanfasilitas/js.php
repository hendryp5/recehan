<script type="text/javascript">

var table;
 
$(document).ready(function() {
table = $('#tableID2').DataTable({
      processing:true,
      serverSide:true,

     ajax: {
            url: "<?php echo site_url('laporan/stokkavling/ajax_list') ;?>",
            type: "POST",
            async: false,
            data : function (data){
                data.type = $('#type').val();
                data.status = $('#status').val();
                data.tokensys = key
                }
        },

      paging: true,
      lengthChange: false,
      searching: true,
      ordering: true,
      info: true,
      autoWidth: true,
      language: {
        lengthMenu: "Tampilkan _MENU_ Baris",
        zeroRecords: "Maaf - Data Tidak Ditemukan",
        info: "Lihat Halaman _PAGE_ Dari _PAGES_",
        infoEmpty: "Tidak Ada Data Tersedia",
        infoFiltered: "(filtered from _MAX_ total records)",
        paginate: {
            first:"Awal",
            last:"Akhir",
            next:"Lanjut",
            previous:"Sebelum"
            },
        search:"Pencarian:",
        searchPlaceholder: "Nomor Kavling",
        },
	  responsive: true,
        columnDefs: [
            { 
                targets:[ 0 ],
		    orderable: false,
		    responsivePriority: 1
            },
            { 
                targets:[ -1 ],
                orderable: false,
		    responsivePriority: 2
            },
        ]
    });
});

$('#btn-filter').click(function(){ //button filter event click
        table.ajax.reload();  //just reload table
    });
$('#btn-reset').click(function(){ //button reset event click
        $('#form-filter')[0].reset();
        table.ajax.reload();  //just reload table
});

$('#btn-reset1').click(function(){ //button reset event click
        $('#form-filter')[0].reset();
        table.ajax.reload();  //just reload table
});

$("#check-all").click(function () {
    $(".data-check").prop('checked', $(this).prop('checked'));
});
 
  $(function () {
            $('.select2').select2();
        });

</script>

