<script type="text/javascript">

var save_method;

function add_tinjauan(id)
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    
    $.ajax({
        url : "<?php echo base_url('penjualan/pengajuanunit/ajax_pesan')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="pesanunit_id"]').val(data.id);
            $('[name="kavling_id"]').val(data.kavling_id);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Tinjauan'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function edit_tinjauan(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    
    $.ajax({
        url : "<?php echo base_url('penjualan/pengajuanunit/ajax_lihat_tinjauan')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="pesanunit_id"]').val(data.pesanunit_id);
            $('[name="catatan"]').val(data.catatan);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Tinjauan'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function pembatalan(id)
{
    save_method = 'add';
    $('#form2')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    
    $.ajax({
        url : "<?php echo base_url('penjualan/pengajuanunit/ajax_pesan')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="pesanunit_id"]').val(data.id);
            $('[name="kavling_id"]').val(data.kavling_id);
            $('#modal_form2').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Pembatalan'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function save_tinjauan()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable
     
    var url;

    if(save_method == 'add') {
        url = "<?php echo base_url('penjualan/pengajuanunit/ajax_add_tinjauan')?>";
    } else {
        url = "<?php echo base_url('penjualan/pengajuanunit/ajax_update_tinjuan')?>";
    }

    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {

            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form').modal('hide');
                location.reload();
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++) 
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

        }
    });
}

function save_pembatalan()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable
     
    var url;

    if(save_method == 'add') {
        url = "<?php echo base_url('penjualan/pengajuanunit/ajax_add_pembatalan')?>";
    } else {
        url = "<?php echo base_url('penjualan/pengajuanunit/ajax_update_pembatalan')?>";
    }

    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {

            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form').modal('hide');
                location.reload();
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++) 
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

        }
    });
}

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

 $(function () {
        $("#carapembelian").change(function () {
            if ($(this).val() == "1") {
                $("#dvkpr").slideDown();
                $("#dvcashbertahap").slideUp();
                $("#dvcashkeras").slideUp();
            } else if ($(this).val() == "2") {
                $("#dvcashbertahap").slideDown();
                $("#dvkpr").slideUp();
                $("#dvcashkeras").slideUp();
            } else if ($(this).val() == "3") {
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


