CREATE DATABASE readme
DEFAULT CHARACTER SET utf8
DEFAULT COLLATE UTF8_GENERAL_CI;

USE readme;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(64) NOT NULL UNIQUE,
    dt_add TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    login VARCHAR(64) NOT NULL,
    password VARCHAR(64) NOT NULL,
    avatar VARCHAR(64)
);

CREATE TABLE posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    post_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    title VARCHAR(128),
    content_text TEXT,
    author quotes VARCHAR(64),
    picture VARCHAR(64),
    video VARCHAR(64),
    href TEXT(128),
    count_views INT,
    user_id INT NOT NULL,
    post_type INT NOT NULL,
    hashtag VARCHAR(128),
    FOREIGN KEY (user_id) REFERENCES users (id)
);

CREATE TABLE comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    comment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    content TEXT(1000),
    user_id INT NOT NULL,
    post_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users (id),
    FOREIGN KEY (post_id) REFERENCES posts (id)
);

CREATE TABLE likes (
    user_id INT NOT NULL,
    post_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users (id),
    FOREIGN KEY (post_id) REFERENCES posts (id)
);

CREATE TABLE subscriptions (
    autor_id INT NOT NULL,
    user_id INT NOT NULL,
    FOREIGN KEY (autor_id) REFERENCES users (id),
    FOREIGN KEY (user_id) REFERENCES users (id)
);

CREATE TABLE messages (
    message_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    message_content TEXT(10000),
    sender_id INT NOT NULL,
    recipient_id INT NOT NULL,
    FOREIGN KEY (sender_id) REFERENCES users (id),
    FOREIGN KEY (recipient_id) REFERENCES users (id)
);

CREATE TABLE hashtags (
    name_hashtags VARCHAR(128) UNIQUE
);

CREATE TABLE post_types (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name_type VARCHAR(32) UNIQUE,
    name_class_icons VARCHAR(32) UNIQUE 
);

ALTER TABLE posts ADD FOREIGN KEY (post_type) REFERENCES post_types (id);

CREATE INDEX u_name ON users (login);

CREATE INDEX p_title ON posts (title);

CREATE INDEX m_text ON hashtags (name_hashtags);
