Project Description
-------------------
Book Share is a web application that lists all books that are currently available for rent for all RPI students and faculty to address
the ongoing issue of having to pay for expensive textbooks/reading materials that are required for academia. This application is modeled
after the popular "ride sharing" programs in that students/faculty are able to send out a query for a requested book and those who
have it available will be able to share it with the user. Upon first use of the application, the user must create an account in which
he/she will then be able to search for books, put his/her own books up for availability, and track book borrowing history.

Installation of the Application
-------------------------------

0)Install XAMP stack or similar service (php, mysql, html, css, js support required)

1) Set up a mysql server (mariadb preferably), and import the attached table structure into it (session_example).

2) Import provided files into local host.





Files and what they do
------------------------


Welcome.php
Starts session and redirects user to index or to logout as applicable


Index.php
The main search function is the main page for the website. The page contains a link to login or signup in the top right, and in the center contains the search function. Pick one of the four radial buttons to search for title, isbn, author, or genre. The top left button takes the user to their account page.


query_books.php 
The query books page handles user book searches by queries the database for the information needed for the users search, and outputting the results.
A PDO to the database is built, and then a main try/ catch function wrapping everything. Inside of that is multiple if/else statements that, with a statement for each handling title, isbn, author, or genre. Depending on what is being searched for, a query of the database is built in the PDO. Once the query results are returned, a simple foreach loop runs that will output the results to an array. Once the array is finished being built, the results along with the user is sent to the search.php page.


query_user_books.php 

This php file will build the user page which will contain the books that the user owns, and the books that the user is borrowing.
A PDO to the database is built, and then a main try/ catch function wrapping everything. Depending on what is being searched for, a query of the database is built in the PDO. Once the query results are returned, a simple foreach loop runs that will output the results to an array. Once the array is finished being built, it is sent back to the main index page via json.
login.php The login page verifies user credentials and brings them to their "my books" page.
The login page reads whatever the user types into the user and password fields, hashes the submitted password, and sees if the user and hashed password match any entries in the data base via a query sent to the database from a PDO.


register.php

Register allows new users to create an account.
A username and password are required, if a username is already taken the user will be requested to use another. If the passwords do not match (first entry and confirm) the user is asked to enter another. If password and username are both valid, they are inserted into the database(new account is created) via PDO and the user is redirected to the index.
Note: password is hashed before insertion into database


search.js
Redirect functions that call PHP.
search.php 
Displays the results from a user search(Index.php->query_books.php->search.php). Login/signup and my books buttons are also present.


styles.css ,account.css,search.css
CSS that makes everything look pretty.
Centers everything and maintains the structure of the page
Main font we used "Fredericka the Great".


useraccounts.js 
Contains several functions that just redirect to php pages.


useraccounts.php 
The user accounts page displays information on the books that the user owns, and the books that the user is currently borrowing.
A try/catch wraps the queries for the owned books and for borrowed books.


welcome.php
If no session is set, session is created and user is redirected to login page.


additem.php
Inserts new books into the database via a PDO.


home_screen.js

Controls the ajax calls for my books(owned) and and my books (borrowed).
Home_screen queries php pages via ajax, and if it sucesffully recieves json files it will create a table of the resulting data and output it.
Database Structure
--------------------
Our database is composed of two primary tables: users and books.
The books table has the following fields
-id int(11)(primary key, auto incrimented)
-title varchar(50)
-isbn varchar(50)
-owner varchar(50)(foreign key, references username in users table)
-current varchar(50)(foreign key, references username in users table)
-author varchar(40)
-genre varchar(40)
-location varchar(20)


The users table has the following fields
-id int (11)(primary key, auto incrimented)
-username varchar(50)(unique key)
-password varchar(255)(only password hash is stored)
-email varchar(20)

