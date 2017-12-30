<script type="text/javascript">
    $('#kavling_id').attr('onchange','get_kav(value)');
    function get_kav(id){
        // console.log('id',id);
        if(!id) {
            $('#tanah').val('');
            $('#bangunan').val('');
            $('#harga').val('');
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
</script>


