<?php
require_once('connect.php');
require_once('data.php');   
require_once('helpers.php');

if (!$link) {
    $error = mysqli_connect_error($link);
    print($error);
   }
   else {
       $query_types_of_content = "SELECT * FROM post_types";
       $result_types__of_content = mysqli_query ($link, $query_types_of_content);
       $types_of_content = mysqli_fetch_all ($result_types__of_content, MYSQLI_ASSOC);

       $add_post = include_template ('adding-post.html');

       print ($add_post);
       print_r($_POST);
       print_r ($_FILES);
   }
