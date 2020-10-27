CREATE DATABASE readme
DEFAULT CHARACTER SET utf8
DEFAULT COLLATE UTF8_GENERAL_CI;

USE readme;

-- таблица пользователей
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(64) NOT NULL UNIQUE,
    dt_add TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    login VARCHAR(64) NOT NULL,
    password VARCHAR(64) NOT NULL,
    avatar VARCHAR(64)
);

-- таблица типов постов
CREATE TABLE post_types (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name_type VARCHAR(32) UNIQUE,
    name_class_icons VARCHAR(32) UNIQUE 
);

-- таблица постов
CREATE TABLE posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    post_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    title VARCHAR(128),
    content_text TEXT,
    author_quotes VARCHAR(64),
    picture VARCHAR(64),
    video VARCHAR(64),
    href VARCHAR(128),
    count_views INT,
    user_id INT NOT NULL,
    post_type INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users (id),
    FOREIGN KEY (post_type) REFERENCES post_types (id)
);

-- таблица комментариев
CREATE TABLE comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    comment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    content TEXT(1000),
    user_id INT NOT NULL,
    post_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users (id),
    FOREIGN KEY (post_id) REFERENCES posts (id)
);

-- таблица лайков
CREATE TABLE likes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    post_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users (id),
    FOREIGN KEY (post_id) REFERENCES posts (id)
);


-- таблица подписок
CREATE TABLE subscriptions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    autor_id INT NOT NULL,
    user_id INT NOT NULL,
    FOREIGN KEY (autor_id) REFERENCES users (id),
    FOREIGN KEY (user_id) REFERENCES users (id)
);

-- таблица сообщений
CREATE TABLE messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    message_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    message_content TEXT(10000),
    sender_id INT NOT NULL,
    recipient_id INT NOT NULL,
    FOREIGN KEY (sender_id) REFERENCES users (id),
    FOREIGN KEY (recipient_id) REFERENCES users (id)
);


-- таблица хештегов
CREATE TABLE hashtags (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name_hashtags VARCHAR(64) UNIQUE
);

-- промежуточная таблица связь "многие-ко-многим" (посты и хештеги)
CREATE TABLE posts_hashtags (
    post_id INT,
    hashtag_id INT,
    FOREIGN KEY (post_id) REFERENCES posts (id),
    FOREIGN KEY (hashtag_id) REFERENCES hashtags (id),
    PRIMARY KEY (post_id, hashtag_id)
);

-- дополнительные индексы
CREATE INDEX u_name ON users (login);
CREATE INDEX p_title ON posts (title);
CREATE INDEX m_text ON hashtags (name_hashtags);
