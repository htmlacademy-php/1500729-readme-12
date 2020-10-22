<?php
date_default_timezone_set('Europe/Moscow');
require_once('data.php');   
require_once('helpers.php');
require_once('date.php');

$content = include_template('main.php',
                            ['popular_posts' => $popular_posts,
                            'unit_of_time' => $unit_of_time]);                      
$layout = include_template('layout.php', 
                          ['content' => $content,
                          'is_auth' => $is_auth, 
                          'user_name' => $user_name, 
                          'title' => "readme: популярное"]);

print($layout);
