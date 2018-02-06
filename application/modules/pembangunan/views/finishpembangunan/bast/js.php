<script type="text/javascript">
			
			$(function(){
				// Set up the number formatting.
				
				$('#number_container').slideDown('fast');
				
				$('#price').on('change',function(){
					console.log('Change event.');
					var val = $('#price').val();
					$('#the_number').text( val !== '' ? val : '(empty)' );
				});
				
				$('#price').change(function(){
					console.log('Second change event...');
				});
				
				$('#price').number( true );
				
				
				// Get the value of the number for the demo.
				$('#get_number').on('click',function(){
					
					var val = $('#price').val();
					
					$('#the_number').text( val !== '' ? val : '(empty)' );
				});
			});
		</script>

<script type="text/javascript">
var table;
$(function () {
var process = window.location.href+'/ajax_list';
table = $('#tableID2').DataTable({
      processing:true,
      serverSide:true,
      ajax:{
            url: process,
            type: "POST",
            data : {tokensys:key}
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

$("#check-all").click(function () {
    $(".data-check").prop('checked', $(this).prop('checked'));
});
</script>

<script type="text/javascript">
var table;
$(function () {
var process = window.location.href+'/ajax_list';
table = $('#tableID3').DataTable({
      processing:true,
      serverSide:true,
      ajax:{
            url: process,
            type: "POST",
            data : {tokensys:key}
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

$("#check-all").click(function () {
    $(".data-check").prop('checked', $(this).prop('checked'));
});
</script>