<?php
session_start();
 
if(isset($_GET['id']) AND $_GET['id'] > 0) {
   $userinfo = $_SESSION;

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style media="screen">

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
margin: 0;
padding: 0;
box-sizing: border-box;
font-family: 'Poppins', sans-serif;
}
body{
display: flex;
align-items: center;
justify-content: center;
min-height: 100vh;
background-color: #080710;
}
 
.background{
    width: 430px;
    height: 520px;
    position: absolute;
    transform: translate(-50%,-50%);
    left: 50%;
    top: 50%;
}
.background .shape{
    height: 200px;
    width: 200px;
    position: absolute;
    border-radius: 50%;
}
.shape:first-child{
    background: linear-gradient(
        #1845ad,
        #23a2f6
    );
    left: -80px;
    top: -80px;
}
.shape:last-child{
    background: linear-gradient(
        to right,
        #ff512f,
        #f09819
    );
    right: -30px;
    bottom: -80px;
}
 
.wrapper,
.wrapper .img-area,
.social-icons a,
.buttons button{
background-color: rgba(255,255,255,0.13);
border-radius: 10px;
backdrop-filter: blur(10px);
border: 2px solid rgba(255,255,255,0.1);
box-shadow: 0 0 40px rgba(8,7,16,0.6);
}

.wrapper{
position: relative;
width: 350px;
padding: 30px;
border-radius: 10px;
display: flex;
align-items: center;
justify-content: center;
flex-direction: column;
}                                      

.wrapper .img-area{                    
height: 150px;
width: 150px;
border-radius: 50%;
display: flex;
align-items: center;
justify-content: center;
}
.img-area .inner-area{
height: calc(100% - 25px);
width: calc(100% - 25px);
border-radius: 50%;
}
.inner-area img{
height: 100%;
width: 100%;
border-radius: 50%;
object-fit: cover;
}
.wrapper .name{                        
font-size: 23px;
font-weight: 500;
color: white;
margin: 10px 0 5px 0;
}
.wrapper .about{
color: #d0d1d7;
font-weight: 400;
font-size: 16px;
}
.wrapper .social-icons{
margin: 15px 0 25px 0;
}
.social-icons a{
position: relative;
height: 40px;
width: 40px;
margin: 0 5px;
display: inline-flex;
text-decoration: none;
border-radius: 50%;
}                                      
.social-icons a:hover::before,
.wrapper .icon:hover::before,
.buttons button:hover:before{
content: "";
position: absolute;
top: 0;
left: 0;
bottom: 0;
right: 0;
border-radius: 50%;
background: #ecf0f3;
box-shadow: inset -3px -3px 7px #ffffff,
          inset 3px 3px 5px #ceced1;
}
.buttons button:hover:before{
z-index: -1;
border-radius: 5px;
}

.buttons button:hover{
  color: black;
}                                      
.social-icons a i{
position: relative;
z-index: 3;
text-align: center;
width: 100%;
height: 100%;
font-size: 20px;
line-height: 35px;
}
.social-icons a:nth-last-child(1) i{
color: #13d151;
}
.social-icons a:nth-last-child(2) i{
color: #e6ba12;
}
.social-icons a:nth-last-child(3) i{
color: #1da9e9;
}
.social-icons a:nth-last-child(4) i{
color: #f23400;
}

.wrapper .buttons{
display: flex;
width: 100%;
justify-content: space-between;
}
.buttons button{
position: relative;
width: 100%;
border: none;
outline: none;
padding: 12px 0;
color: #d0d1d6;                                                              
font-size: 17px;
font-weight: 400;
border-radius: 5px;
cursor: pointer;
z-index: 4;
}
.buttons button:first-child{
margin-right: 10px;
}
.buttons button:last-child{
margin-left: 10px;
}

  </style>
</head>
<body>
  <div class="background">
      <div class="shape"></div>
      <div class="shape"></div>
  </div>


   <div class="wrapper">
     <div class="img-area">
       <div class="inner-area">
         <img src="/asset/imageProfil.png" alt="">
       </div>
     </div>

     <div class="name"><?php echo $_SESSION['nom']; ?> <?php echo $_SESSION['prenom']; ?></div>
     <div class="about">
     <p>Email : <?php echo $_SESSION['email']; ?></p>
     <br>
     <p>Poste : <?php echo $_SESSION['poste']; ?></p>
     <br>
     <p>Responsable : <?php echo $_SESSION['responsable']; ?></p>

     <?php
         if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id']) {
         ?>
  </div>

            



     <br>
     <div class="buttons">
       <button onClick="javascript:document.location.href='../index.php'">Page d'acceuil</button>
       <button onClick="javascript:document.location.href='editprofil.php'">Editer mon profil</button>
     </div>
     <br>
     <div class="buttons">
       <button onClick="javascript:document.location.href='logout.php'">Se deconnecter</button>
       
     </div>
 <?php
         }
         ?>
   </div>
</body>
</html>

<?php   
}
?>