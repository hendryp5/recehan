<script src="https://www.gstatic.com/firebasejs/4.2.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/4.2.0/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/4.2.0/firebase-storage.js"></script>
<script>
/* FIREBASE IMPLEMENTATION
var config = {
apiKey: "AIzaSyDxaZZcpLiXukrjpynV4QxOGPKGgpIIyFc",
authDomain: "sakasistem-84f47.firebaseapp.com",
databaseURL: "https://sakasistem-84f47.firebaseio.com",
projectId: "sakasistem-84f47",
storageBucket: "sakasistem-84f47.appspot.com",
messagingSenderId: "10696915263"
};
firebase.initializeApp(config);

*/
</script>

<script>
/* CloudKilat IMPLEMENTATION */

function previewImage(file,target){
  var fileReader = new FileReader();
  fileReader.readAsDataURL(file);
  if (target.src){
    fileReader.onload = function(event){
      source = event.target.result;
      target.src = source;
      return true;
    }
  }else{
    console.log('target doesnt have .src');
    return false;
  }
}

function uploadFile(){
  $('.overlay').show();
  var file = $('#file')[0].files[0];
  previewImage(file,$('#gambar')[0]);
  // process url
  var location = window.location.href; 
  var url = location.split('/');
  url[6] = 'ajax_upload'; // index 6 should be controller method
  url = url.slice(0,7) // only get array from 0 to 7
  url = url.join('/'); // build url string
  console.log('url:',url);
  
  // CSRF (Cross Site Request Forgery) Token
  var tok = $('#cstok');
  
  /* WITH FORM DATA */
  var formData = new FormData();
  formData.append(file.name,file);
  formData.append(tok.attr('name'),tok.val());
  var request = new XMLHttpRequest();
  request.open("POST", url);
  request.onload = function(e) {
  if (request.status == 200) {
  // output.innerHTML = "Uploaded!";
  console.log("UPLOADED:",request);
  // alert('uploaded');
  var response = JSON.parse(request.response);
  $('#url-gambar').val(response[0].url);
  $('#gambar').attr('src',response[0].url)
  $('.overlay').hide();
  
} else {
// output.innerHTML = "Error " + request.status + " occurred when trying to upload your file.<br \/>";
console.log("FAIL UPLOAD:",request,formData);
// TODO: support language
alert ("Error " + request.status + " occurred when trying to upload your file.");
}
};
request.send(formData);

// console.log('TOK',tok);
/* WITHOUT FORM DATA
var theData = {
  'gambar':file.files[0]
};
theData[tok.attr('name')] = tok.val(),
console.log('DATA:',theData);
$.ajax
({
  'url': url,
  type: "POST",
  data: theData,
  dataType: 'JSON',
  contentType: file.files[0].type,
  success: function(data)
  {
    alert('SUCCESS');
  },
  error: function(data)
  {
    alert( 'Sorry.' );
  }
  // cache: false,
  // processData: false
});
*/

}

window.onload = function() {

  $('.overlay').hide();
  $('#file')[0].addEventListener('change', uploadFile, false);
}

/* FIREBASE IMPLEMENTATION
console.log('Upload Script start');
var auth = firebase.auth();
var storageRef = firebase.storage().ref();

$('.overlay').hide();

function handleFileSelect(evt) {
evt.stopPropagation();
evt.preventDefault();
var file = evt.target.files[0];
user = auth.currentUser;
console.log('handle upload with user',user);
$('.overlay').show();
var metadata = {
'contentType': file.type
};

storageRef.child('docs/'+user.uid + '/' + file.name).put(file, metadata).then(function(snapshot) {

console.log('Uploaded', snapshot.totalBytes, 'bytes.');
console.log(snapshot.metadata);
var url = snapshot.downloadURL;
console.log('File available at', url);
// [START_EXCLUDE]
$('#gambar').attr('value', url );
$('#img-gambar').attr('src', url );
$('.overlay').hide();
// [END_EXCLUDE]
}).catch(function(error) {
// [START onfailure]
console.error('Upload failed:', error);
// [END onfailure]
});
// [END oncomplete]

}

window.onload = function() {
$('#file')[0].addEventListener('change', handleFileSelect, false);
$('#file')[0].disabled = true;

auth.onAuthStateChanged(function(user) {

console.log("auth.currentUser",user);
if (user) {
console.log('User signed-in.', user);
$('#file')[0].disabled = false;
}else{
auth.signInWithEmailAndPassword("saudara.ugi@gmail.com",'takunibos').catch(function(){console.log('CATCHING:',arguments);});
}
});
}
*/
</script>

