-- create database
CREATE DATABASE session_example;

-- creating table for users
CREATE TABLE users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- creating table for books
CREATE TABLE books (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, --could be multiple copies of books
    title VARCHAR(50) NOT NULL,
    isbn VARCHAR(50) NOT NULL, --do isbns have letters?
    owner VARCHAR(50) NOT NULL,
    current VARCHAR(50),
    FOREIGN KEY (owner) REFERENCES users(username),
    FOREIGN KEY (current) REFERENCES users(username)
);