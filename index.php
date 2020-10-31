<?php
date_default_timezone_set('Europe/Moscow');
require_once('data.php');   
require_once('helpers.php');
require_once('date.php');

$link = mysqli_connect ($db['host'], $db['login'], $db['password'], $db['base']);
mysqli_set_charset($link, "utf8");

if (!$link) {
    $error = mysqli_connect_error($link);
    print($error);
   }
   else {
       $query_types_content = "SELECT id, name_type FROM post_types";
       $result_types_content = mysqli_query($link, $query_types_content);

       if ($result_types_content) {
           $types_content = mysqli_fetch_all ($result_types_content, MYSQLI_ASSOC);
       }
   }

$content = include_template('main.php',
                            ['popular_posts' => $popular_posts,
                            'unit_of_time' => $unit_of_time,
                            'types_content' => $types_content]);                      
$layout = include_template('layout.php', 
                          ['content' => $content,
                          'is_auth' => $is_auth, 
                          'user_name' => $user_name, 
                          'title' => "readme: популярное"]);

print($layout);
