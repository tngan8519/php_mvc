turn on xampp

save this folder in htdocs

create database in phpMyAdmin
database has 
  table users (id: primary key, auto increment; firstname; lastname; email; phone; password; checked)
  table books (id: primary key, auto increment; type_id; user_id; author; book_name; book_price; image; detail_image1; detail_image2; descriptions; trade_conditions; checked_book)
  table blogs (blog_id: primary key, auto increment; user_id; book_name; blog_name; created; blog_description; blog_image; checked_blog; views)
  table types (type_id: primary key, auto increment; type_name)

in app/config
change the URLROOT to your root url (php_mvc is the name of the folder)
change the DB_NAME, DB_PASS, DB_HOST, DB_USER to your database name and database config

in public create folder image to save upload images

This is the MVC PHP about bookstore
The app can be opened with the URLROOT in app/config


