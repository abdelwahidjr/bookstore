create schema webapp_db collate utf8mb4_unicode_ci;

create table users
(
  id       int auto_increment
    primary key,
  username varchar(100)  not null,
  email    varchar(1000) not null,
  password varchar(100)  not null
)
  collate = utf8_unicode_ci;

create table books
(
  id      int auto_increment
    primary key,
  name    text not null,
  url     text not null,
  user_id int  null,
  constraint books_ibfk_1
    foreign key (user_id) references users (id)
)
  collate = utf8_unicode_ci;

create index user_id
  on books (user_id);

