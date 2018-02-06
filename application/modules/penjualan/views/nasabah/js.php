<script type="text/javascript">
    $('#kavling_id').attr('onchange','get_kav(value)');
    function get_kav(id){
        // console.log('id',id);
        if(!id) {
            $('#tanah').val(data.tanah);
            $('#bangunan').val(data.bangunan);
            $('#harga').val(data.harga);
        }
        $.getJSON('<?= base_url('penjualan/nasabah/kavlingjson/') ?>'+id).then(function(data){

            // alert(data);
            $('#tanah').val(data.tanah);
            $('#bangunan').val(data.bangunan);
            $('#harga').val(data.harga);
        });
    }
</script>

<script type="text/javascript">
			
			$(function(){
				// Set up the number formatting.
				
				$('#number_container').slideDown('fast');
				
				$('#pendapatan').on('change',function(){
					console.log('Change event.');
					var val = $('#pendapatan').val();
					$('#the_number').text( val !== '' ? val : '(empty)' );
				});
				
				$('#pendapatan').change(function(){
					console.log('Second change event...');
				});
				
				$('#pendapatan').number( true );
				
				
				// Get the value of the number for the demo.
				$('#get_number').on('click',function(){
					
					var val = $('#pendapatan').val();
					
					$('#the_number').text( val !== '' ? val : '(empty)' );
				});
			});
</script>

<script type="text/javascript">
            
            $(function(){
                // Set up the number formatting.
                
                $('#number_container').slideDown('fast');
                
                $('#angsuran').on('change',function(){
                    console.log('Change event.');
                    var val = $('#angsuran').val();
                    $('#the_number').text( val !== '' ? val : '(empty)' );
                });
                
                $('#angsuran').change(function(){
                    console.log('Second change event...');
                });
                
                $('#angsuran').number( true );
                
                
                // Get the value of the number for the demo.
                $('#get_number').on('click',function(){
                    
                    var val = $('#angsuran').val();
                    
                    $('#the_number').text( val !== '' ? val : '(empty)' );
                });
            });
</script>

<script type="text/javascript">
            
            $(function(){
                // Set up the number formatting.
                
                $('#number_container').slideDown('fast');
                
                $('#pendapatan_pasangan').on('change',function(){
                    console.log('Change event.');
                    var val = $('#pendapatan_pasangan').val();
                    $('#the_number').text( val !== '' ? val : '(empty)' );
                });
                
                $('#pendapatan_pasangan').change(function(){
                    console.log('Second change event...');
                });
                
                $('#pendapatan_pasangan').number( true );
                
                
                // Get the value of the number for the demo.
                $('#get_number').on('click',function(){
                    
                    var val = $('#pendapatan_pasangan').val();
                    
                    $('#the_number').text( val !== '' ? val : '(empty)' );
                });
            });
</script>

<script type="text/javascript">
            
            $(function(){
                // Set up the number formatting.
                
                $('#number_container').slideDown('fast');
                
                $('#harga').on('change',function(){
                    console.log('Change event.');
                    var val = $('#harga').val();
                    $('#the_number').text( val !== '' ? val : '(empty)' );
                });
                
                $('#harga').change(function(){
                    console.log('Second change event...');
                });
                
                $('#harga').number( true );
                
                
                // Get the value of the number for the demo.
                $('#get_number').on('click',function(){
                    
                    var val = $('#harga').val();
                    
                    $('#the_number').text( val !== '' ? val : '(empty)' );
                });
            });
</script>

 <script type="text/javascript">
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
<script>
     $(document).ready(function(e){
        var site_url = "<?php echo site_url(); ?>";
        var input = $("input[name=nama]");

            $.get(site_url+'penjualan/nasabah/json_search_follow', function(data){
                        input.typeahead({
                            source: data,
                            minLength: 1,
                        });
            }, 'json');

            input.change(function(){
                var current = input.typeahead("getActive");
                $('#id').val(current.id);
        $('#ktp').val(current.ktp);
        $('#email').val(current.email);
        $('#telpon').val(current.telpon);
        $('#alamat').val(current.alamat);
        $('#pekerjaan').val(current.pekerjaan);

            });

    });
</script>
<script type="text/javascript">
            $(document).ready(function () {
                $('#tglahir').datepicker({
                    format: "yyyy-mm-dd",
                    autoclose:true
                });
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

$(function () {
        $("#carapembelianx").ready(function () {
            var carapembelian = $("#carapembelianx").val();
            if (carapembelian == "1") {
                $("#dvkpr").slideDown();
                $("#dvcashbertahap").slideUp();
                $("#dvcashkeras").slideUp();
            } else if (carapembelian == "2") {
                $("#dvcashbertahap").slideDown();
                $("#dvkpr").slideUp();
                $("#dvcashkeras").slideUp();
            } else if (carapembelian == "3") {
                $("#dvcashkeras").slideDown();
                $("#dvkpr").slideUp();
                $("#dvcashbertahap").slideUp();
            } else {
                $("#dvkpr").slideUp();
                $("#dvcashbertahap").slideUp();
                $("#dvcashkeras").slideUp();

            } 
        });
    });

</script>


