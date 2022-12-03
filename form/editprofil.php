<?php
 
 session_start();
 if(isset($_GET['id']) AND $_GET['id'] > 0) {
    $userinfo = $_SESSION;
 
 include "db.php";
 if(isset($_POST['edit']))
 {
    $id=$_SESSION['id'];
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $email=$_POST['email'];
    $role=$_POST['role'];
    $responsable=$_POST['responsable'];
    $select= "select * from users where id='$id'";
    $sql = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($sql);
    $res= $row['id'];
    if($res === $id)
    {
   
       $update = "update nom='$nom',prenom='$prenom',email='$email',role='$role',responsable='$responsable' ou id='$id'";
       $sql2=mysqli_query($conn, $update);
    if($sql2)
       { 
           /*Successful*/
           header('location:index2.php');
       }
       else
       {
           /*sorry your profile is not update*/
           header('location:profil.php');
       }
    }
    else
    {
        /*sorry your id is not match*/
        header('location:profil.php');
    }
 }
}
?>