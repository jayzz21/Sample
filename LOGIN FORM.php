<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    
    </body>
  
    <style>

    body {

        background: #ffffff;

        display: flex;

        justify-content: left;

        align-items: left;

        height: 100vh;

        flex-direction: column;

    }
    

    .neon{
        color: #fff;
        border: 4px solid #fff;
        padding: 30px 70px;
        width: fit-content;
        margin: 0px auto;
        font-size: 50px;
        font-weight: 400;
        font-style: italic;
        transition: text-shadow 0.5s, box-shadow 0.5s;
    }
    .neon:hover{
        text-shadow: -2px -2px 10px #fff,
                    2px 2px 10px #fff,
                    0 0 20px #f10,
                    0 0 40px #f10,
                    0 0 60px #f10,
                    0 0 80px #f10,
                    0 0 100px #f10;

        box-shadow: 0 0 5px #fff,
                    inset 0 0 5px #fff,
                    0 0 20px #08f,
                    inset 0 0 20px #08f,
                    0 0 40px #08f,
                    inset 0 0 40px #08f;
    }
    *{

        font-family: cursive;

        box-sizing: padding-box;

    }

    form {

        width: 300px;

        border: 20px;

        padding: 20px;

        border-radius: 20px;

    }

    h2 {

        text-align: center;

        margin-bottom: 40px;

    }

    input {

        display: block;

        border: 5px solid rgb(131, 14, 14);

        width: 95%;

        padding: 10px;

        margin: 10px auto;

        border-radius: 20px;

    }

    label {

        color: rgb(0, 58, 234);
    
        font-size: 18px;

        padding: 10px;
    
    }
    label {
        text-shadow: -2px -2px 10px #fff,
                    2px 2px 10px #fff,
                    0 0 20px #f10,
                    0 0 40px #f10,
                    0 0 60px #f10,
                    0 0 80px #f10,
                    0 0 100px #f10;

        Text-shadow: 0 0 5px #fff,
                    inset 0 0 5px #fff,
                    0 0 20px #08f,
                    inset 0 0 20px #08f,
                    0 0 40px #08f,
                    inset 0 0 40px #08f;
                    
    }
    .modal {
                display: none;
                position: fixed; 
                z-index: 1; 
                padding-top: 100px; 
                left: 0;
                top: 0;
                width: 100%; 
                height: 100%; 
                overflow: auto;
                background-color: rgb(0,0,0); 
                background-color: rgba(0,0,0,0.4); 
            }
            
            .modal-content {
                background-color: #Black;
                margin: auto;
                border: 1px solid #888;
                width: 20%;
            }
            .close {
                color: #aaaaaa;
                float: right;
                font-size: 28px;
                font-weight: bold;
            }

            .close:hover,
            .close:focus {
                color: #000;
                text-decoration: none;
                cursor: pointer;
            }
            .close2 {
                color: #aaaaaa;
                float: right;
                font-size: 28px;
                font-weight: bold;
            }
            .close2:hover,
            .close2:focus {
                color: #000;
                cursor: pointer;
            }
    button {
        text-shadow: -2px -2px 10px #fff,
                    2px 2px 10px #fff,
                    0 0 20px #f10,
                    0 0 40px #f10,
                    0 0 60px #f10,
                    0 0 80px #f10,
                    0 0 100px #f10;
                    Box-shadow: 0 0 5px #fff,
                    inset 0 0 5px #fff,
                    0 0 20px #08f,
                    inset 0 0 20px #08f,
                    0 0 40px #08f,
                    inset 0 0 40px #08f;
        float: right;
        padding: 10px 15px;
        border-radius: 5px;
        margin-right: 10px;
        border: none;
    }

    button:hover{
        
        opacity: .10;

    }


    a:hover{

        opacity: .7;

    }
    body  
    {  
    background-image:url("https://t3.ftcdn.net/jpg/03/99/24/82/360_F_399248286_Ogm0T8CFeauN4Hdn42FqWfsCE02dJBbX.jpg");  
    background-repeat: no-repeat;
    background-size: 100% 100%;
    }  

</style>  
<br>

</head>
<body>
<div id="myModal1" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <p class = neon>User Found</p>
  </div>
</div>
<div id="myModal2" class="modal">
  <div class="modal-content">
    <span class="close2">&times;</span>
    <p class = neon>USER NOT FOUND</p>
  </div>
</div>
<div class="log-in">
    <form action="" method="GET" class="frm_login">
        <h1 class="neon">LOGIN  FORM</h1>
            <br class="br">
            <input type="text" name="user" class="username" placeholder="Username"/>
            <br class="br">
            <input type="password" name="pass" class="password" placeholder="Password"/>
            <br class="br">
        <button type="submit" class="btn" name="btn">Login</button><br class="br">
    </form>
</div>
<?php 
try{
$DB=new PDO('mysql:dbname=database;=localhost',"root","");
$DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
die("Database Connection Failed:". $e->getMessage());
}
if(isset($_GET["btn"])){
$username =$_GET["user"];
$password=$_GET["pass"];
$get_users=$DB->prepare("SELECT * FROM users where username=? and password=?");
$get_users->execute([$username, $password]);

if($get_users->rowCount()> 0){

    echo '<script>
    var modal = document.getElementById("myModal1");
    var span = document.getElementsByClassName("close")[0];
    modal.style.display = "block";
    span.onclick = function() {
      modal.style.display = "none";
    }
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
    </script>';
   
}
else{
  
    echo '<script>
    var modal = document.getElementById("myModal2");
    var span = document.getElementsByClassName("close2")[0];
    modal.style.display = "block";
    span.onclick = function() {
      modal.style.display = "none";
    }
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
    </script>';
}

}?>
</body>
</html>
