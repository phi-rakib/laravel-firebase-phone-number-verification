@extends('layout.default')

@section('content')
    <div class="alert alert-danger" id="error" style="display: none"></div>

    <div class="card">
        <div class="card-header">
            Enter Phone Number
        </div>

        <div class="card-body">
            <div class="alert alert-success" id="sentSuccess" style="display:none"></div>

            <form>
                <label for="phone_number">Phone Number</label>
                <input type="text" name="number" id="number" class="form-control">

                <div id="recaptcha-container"></div>
                <button type="button" class="btn btn-success" onclick="phoneSendAuth();">Send Code</button>
            </form>
        </div>

        <div class="card my-4">
            <div class="card-header">
                Enter Verification Code
            </div>

            <div class="card-body">
                <div class="alert alert-success" id="successRegister" style="display:none"></div>

                <form>
                    <input type="text" name="" id="verificationCode" class="form-control" placeholder="Enter Verification Code">
                    <button type="button" class="btn btn-success" onclick="codeVerify();">Verify Code</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>
  
<script>
      
  var firebaseConfig = {
    apiKey: '{{ env('API_KEY') }}',
    authDomain: '{{ env('AUTH_DOMAIN') }}',
    projectId: '{{ env('PROJECT_ID') }}',
    storageBucket: '{{ env('STORAGE_BUCKET') }}',
    messagingSenderId: '{{ env('MESSAGING_SENDER_ID') }}',
    appId: '{{ env('APP_ID') }}',
    measurementId: '{{ env('MEASUREMENT_ID') }}'
  };
    
  firebase.initializeApp(firebaseConfig);
</script>
  
<script type="text/javascript">
  
    window.onload=function () {
      render();
    };
  
    function render() {
        window.recaptchaVerifier=new firebase.auth.RecaptchaVerifier('recaptcha-container');
        recaptchaVerifier.render();
    }
  
    function phoneSendAuth() {
           
        var number = $("#number").val();
          
        firebase.auth().signInWithPhoneNumber(number,window.recaptchaVerifier).then(function (confirmationResult) {
              
            window.confirmationResult = confirmationResult;
            var coderesult=confirmationResult;
            console.log(coderesult);
  
            $("#sentSuccess").text("Message Sent Successfully.");
            $("#sentSuccess").show();
              
        }).catch(function (error) {
            $("#error").text(error.message);
            $("#error").show();
        });
  
    }
  
    function codeVerify() {
  
        var code = $("#verificationCode").val();
  
        window.confirmationResult.confirm(code).then(function (result) {
            var user=result.user;
            console.log(user);
  
            $("#successRegister").text("you are registered Successfully.");
            $("#successRegister").show();
  
        }).catch(function (error) {
            $("#error").text(error.message);
            $("#error").show();
        });
    }
  
</script>
@endsection