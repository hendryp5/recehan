<script type="text/javascript">
			
			$(function(){
				// Set up the number formatting.
				
				$('#number_container').slideDown('fast');
				
				$('#biaya').on('change',function(){
					console.log('Change event.');
					var val = $('#biaya').val();
					$('#the_number').text( val !== '' ? val : '(empty)' );
				});
				
				$('#biaya').change(function(){
					console.log('Second change event...');
				});
				
				$('#biaya').number( true );
				
				
				// Get the value of the number for the demo.
				$('#get_number').on('click',function(){
					
					var val = $('#biaya').val();
					
					$('#the_number').text( val !== '' ? val : '(empty)' );
				});
			});
$(function () {
            $('.select2').select2();
        });
		</script>