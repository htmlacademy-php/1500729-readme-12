<?php
require_once('data.php');   
require_once('functions.php');
$content = include_template('main.php',
                            ['popular_posts' => $popular_posts]);                      
$layout = include_template('layout.php', 
                          ['content' => $content, 
                          'user_name' => $user_name, 
                          'title' => "readme: популярное"]);

print($layout);
$count = count($popular_posts);
$index = 0;
while ($index < $count) {
    $random_date = generate_random_date ($index);
    $post_date = strtotime ($random_date);
    $diff_time = time() - $post_date;
    print("$diff_time ");
    switch(true) {
        case ($diff_time < 3600):
            $time_of_post = $diff_time / 60;
            $time_of_post = floor($time_of_post);
            $time_of_post = "{$time_of_post}"." " . get_noun_plural_form($time_of_post, 'минуту', 'минуты', 'минут') . " " . "назад";
        print($time_of_post);
        break;
        case ($diff_time >= 3600 && $diff_time < 86400):
            $time_of_post = $diff_time / 3600;
            $time_of_post = floor($time_of_post);
            $time_of_post = "{$time_of_post}"." " . get_noun_plural_form($time_of_post, 'час', 'часа', 'часов') . " " . "назад";
            print($time_of_post);
        break;
        case ($diff_time >= 86400 && $diff_time < 604800):
            $time_of_post = $diff_time / 86400;
            $time_of_post = floor($time_of_post);
            $time_of_post = "{$time_of_post}"." " . get_noun_plural_form($time_of_post, 'день', 'дня', 'дней') . " " . "назад";
            print($time_of_post);
        break;
        case ($diff_time >= 604800 && $diff_time < 3024000 ):
            $time_of_post = $diff_time / 604800;
            $time_of_post = floor($time_of_post);
            $time_of_post = "{$time_of_post}"." " . get_noun_plural_form($time_of_post, 'неделя', 'недели', 'недель') . " " . "назад";
            print($time_of_post);
        break;
        case ($diff_time >= 3024000):
            $time_of_post = $diff_time / 3024000;
            $time_of_post = floor($time_of_post);
            $time_of_post = "{$time_of_post}"." " . get_noun_plural_form($time_of_post, 'месяц', 'месяца', 'месяцев') . " " . "назад";
            print($time_of_post);
        break;
    }
    $index++;
}
