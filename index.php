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
       
       $filter = "";
       $button_class = "";
       $type = filter_input (INPUT_GET, 'type');

       switch ($type) {
           case "photo":
                $filter = '= 4';
                $button_class = " filters__button--active";
                break;
           case "video":
                $filter = '= 6';
                $button_class = " filters__button--active";
                break;
           case "link":
                $filter = '= 5';
                $button_class = " filters__button--active";
                break;
           case "quote":
                $filter = '= 2';
                $button_class = " filters__button--active";
                break;
            case "text":
                $filter = '= 3';
                $button_class = " filters__button--active";
                break;
       }

       $query_popular_posts = 'SELECT title, content_text, author_quotes, picture, video, href, login, name_class_icons, avatar
                               FROM posts p
                               JOIN users u ON p.user_id = u.id 
                               JOIN post_types pt ON p.post_type = pt.id
                               WHERE p.post_type ' . $filter .
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
