 <script type="text/javascript">

 $(function () {
    $('.select2').select2();
});


 $(document).ready(function(){

            // Step show event 
            $("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection, stepPosition) {
               //alert("You are on step "+stepNumber+" now");
               if(stepPosition === 'first'){
                 $("#prev-btn").addClass('disabled');
             }else if(stepPosition === 'final'){
                 $("#next-btn").addClass('disabled');
             }else{
                 $("#prev-btn").removeClass('disabled');
                 $("#next-btn").removeClass('disabled');
             }
         });
            
            // Toolbar extra buttons
            
            // Smart Wizard
            $('#smartwizard').smartWizard({ 
                selected: 0, 
                theme: 'arrows',
                transitionEffect:'fade',
                    lang: {  // Language variables
                        next: 'Selanjutnya', 
                        previous: 'Sebelumnya'
                    },
                    showStepURLhash: false,
                    toolbarSettings: {toolbarPosition: 'bottom',
                    toolbarExtraButtons: []
                },
                anchorSettings: {
                        anchorClickable: true, // Enable/Disable anchor navigation
                        enableAllAnchors: true, // Activates all anchors clickable all times
                        markDoneStep: true, // add done css
                        enableAnchorOnDoneStep: true // Enable/Disable the done steps navigation
                    },
                });


            $("#prev-btn").on("click", function() {
                // Navigate previous
                $('#smartwizard').smartWizard("prev");
                return true;
            });
            
            $("#next-btn").on("click", function() {
                // Navigate next
                $('#smartwizard').smartWizard("next");
                return true;
            });

        });   
    </script>  
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

        $(document).ready(function() {
            table = $('#tableID2').DataTable({
              processing:true,
              serverSide:true,

              ajax: {
                url: "<?php echo site_url('penjualan/daftarkavling/ajax_list') ;?>",
                type: "POST",
                async: false,
                data : function (data){
                    data.type = $('#type').val();
                    data.status = $('#status').val();
                    data.perumahan_id = $('#perumahan_id').val();
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

function updateTotal(){

    var tambahtanah=parseFloat($('#tambahtanah').val());
    var permeter=parseFloat($('#permeter').val());

    var totaltanah=tambahtanah*permeter;
    $('#totaltanah').val(totaltanah);
}


$(document).ready(function() {

    updateTotal();
    $('#permeter').keyup(updateTotal);
});




$(function(){
                // Set up the number formatting.
                
                $('#number_container').slideDown('fast');
                
                $('#totaltanah').on('change',function(){
                    console.log('Change event.');
                    var val = $('#totaltanah').val();
                    $('#the_number').text( val !== '' ? val : '(empty)' );
                });
                
                $('#totaltanah').change(function(){
                    console.log('Second change event...');
                });
                
                $('#totaltanah').number( true );
                
                
                // Get the value of the number for the demo.
                
            });

$(function(){
                // Set up the number formatting.
                
                $('#number_container').slideDown('fast');
                
                $('#permeter').on('change',function(){
                    console.log('Change event.');
                    var val = $('#permeter').val();
                    $('#the_number').text( val !== '' ? val : '(empty)' );
                });
                
                $('#permeter').change(function(){
                    console.log('Second change event...');
                });
                
                $('#permeter').number( true );
                
                
                // Get the value of the number for the demo.
                
            });

$(function(){
                // Set up the number formatting.
                
                $('#number_container').slideDown('fast');
                
                $('#tambahtanah').on('change',function(){
                    console.log('Change event.');
                    var val = $('#tambahtanah').val();
                    $('#the_number').text( val !== '' ? val : '(empty)' );
                });
                
                $('#tambahtanah').change(function(){
                    console.log('Second change event...');
                });
                
                $('#tambahtanah').number( true );
                
                
                // Get the value of the number for the demo.
                
            });

$('#upload-avatar').wrap($('<div style="width:210px;">'));
console.log($('#upload-avatar').attr('src'),'AVATAR CROPPIE');
$uploadCrop = $('#upload-avatar').croppie({
    setZoom: 0.9,
    enableExif: true,
    viewport: {
        width: 300,
        height: 225,
        type: 'square'
    },
    boundary: {
        width: 302,
        height: 227
    }
});
// bugfix croppie kd muncul
// https://github.com/Foliotek/Croppie/issues/175
$('.cr-image').css({opacity:"1"});

//$('.croppie-container').css({height:'250px !important'});
$('#avatar').on('change', function () {
    var reader = new FileReader();
    reader.onload = function (e) {
        $uploadCrop.croppie('bind', {
            url: e.target.result
        }).then(function(){
            //console.log('jQuery bind complete');
        });
    }
    reader.readAsDataURL(this.files[0]);
});

function saveoutupload(){
    if ($('#avatar').val() !== ''){
        $uploadCrop.croppie('result','blob').then(function(gambar){
        //console.log('data gambar:',gambar);
        uploadFile(gambar,saveout);
    });  
    }else{
        saveout();
    }
}

function uploadFile(dataUpload,after){
  // process url
  var file = $('#avatar')[0].files[0];
  var location = window.location.href; 
  var url = location.split('/');
  url[6] = 'ajax_upload'; // index 6 should be controller method
  url = url.slice(0,7) // only get array from 0 to 7
  url = url.join('/'); // build url string
  //console.log('url:',url);
  
  // CSRF (Cross Site Request Forgery) Token
  var tok = $('[name=tokensys]');
  /* WITH FORM DATA */
  var formData = new FormData();
  //console.log("DATA UPLOAD:",dataUpload);
  formData.append(tok.attr('name'),tok.val());
  formData.append(file.name,dataUpload); // DATA UPLOAD
  var request = new XMLHttpRequest();
  request.open("POST", url);
  request.onload = function(e) {
      if (request.status == 200) {
  // output.innerHTML = "Uploaded!";
  //console.log("UPLOADED:",request);
  // alert('uploaded');
  var response = JSON.parse(request.response);
  $('#url-gambar').val(response[0].url);
  //alert('Berhasil Menyimpan!');
  after();
} else {
// output.innerHTML = "Error " + request.status + " occurred when trying to upload your file.<br \/>";
//console.log("FAIL UPLOAD:",request,formData);
// TODO: support language
alert("Error " + request.status + " occurred when trying to upload your file.");
}
};
request.send(formData);
}

</script>

