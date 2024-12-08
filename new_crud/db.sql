create table users(

    id int auto_increment primary key,
    name varchar(255) not null,
    email varchar(191) not null unique,
    phone varchar(20) not null,
    gender enum('Male', 'Female','Other') not null,
    address varchar(255) not null,
    file varchar(255),
    image varchar(255)
);