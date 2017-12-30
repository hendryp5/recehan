<script src="https://www.gstatic.com/firebasejs/4.2.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/4.2.0/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/4.2.0/firebase-storage.js"></script>
<script>
var config = {
  apiKey: "AIzaSyDxaZZcpLiXukrjpynV4QxOGPKGgpIIyFc",
  authDomain: "sakasistem-84f47.firebaseapp.com",
  databaseURL: "https://sakasistem-84f47.firebaseio.com",
  projectId: "sakasistem-84f47",
  storageBucket: "sakasistem-84f47.appspot.com",
  messagingSenderId: "10696915263"
};
firebase.initializeApp(config);
</script>

<script>
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
</script>

