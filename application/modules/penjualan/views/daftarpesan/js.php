<script type="text/javascript">
    $('#kavling_id').attr('onchange','get_kav(value)');
    function get_kav(id){
        // console.log('id',id);
        if(!id) {
            $('#tanah').val('');
            $('#bangunan').val('');
            $('#harga').val('');
        }
        $.getJSON('<?= base_url('penjualan/pesanunit/kavlingjson/') ?>'+id).then(function(data){

            // alert(data);
            $('#tanah').val(data.tanah);
            $('#bangunan').val(data.bangunan);
            $('#harga').val(data.harga);
        });
    }
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



<script type="text/javascript">
            $(document).ready(function () {
                $('#tanggal').datepicker({
                    format: "dd-mm-yyyy",
                    autoclose:true
                });
            });
</script>

<script type="text/javascript">

function edit_tinjauan(id)
{

    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo base_url('penjualan/daftarpesan/ajax_tinjauan')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="pesanunit_id"]').val(data.pesanunit_id);
            $('[name="catatan"]').val(data.catatan);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Catatan Tinjauan'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function add_tinjauan()
{
    
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Tambah Dosen'); // Set Title to Bootstrap modal title
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

            $('[name="id"]').val(data.id);
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

function save_pembatalan()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable
     
    var url;

    if(save_method == 'add') {
        url = "<?php echo base_url('penjualan/pengajuanunit/ajax_add_pembatalan')?>";
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

