<?php

 session_start();
 
 //destruction de la session
 session_destroy();
 header("location:../index.php");
 exit;
