<script type="text/javascript">
$('#upload-avatar').wrap($('<div style="width:210px;">'));
$uploadCrop = $('#upload-avatar').croppie({
    enableExif: true,
    viewport: {
        width: 200,
        height: 200,
        type: 'square'
    },
    boundary: {
        width: 202,
        height: 202
    }
});
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
</script>