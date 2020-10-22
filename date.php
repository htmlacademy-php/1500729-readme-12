<?php 
foreach($popular_posts as $post)
{
    $random_date = generate_random_date($index);
    $popular_posts[$index]['post_time'] = $random_date;
    $index++;
}    
