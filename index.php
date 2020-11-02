<?php
date_default_timezone_set('Europe/Moscow');
require_once('data.php');   
require_once('helpers.php');

$link = mysqli_connect ($db['host'], $db['login'], $db['password'], $db['base']);
mysqli_set_charset($link, "utf8");

if (!$link) {
    $error = mysqli_connect_error($link);
    print($error);
   }
   else {
       $query_types_content = "SELECT id, name_type FROM post_types";
       $result_types_content = mysqli_query ($link, $query_types_content);

       if ($result_types_content) {
           $types_content = mysqli_fetch_all ($result_types_content, MYSQLI_ASSOC);
       }
       
       if (isset($_GET['type'])) {
        $type = $_GET['type'];

           switch ($type) {
             case "photo":
                $filter = ' WHERE p.post_type = 4';
                break;
             case "video":
                $filter = ' WHERE p.post_type = 6';
                break;
             case "link":
                $filter = ' WHERE p.post_type = 5';
                break;
             case "quote":
                $filter = ' WHERE p.post_type = 2';
                break;
             case "text":
                $filter = ' WHERE p.post_type = 3';
                break;
           }
       }

       $query_popular_posts = 'SELECT p.id, title, content_text, author_quotes, picture, video, href, login, name_class_icons, avatar
                               FROM posts p
                               JOIN users u ON p.user_id = u.id 
                               JOIN post_types pt ON p.post_type = pt.id' . $filter . 
                               ' ORDER BY count_views DESC
                               LIMIT 6';
       $result_popular_posts = mysqli_query ($link, $query_popular_posts);

       if ($result_popular_posts) {
           $popular_posts = mysqli_fetch_all ($result_popular_posts, MYSQLI_ASSOC);
       }
   }

   require_once('date.php');

$content = include_template('main.php',
                            ['popular_posts' => $popular_posts,
                            'unit_of_time' => $unit_of_time,
                            'types_content' => $types_content,
                            'button_class' => $button_class,
                            'type' => $type]);                      
$layout = include_template('layout.php', 
                          ['content' => $content,
                          'is_auth' => $is_auth, 
                          'user_name' => $user_name, 
                          'title' => "readme: популярное"]);

print($layout);
