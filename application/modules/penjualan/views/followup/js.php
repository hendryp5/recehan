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

	 $(document).ready(function(e){
		var site_url = "<?php echo site_url(); ?>";
		var input = $("input[name=nama]");

			$.get(site_url+'penjualan/followup/json_search_follow', function(data){
						input.typeahead({
						    source: data,
						    minLength: 2,
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

            $(document).ready(function () {
                $('#tanggal').datepicker({
                    format: "yyyy-mm-dd",
                    autoclose:true
                });
            });

    function savefollowup()
{
    var location = window.location.href;
    var process = location.substring(location.lastIndexOf('/')+1);
    var process = location.split('/');
    var process = process[6];
    
    if(process == 'created'){
        var current = window.location.toString();
        var url = current.replace(/created/, 'ajax_save');
    }else if(process == 'updated') {
        var current = window.location.toString();
        var url = current.replace(/updated/, 'ajax_update');
    } else {
        var current = window.location.toString();
        var url = current.replace(/created_followup/, 'ajax_save');
    }
    
    $.ajax({
        url : url,
        type: "POST",
        data: $('#formID').serialize(),
        dataType: "JSON",
        success: function(data)
        {
            if(data.success == true){
              $('#message').append('<div class="alert alert-success">' +
                    '<span class="glyphicon glyphicon-ok"></span>' +
                    ' Data berhasil disimpan.' +
                    '</div>');
              
                    $('.form-group').removeClass('has-error')
                                    .removeClass('has-success');
                    $('.text-danger').remove();
                    $('#formID')[0].reset();
                    
                    // tutup pesan
                    $('.alert-success').delay(250).show(10, function() {
                        $(this).delay(1000).hide(10, function() {
                        $(this).remove();
                        });
                    })
                    
                    reload_table();
            }else{
                $.each(data.messages, function(key, value) {
                    var element = $('#' + key);
                    element.closest('div.form-group')
                    .removeClass('has-error')
                    .addClass(value.length > 0 ? 'has-error' : 'has-success')
                    .find('.text-danger')
                    .remove();
                    element.after(value);
                });
            }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Ada kesalahan dalam proses penyimpanan/pembaharuan data.');
        }
    });
}

function saveoutfollowup()
{
    var location = window.location.href;
    var process = location.substring(location.lastIndexOf('/')+1);
    var process = location.split('/');
    var process = process[6];
    
    if(process == 'created'){
        var current = window.location.toString();
        var url = current.replace(/created/, 'ajax_save');
    } else if(process == 'updated') {
        var current = window.location.toString();
        var url = current.replace(/updated/, 'ajax_update');
    } else {
        var current = window.location.toString();
        var url = current.replace(/created_followup/, 'ajax_save');
    } 
    
    $.ajax({
        url : url,
        type: "POST",
        data: $('#formID').serialize(),
        dataType: "JSON",
        success: function(data)
        {
        if(data.success == true){
              $('#message').append('<div class="alert alert-success">' +
                    '<span class="glyphicon glyphicon-ok"></span>' +
                    ' Data berhasil disimpan.' +
                    '</div>');
              
                    $('.form-group').removeClass('has-error')
                                    .removeClass('has-success');
                    $('.text-danger').remove();
                    $('#formID')[0].reset();
                    
                    // tutup pesan
                    $('.alert-success').delay(250).show(10, function() {
                        $(this).delay(1000).hide(10, function() {
                        $(this).remove();
                        });
                    })
                    
                var location = window.location.href;
                var n = location.search("created");
                
                if(n > 0){
                      var current = window.location.toString();
                      var lastIndex = location.substring(location.lastIndexOf('created')-1);
                      var url = current.replace(lastIndex, '');
                      window.location.href = url;
                      reload_table();
                }else{
                      var current = window.location.toString();
                      var lastIndex = location.substring(location.lastIndexOf('updated')-1);
                      var url = current.replace(lastIndex, '');
                      window.location.href = url;
                      reload_table();
                }
            }else{
                $.each(data.messages, function(key, value) {
                    var element = $('#' + key);
                    element.closest('div.form-group')
                    .removeClass('has-error')
                    .addClass(value.length > 0 ? 'has-error' : 'has-success')
                    .find('.text-danger')
                    .remove();
                    element.after(value);
                });
            }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Ada kesalahan dalam proses penyimpanan/pembaharuan data.');
        }
    });
}
</script>


