<?php
date_default_timezone_set('Europe/Moscow');
require_once('data.php');   
require_once('helpers.php');

$link = mysqli_connect ($db['host'], $db['login'], $db['password'], $db['base']);
mysqli_set_charset($link, "utf8");

if (isset($_GET['id'])) {
   $post_id = $_GET['id'];
   $post_query = 'SELECT p.id, COUNT(p.id) AS count_posts, post_type, name_class_icons, title, content_text, author_quotes, picture, video, href, p.user_id, login, name_class_icons, avatar, count_views,
   COUNT(l.id) AS count_likes, COUNT(c.id) AS count_comments
   FROM posts p
   JOIN users u ON p.user_id = u.id 
   JOIN post_types pt ON p.post_type = pt.id
   LEFT JOIN likes l ON p.id = l.post_id
   LEFT JOIN comments c ON p.id = c.post_id
   WHERE p.id =' . $post_id;
   $result_post = mysqli_query ($link, $post_query);
   $post_page = mysqli_fetch_assoc ($result_post);
   if ($post_page['id']){
       $user_query = 'SELECT u.id, COUNT(p.id) AS count_posts, COUNT(s.id) AS count_sub
       FROM users u
       LEFT JOIN posts p ON u.id = p.user_id
       LEFT JOIN subscriptions s ON u.id = s.autor_id
       WHERE u.id = ' . $post_page['user_id'];

       $result_user = mysqli_query ($link, $user_query);
       $user_info = mysqli_fetch_assoc ($result_user);


   
      $post_content = include_template ('post_content.php',
                                    ['post_page' => $post_page,
                                    'user_info' => $user_info]);
      $page_post = include_template ('layout.php',
                                 ['post_content' => $post_content,
                                 'title' => $post_page['title'],
                                 'is_auth' => $is_auth, 
                                 'user_name' => $user_name]);
       print ($page_post);
   }
      else {
         http_response_code(404);
      }
   
   }

   else {
      http_response_code(404);
   }
   