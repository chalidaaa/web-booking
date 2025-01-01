const firebaseConfig = {
    apiKey: "AIzaSyCi9JwT4YnzOh_8KhYg8VVhcnzHBJ3dGK8",
    authDomain: "aewene-eccomerce.firebaseapp.com",
    projectId: "aewene-eccomerce",
    storageBucket: "aewene-eccomerce.appspot.com",
    messagingSenderId: "717092298645",
    appId: "1:717092298645:web:8b35913e28a67e37a4e09c",
    measurementId: "G-KTQFNM6XLL"
  };
  
  // Initialize Firebase
  const app = initializeApp(firebaseConfig);
  const analytics = getAnalytics(app);

//let's code
const datab = firebase.database().ref('data');
function UserRegister(){
const email = document.getElementById('eemail').value;
const password = document.getElementById('lpassword').value;
firebase.auth().createUserWithEmailAndPassword(email.password).then(function(){

}).catch(function (error){
    const errorcode = error.code;
    const errormsg = error.message;
});
}
const auth = firebase.auth();
function Signln(){
    const email = document.getElementById('eemail').value;
    const password = document.getElementById('lpassword').value;
    const promise = auth.signlnWithEmailAndPassword(email.password);
    promise.catch(e => alert(e.msg));
    window.open("http://www.google.com","_self");
}
document.getElementById('form').addEventListener('submit',(e)=>{
    e.preventDefault();
    const userinfo = datab.push();
    userinfo.set({
        name: getld('fname'),
        email: getld('eemail'),
        password: getld('lpassword')
    });
    
    alert("Successfully Sign Up");
    document.getElementById('form').reset();
    
    function getld(id) {
        return document.getElementById(id).value;
}
