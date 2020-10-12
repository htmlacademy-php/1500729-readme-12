<?php
require_once('data.php');   
require_once('functions.php');
require_once('date.php');

$content = include_template('main.php',
                            ['popular_posts' => $popular_posts,]);                      
$layout = include_template('layout.php', 
                          ['content' => $content, 
                          'user_name' => $user_name, 
                          'title' => "readme: популярное"]);

print($layout);



