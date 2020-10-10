<?php
$is_auth = rand(0, 1);

$user_name = 'Алексей Онипко'; // укажите здесь ваше имя

$popular_posts = [
    [
        'header' => 'Цитата',
        'type' => 'post-quote',
        'content' => 'Мы в жизни любим только раз, а после ищем лишь похожих',
        'user-name' => 'Лариса',
        'userpic' => 'userpic-larisa-small.jpg'
    ],
    [
        'header' => 'Игра престолов',
        'type' => 'post-text',
        'content' => 'Не могу дождаться начала финального сезона своего любимого сериала! Не могу дождаться начала финального сезона своего любимого сериала! Не могу дождаться начала финального сезона своего любимого сериала! Не могу дождаться начала финального сезона своего любимого сериала! Не могу дождаться начала финального сезона своего любимого сериала! Не могу дождаться начала финального сезона своего любимого сериала!',
        'user-name' => 'Владик',
        'userpic' => 'userpic.jpg' 
    ],
    [
        'header' => 'Наконец, обработал фотки!',
        'type' => 'post-photo',
        'content' => 'rock-medium.jpg',
        'user-name' => 'Виктор',
        'userpic' => 'userpic-mark.jpg' 
    ],
    [
        'header' => 'Моя мечта',
        'type' => 'post-photo',
        'content' => 'coast-medium.jpg',
        'user-name' => 'Лариса',
        'userpic' => 'userpic-larisa-small.jpg' 
    ],
    [
        'header' => 'Лучшие курсы',
        'type' => 'post-link',
        'content' => 'www.htmlacademy.ru',
        'user-name' => 'Владик',
        'userpic' => 'userpic.jpg' 
    ]
    ];

   function format_text($string, $simbols = 300) {
    $words = explode(" ", $string);
    foreach ($words as $word) {
        $word_simbols = strlen(utf8_decode($word));
        $summary_simbols = $summary_simbols + $word_simbols;
        if ($summary_simbols <= $simbols) {
            $formatted_text[] = $word;
        }
        else {   
        break;
        }   
    };
    $formatted_text = implode(" ", $formatted_text);
    if ($summary_simbols > $simbols) {
        $formatted_text = "<p>{$formatted_text}...</p>" . '<a class="post-text__more-link" href="#">Читать далее</a>';
    }
    else {
        $formatted_text = "<p>$formatted_text</p>";
    }
            return $formatted_text;       
    };
    require_once('helpers.php');
    $content = include_template('templates/main.php', ['posts' => $popular_posts]);
    $layout = include_template('templates/layout.php', ['content' => $content, 'user' => $user_name, 'title' => "readme:популярное"]);
    print($layout);
    


