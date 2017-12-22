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
				
				$('#price').number( true, 2 );
				
				
				// Get the value of the number for the demo.
				$('#get_number').on('click',function(){
					
					var val = $('#price').val();
					
					$('#the_number').text( val !== '' ? val : '(empty)' );
				});
			});
		</script>

