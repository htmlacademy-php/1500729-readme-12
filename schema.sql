<?sql
CREATE DATABASE readme
DEFAULT CHARACTER SET utf8
DEFAULT COLLATE utf8_general_ci;

CREATE TABLE users (
id INT AUTO_INCREMENT PRIMARY KEY,
email VARCHAR(128) NOT NULL UNIQUE,
dt_add TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
login VARCHAR(64) NOT NULL,
password CHAR(64) NOT NULL,
avatar VARCHAR(255)
);

CREATE TABLE posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    post_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    title VARCHAR(255),
    content_text TEXT(10000),
    avtor VARCHAR(128),
    picture VARCHAR(255),
    video VARCHAR(255),
    href TEXT(1000),
    view INT,
    FOREIGN KEY (user_id) REFERENCES users (id),
);