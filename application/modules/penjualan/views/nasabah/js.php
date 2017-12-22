<script type="text/javascript">
    $("#kavling_id").change(function(){
        var kavling_id = $("#kavling_id").val();
        $.ajax({
            type: "POST",
            url : "<?php echo base_url('penjualan/nasabah/get_detail_kavling'); ?>",
            data: "kavling_id="+kavling_id,
            cache:false,
            success: function(data){
               var json = data,
                    obj = JSON.parse(json);
                    $('#type').val(obj.type);
                    $('#tanah').val(obj.tanah);
                    $('#bangunan').val(obj.bangunan);
            }
        });
    });

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
				
				$('#pendapatan').number( true, 2 );
				
				
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
                
                $('#angsuran').number( true, 2 );
                
                
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
                
                $('#pendapatan_pasangan').number( true, 2 );
                
                
                // Get the value of the number for the demo.
                $('#get_number').on('click',function(){
                    
                    var val = $('#pendapatan_pasangan').val();
                    
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


