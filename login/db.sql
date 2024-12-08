create table php_login(
    id int auto_increment primary key,
    name varchar(255) not null, 
    phone varchar(20) not null, 
    email varchar(255) not null unique,
    username varchar(50) not null unique,
    password varchar(255) not null
);
