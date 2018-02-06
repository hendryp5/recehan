<script type="text/javascript">
    $('#kavling_id').attr('onchange','get_kav(value)');
    function get_kav(id){
        // console.log('id',id);
        if(!id) {
            $('#tanah').val('');
            $('#bangunan').val('');
            $('#harga').val('');
            $('#tambahtanah').val('');
            $('#permeter').val('');
        }
        $.getJSON('<?= base_url('penjualan/pesanunit/kavlingjson/') ?>'+id).then(function(data){

            // alert(data);
            $('#tanah').val(data.tanah);
            $('#bangunan').val(data.bangunan);
            $('#harga').val(data.harga);
            $('#tambahtanah').val(data.tambahtanah);
            $('#permeter').val(data.permeter);
            updateTotal();
        });
    }

        $(document).ready(function(){
           
            get_kav($('#kavling_idx').val());

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

        $(document).ready(function () {
            $('#tanggal').datepicker({
                format: "dd-mm-yyyy",
                autoclose:true
            });
        });

        $(function () {
            $('.select2').select2();
        });



$("#perumahan_id").change(function(){
 var perumahan_id = $("#perumahan_id").val();
    if(perumahan_id){
        $.ajax({
                type: "POST",
                async: false,
                url : "<?php echo site_url('penjualan/pesanunit/get_nomor_kavling')?>",
                data: {
                   'perumahan_id': perumahan_id,
                   '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                },
                success: function(msg){
                    $('#kavling_id').html(msg);
                }
        });
    }
});

$("#perumahan_idx").ready(function(){
var perumahan_id = $("#perumahan_idx").val();
    if(perumahan_id){
        $.ajax({
                type: "POST",
                async: false,
                url : "<?php echo site_url('penjualan/pesanunit/get_nomor_kavling/'.$this->uri->segment(4))?>",
                data: {
                   'perumahan_id': perumahan_id,
                   '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                },
                success: function(msg){
                    $('#kavling_id').html(msg);
                }
        });
    }
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

<script type="text/javascript">
            function updateTotal(){
               
                var tambahbangun=parseFloat($('#tambahbangun').val());
                var bangunpermeter=parseFloat($('#bangunpermeter').val());
                var tambahtanah=parseFloat($('#tambahtanah').val());
                var permeter=parseFloat($('#permeter').val());
                var dp1=parseFloat($('#dp1').val());
                var dp=parseFloat($('#dp').val());
                var dp2=parseFloat($('#dp2').val());
                var diskon=parseFloat($('#diskon').val());
                var diskon1=parseFloat($('#diskon1').val());
                var diskon2=parseFloat($('#diskon2').val());
                var pokok_utang1=parseFloat($('#pokok_utang1').val());
                var pokok_utang2=parseFloat($('#pokok_utang2').val());
                var harga=parseFloat($('#harga').val());
     
                var totaltanah=tambahtanah*permeter;
                var totalbangunan=tambahbangun*bangunpermeter;
                var totalseluruh=totalbangunan+totaltanah+harga-diskon;
                var totalseluruh1=totalbangunan+totaltanah+harga;
                var totalseluruh2=totalbangunan+totaltanah+harga;
                var pokok_kpr1=harga-dp;
                var pokok_utang1=totalseluruh1-dp1-diskon1;
                var pokok_utang2=totalseluruh2-dp2-diskon2;

                $('#totaltanah').val(totaltanah);

                $('#totalbangunan').val(totalbangunan);
                $('#totalseluruh').val(totalseluruh);
                $('#totalseluruh1').val(totalseluruh1);
                $('#totalseluruh2').val(totalseluruh2);
                $('#pokok_kpr1').val(pokok_kpr1);
                $('#pokok_utang1').val(pokok_utang1);
                $('#pokok_utang2').val(pokok_utang2);
                $('#harga1').val(harga);
            }

            $(document).ready(function() {
                
                updateTotal();
                $('#bangunpermeter').keyup(updateTotal);
            });

            $(document).ready(function() {
                
                updateTotal();
                $('#permeter').keyup(updateTotal);
            });

            $(document).ready(function() {
                
                updateTotal();
                $('#dp1').keyup(updateTotal);
            });

            $(document).ready(function() {
                
                updateTotal();
                $('#dp2').keyup(updateTotal);
            });

            $(document).ready(function() {
                
                updateTotal();
                $('#dp').keyup(updateTotal);
            });

            $(document).ready(function() {
                
                updateTotal();
                $('#diskon').keyup(updateTotal);
            });

            $(document).ready(function() {
                
                updateTotal();
                $('#diskon1').keyup(updateTotal);
            });

            $(document).ready(function() {
                
                updateTotal();
                $('#diskon2').keyup(updateTotal);
            });

            

            

            $(function(){
                // Set up the number formatting.
                
                $('#number_container').slideDown('fast');
                
                $('#totalseluruh').on('change',function(){
                    console.log('Change event.');
                    var val = $('#totalseluruh').val();
                    $('#the_number').text( val !== '' ? val : '(empty)' );
                });
                
                $('#totalseluruh').change(function(){
                    console.log('Second change event...');
                });
                
                $('#totalseluruh').number( true );
                
                
                // Get the value of the number for the demo.
                
            });

            $(function(){
                // Set up the number formatting.
                
                $('#number_container').slideDown('fast');
                
                $('#totalseluruh1').on('change',function(){
                    console.log('Change event.');
                    var val = $('#totalseluruh1').val();
                    $('#the_number').text( val !== '' ? val : '(empty)' );
                });
                
                $('#totalseluruh').change(function(){
                    console.log('Second change event...');
                });
                
                $('#totalseluruh1').number( true );
                
                
                // Get the value of the number for the demo.
                
            });

            $(function(){
                // Set up the number formatting.
                
                $('#number_container').slideDown('fast');
                
                $('#totalseluruh2').on('change',function(){
                    console.log('Change event.');
                    var val = $('#totalseluruh2').val();
                    $('#the_number').text( val !== '' ? val : '(empty)' );
                });
                
                $('#totalseluruh2').change(function(){
                    console.log('Second change event...');
                });
                
                $('#totalseluruh2').number( true );
                
                
                // Get the value of the number for the demo.
                
            });
             
            $(function(){
                // Set up the number formatting.
                
                $('#number_container').slideDown('fast');
                
                $('#totalbangunan').on('change',function(){
                    console.log('Change event.');
                    var val = $('#totalbangunan').val();
                    $('#the_number').text( val !== '' ? val : '(empty)' );
                });
                
                $('#totalbangunan').change(function(){
                    console.log('Second change event...');
                });
                
                $('#totalbangunan').number( true );
                
                
                // Get the value of the number for the demo.
                
            });

             $(function(){
                // Set up the number formatting.
                
                $('#number_container').slideDown('fast');
                
                $('#bangunpermeter').on('change',function(){
                    console.log('Change event.');
                    var val = $('#bangunpermeter').val();
                    $('#the_number').text( val !== '' ? val : '(empty)' );
                });
                
                $('#bangunpermeter').change(function(){
                    console.log('Second change event...');
                });
                
                $('#bangunpermeter').number( true );
                
                
                // Get the value of the number for the demo.
                
            });

              $(function(){
                // Set up the number formatting.
                
                $('#number_container').slideDown('fast');
                
                $('#tambahbangun').on('change',function(){
                    console.log('Change event.');
                    var val = $('#tambahbangun').val();
                    $('#the_number').text( val !== '' ? val : '(empty)' );
                });
                
                $('#tambahbangun').change(function(){
                    console.log('Second change event...');
                });
                
                $('#tambahbangun').number( true );
                
                
                // Get the value of the number for the demo.
                
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
                
            }); 

             $(function(){
                // Set up the number formatting.
                
                $('#number_container').slideDown('fast');
                
                $('#dp1').on('change',function(){
                    console.log('Change event.');
                    var val = $('#dp1').val();
                    $('#the_number').text( val !== '' ? val : '(empty)' );
                });
                
                $('#dp1').change(function(){
                    console.log('Second change event...');
                });
                
                $('#dp1').number( true );
                
                
                // Get the value of the number for the demo.
                
            });  

            $(function(){
                // Set up the number formatting.
                
                $('#number_container').slideDown('fast');
                
                $('#dp').on('change',function(){
                    console.log('Change event.');
                    var val = $('#dp').val();
                    $('#the_number').text( val !== '' ? val : '(empty)' );
                });
                
                $('#dp').change(function(){
                    console.log('Second change event...');
                });
                
                $('#dp').number( true );
                
                
                // Get the value of the number for the demo.
                
            });

            $(function(){
                // Set up the number formatting.
                
                $('#number_container').slideDown('fast');
                
                $('#dp2').on('change',function(){
                    console.log('Change event.');
                    var val = $('#dp2').val();
                    $('#the_number').text( val !== '' ? val : '(empty)' );
                });
                
                $('#dp2').change(function(){
                    console.log('Second change event...');
                });
                
                $('#dp2').number( true );
                
                
                // Get the value of the number for the demo.
                
            });     

             $(function(){
                // Set up the number formatting.
                
                $('#number_container').slideDown('fast');
                
                $('#pokok_kpr1').on('change',function(){
                    console.log('Change event.');
                    var val = $('#pokok_kpr1').val();
                    $('#the_number').text( val !== '' ? val : '(empty)' );
                });
                
                $('#pokok_kpr1').change(function(){
                    console.log('Second change event...');
                });
                
                $('#pokok_kpr1').number( true );
                
                
                // Get the value of the number for the demo.
                
            }); 

             $(function(){
                // Set up the number formatting.
                
                $('#number_container').slideDown('fast');
                
                $('#pokok_utang1').on('change',function(){
                    console.log('Change event.');
                    var val = $('#pokok_utang1').val();
                    $('#the_number').text( val !== '' ? val : '(empty)' );
                });
                
                $('#pokok_utang1').change(function(){
                    console.log('Second change event...');
                });
                
                $('#pokok_utang1').number( true );
                
                
                // Get the value of the number for the demo.
                
            });  

             $(function(){
                // Set up the number formatting.
                
                $('#number_container').slideDown('fast');
                
                $('#pokok_utang2').on('change',function(){
                    console.log('Change event.');
                    var val = $('#pokok_utang2').val();
                    $('#the_number').text( val !== '' ? val : '(empty)' );
                });
                
                $('#pokok_utang2').change(function(){
                    console.log('Second change event...');
                });
                
                $('#pokok_utang2').number( true );
                
                
                // Get the value of the number for the demo.
                
            }); 

            $(function(){
                // Set up the number formatting.
                
                $('#number_container').slideDown('fast');
                
                $('#diskon').on('change',function(){
                    console.log('Change event.');
                    var val = $('#diskon').val();
                    $('#the_number').text( val !== '' ? val : '(empty)' );
                });
                
                $('#diskon').change(function(){
                    console.log('Second change event...');
                });
                
                $('#diskon').number( true );
                
                
                // Get the value of the number for the demo.
                
            }); 

            $(function(){
                // Set up the number formatting.
                
                $('#number_container').slideDown('fast');
                
                $('#diskon1').on('change',function(){
                    console.log('Change event.');
                    var val = $('#diskon1').val();
                    $('#the_number').text( val !== '' ? val : '(empty)' );
                });
                
                $('#diskon1').change(function(){
                    console.log('Second change event...');
                });
                
                $('#diskon1').number( true );
                
                
                // Get the value of the number for the demo.
                
            }); 

            $(function(){
                // Set up the number formatting.
                
                $('#number_container').slideDown('fast');
                
                $('#diskon2').on('change',function(){
                    console.log('Change event.');
                    var val = $('#diskon2').val();
                    $('#the_number').text( val !== '' ? val : '(empty)' );
                });
                
                $('#diskon2').change(function(){
                    console.log('Second change event...');
                });
                
                $('#diskon2').number( true );
                
                
                // Get the value of the number for the demo.
                
            }); 

            $(function(){
                // Set up the number formatting.
                
                $('#number_container').slideDown('fast');
                
                $('#harga1').on('change',function(){
                    console.log('Change event.');
                    var val = $('#harga1').val();
                    $('#the_number').text( val !== '' ? val : '(empty)' );
                });
                
                $('#harga1').change(function(){
                    console.log('Second change event...');
                });
                
                $('#harga1').number( true );
                
                
                // Get the value of the number for the demo.
                
            }); 

  
</script>