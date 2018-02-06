
<script type="text/javascript">
<?php
$no = 0;
 
  foreach($perumahan as $row){ 
  $no++;
    
  ?>
  var popCanvas = document.getElementById("<?php echo $no; ?>");
  var barChart = new Chart(popCanvas, {
  type: 'bar',
  data: {
    labels: ["TOTAL UNIT", "TERSEDIA", "TERPESAN", "TERJUAL"],
    datasets: [{
      
      label: ["TOTAL UNIT"],
      data: [<?php echo total_unit1($row->id); ?>,<?php echo total_tersedia1($row->id); ?>,<?php echo total_terjual1($row->id); ?>,<?php echo total_terpesan1($row->id); ?>],
      

      backgroundColor: [
        '#F1C40F',
        '#2ECC71',
        '#3498DB',
        '#E74C3C'
      ]
    }]
  }
});

  <?php } ?>
</script>
