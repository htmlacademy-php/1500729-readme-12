-- добавление типов постов 
INSERT INTO post_types (name_type, name_class_icons) 
VALUES ('Цитата', 'post-quote'),
       ('Текст', 'post-text'),
       ('Фото', 'post-photo'),
       ('Ссылка', 'post-link'),
       ('Видео', 'post-video');

-- добавление пользователей
INSERT INTO users (email, login, password, avatar) 
VALUES ('test1@test.ru', 'Лариса', '123456', 'userpic-larisa-small.jpg'),
       ('test2@test.ru', 'Владик', '123456', 'userpic.jpg'),
       ('test3@test.ru', 'Виктор', '123456', 'userpic-mark.jpg');

-- добавление постов
INSERT INTO posts (
    title,
    content_text, 
    author_quotes, 
    count_views, 
    user_id, 
    post_type
) 
VALUES (
    'Цитата', 
    'Мы в жизни любим только раз, а после ищем лишь похожих',
    'Неизвестный автор',
    4,
    1,
    1
);
INSERT INTO posts (
    title,
    content_text, 
    count_views, 
    user_id, 
    post_type
)
VALUES (
    'Игра престолов',
    'Не могу дождаться начала финального сезона своего любимого сериала!',
    12,
    2,
    2
);
INSERT INTO posts (
    title,
    picture, 
    count_views, 
    user_id, 
    post_type
)
VALUES (
    'Наконец, обработал фотки!',
    'rock-medium.jpg',
    24,
    3,
    3  
);
INSERT INTO posts (
    title,
    picture, 
    count_views, 
    user_id, 
    post_type
)
VALUES (
    'Моя мечта',
    'coast-medium.jpg',
    165,
    1,
    3  
);
INSERT INTO posts (
    title,
    href, 
    count_views, 
    user_id, 
    post_type
)
VALUES (
    'Лучшие курсы',
    'www.htmlacademy.ru',
    66,
    2,
    4
);

-- добавление комментариев
INSERT INTO comments (
    content,
    user_id,
    post_id
)
VALUES (
    'Очень грусная цитата...',
    3,
    1
),
 (
    'Классное фото!',
    1,
    3
);

-- получить список постов с сортировкой по популярности и вместе с именами авторов и типом контента;
SELECT p.id, p.title, count_views, login, name_type FROM posts p 
JOIN users u ON p.user_id = u.id 
JOIN post_types pt ON p.post_type = pt.id
ORDER BY count_views DESC;

-- получить список постов для конкретного пользователя;
SELECT * FROM posts WHERE user_id = 2;

-- получить список комментариев для одного поста, в комментариях должен быть логин пользователя;
SELECT comment_date, content, login FROM comments c
JOIN posts p ON c.post_id = p.id
JOIN users u ON c.user_id = u.id
WHERE c.post_id = 1;

-- добавить лайк к посту;
INSERT INTO likes (post_id, user_id) VALUES (4,2);

-- подписаться на пользователя;
INSERT INTO subscriptions (autor_id, user_id) VALUES (3,1);
