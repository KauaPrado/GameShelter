Create Database DataGaming;
USE datagaming;

CREATE TABLE games (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    image VARCHAR(255),
    rating float
);

create table users
(
id INT AUTO_INCREMENT PRIMARY KEY,
email VARCHAR(255),
password VARCHAR(255)
);
