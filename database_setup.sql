CREATE DATABASE IF NOT EXISTS penlab;
USE penlab;

DROP TABLE If EXISTS accounts;
CREATE TABLE accounts (
    id int PRIMARY KEY AUTO_INCREMENT,
    username varchar(255),
    password varchar(255),
    firstname varchar(255),
    lastname varchar(255)
);

INSERT INTO accounts (id, username, password, firstname, lastname)
    VALUES (1, 'admin', 'p@$$w0rd', 'Clark', 'Kent'),
           (2, 'bwayne', 'batman', 'Bruce', 'Wayne'),
           (3, 'pparker', 'webber!', 'Peter', 'Parker');


DROP TABLE If EXISTS bookmarks;
CREATE TABLE bookmarks (
    id int PRIMARY KEY AUTO_INCREMENT,
    name varchar(255),
    url varchar(255)
);

INSERT INTO bookmarks (id, name, url)
    VALUES (1, 'google', 'http://www.google.com'),
           (2, 'DropBox', 'http://www.dropbox.com'),
           (3, 'GitHub', 'http://www.github.com'),
           (4, 'Bootstrap', 'http://www.getbootstrap.com'),
           (5, 'OWASP', 'http://www.owasp.org');

DROP TABLE If EXISTS guestbook_comments;
CREATE TABLE guestbook_comments (
    id int PRIMARY KEY AUTO_INCREMENT,
    content Text
);

INSERT INTO guestbook_comments (content)
    VALUES ('<i>Our Widgets Are The Best</i>');
