<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins&display=swap" rel="stylesheet">

    <!-- icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <style>
        body{
            background-color: #f86621;
        }

        .poppins-regular {
            font-family: "Poppins", serif;
            font-weight: 400;
            font-style: normal;
        }

        .container{
            padding: 15px;
            color: white;
        }

        .login-container{
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            background-color: black;
            padding: 15px 20px;
            text-align: center;
            border-radius: 5px;
            color: white;
            position: fixed;
            bottom: 0;
            margin-bottom: 20px;
            width: calc(100% - 30px - 55px);
        }

        .google-image{
            width: 21px;
            height: 21px;
            margin-right: 20px;
        }
        
        img{
            width: 21px;
            height: 21px;
            margin-right: 20px;
        }

        .google-text{
            font-size: 14px;
        }

        .logo{
            font-size: 40px;
            font-weight: bold;
            margin-top: 30px;
            color: white;
        }

        .list-features{
            margin-top: 300px;

        }

        .email-box{
            position: fixed;
            bottom: 0;
            bottom: 90px;
            width: calc(100% - 40px - 40px - 10px);
        }

        .email-input{
            padding: 15px 20px;
            width: calc(100%);
            outline: none;
            border: 0.1px solid #f1f1f1;
            font-size: medium;
            border-radius: 6px;
        }

        #text{
            border-right: 2px solid white;
            padding-right: 5px;
            white-space: nowrap;
            overflow: hidden;
        }
    </style>
</head>
<body>

    <div class="container poppins-regular">

        <div class="heading">
            <div class="logo">TrueEra</div>
            <div class="tagline" id="text"></div>
        </div>

        <div class="email-box">
            <input type="email" name="" id="" class="email-input poppins-regular" placeholder="Enter Email">
        </div>

        <div class="login-container">
            <!-- <div class="google-image"><img src="./assets/google.png" alt=""></div> -->
            <div class="google-text">Continue</div>
        </div>

    </div>
    
</body>
</html>

<script>

function validateEmail(email) {
  const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
  return emailPattern.test(email);
}
    $(".login-container").on("click",function(){
        let input = $(".email-input").val();
        if(input=="" || !validateEmail){
            alert("Please enter correct email!");
        }else{
            $.ajax({
                url:'api/login.php',
                type:'post',
                data:{
                    email:input
                },
                success:function(response){
                    console.log(response);
                    if(response=="1"){
                        window.location.href = "disclaimer-beta-testing.html";
                        return;
                    }else if(response=="2"){
                        alert("This is Beta testing which can be accessible by limited users! You are not allowed to use this. Contact neu-era-things@gmai.com.");
                        return;
                    }else{
                        alert("Sorry Wrong Input! Try Again!");
                        return;
                    }
                }
            })
        }
    });
</script>

<script>
        const sentences = [
            "Welcome to my website!",
            "Enjoy your stay.",
            "Feel free to explore."
        ];
        
        let index = 0;
        let charIndex = 0;
        let isDeleting = false;
        const speed = 100;   // Typing speed
        const eraseSpeed = 50; // Erasing speed
        const delay = 1000;  // Delay before erasing

        function typeEffect() {
            const textElement = document.getElementById("text");
            let currentSentence = sentences[index];

            if (!isDeleting) {
                textElement.innerText = currentSentence.slice(0, charIndex++);
                if (charIndex > currentSentence.length) {
                    isDeleting = true;
                    setTimeout(typeEffect, delay); // Wait before deleting
                    return;
                }
            } else {
                textElement.innerText = currentSentence.slice(0, charIndex--);
                if (charIndex < 0) {
                    isDeleting = false;
                    index = (index + 1) % sentences.length; // Move to next sentence
                }
            }

            setTimeout(typeEffect, isDeleting ? eraseSpeed : speed);
        }

        typeEffect();
    </script>