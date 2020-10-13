<?php
require_once('data.php');   
<<<<<<< HEAD
require_once('functions.php');
require_once('date.php');

=======
require_once('helpers.php');
>>>>>>> master
$content = include_template('main.php',
                            ['popular_posts' => $popular_posts,]);                      
$layout = include_template('layout.php', 
                          ['content' => $content,
                          'is_auth' => $is_auth, 
                          'user_name' => $user_name, 
                          'title' => "readme: популярное"]);

print($layout);



