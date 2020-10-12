<?php 
date_default_timezone_set('Europe/Moscow');
foreach ($popular_posts as $post)
{
    $random_date = generate_random_date ($index);
    $popular_posts[$index]['post_time'] = $random_date;
    $post_date = strtotime ($random_date);
    $popular_posts[$index]['time_post'] = date('d.m.Y H:i', $post_date);
    $diff_time = time() - $post_date;
    print("$diff_time ");

    switch(true) 
    {
        case ($diff_time < 3600):
            $time_of_post = $diff_time / 60;
            $time_of_post = floor($time_of_post);
            $popular_posts[$index]['post_time_back'] = "{$time_of_post}"." " . get_noun_plural_form($time_of_post, 'минуту', 'минуты', 'минут') . " " . "назад";
        print($time_of_post);
        break;

        case ($diff_time >= 3600 && $diff_time < 86400):
            $time_of_post = $diff_time / 3600;
            $time_of_post = floor($time_of_post);
            $popular_posts[$index]['post_time_back'] = "{$time_of_post}"." " . get_noun_plural_form($time_of_post, 'час', 'часа', 'часов') . " " . "назад";
            print($time_of_post);
        break;

        case ($diff_time >= 86400 && $diff_time < 604800):
            $time_of_post = $diff_time / 86400;
            $time_of_post = floor($time_of_post);
            $popular_posts[$index]['post_time_back'] = "{$time_of_post}"." " . get_noun_plural_form($time_of_post, 'день', 'дня', 'дней') . " " . "назад";
            print($time_of_post);
        break;

        case ($diff_time >= 604800 && $diff_time < 3024000 ):
            $time_of_post = $diff_time / 604800;
            $time_of_post = floor($time_of_post);
            $popular_posts[$index]['post_time_back'] = "{$time_of_post}"." " . get_noun_plural_form($time_of_post, 'неделя', 'недели', 'недель') . " " . "назад";
            print($time_of_post);
        break;

        case ($diff_time >= 3024000):
            $time_of_post = $diff_time / 3024000;
            $time_of_post = floor($time_of_post);
            $popular_posts[$index]['post_time_back'] = "{$time_of_post}"." " . get_noun_plural_form($time_of_post, 'месяц', 'месяца', 'месяцев') . " " . "назад";
            print($time_of_post);
        break;
    }

    $index++;
}
