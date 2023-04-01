<h1>Backend Coding Challenge</h1>
<hr/>

<h2>General Overview of the application</h2>
<p>This a simple CRUD (Create, Read, Update, and Delete) application that interacts with a database.
The front-end was written using blade templates while the backend was written in Laravel 10
</p>
<h2>Administrator Functionalities</h2>
<b>NOTE</b>
<p>These functionalities are protected under an authentication middleware so they are only accessible once you authenticate</p>
<ol>
<li>View all employees</li>
<li>Hire an employee (System prevents hiring duplicates)</li>
<li>Edit employee information for an individual employee</li>
<li>Fire an employee from the system </li>
</ol>
<h2>Requirements</h2>
php 8.1 or greater,
Xammp; latest stable version 
composer --> to run composer commands

<h2>How TO Setup</h2>
<p>
<b>Step 1</b>
In Xampp, cd into xampp/htdocs/ 
then,
Clone this repository by running
<code>https://github.com/knached99/backend_coding_challenge.git</code>
<b>Step 2</b>
cd into backend_coding_challenge and 
Install Dependencies 
<code>composer install</code>
<b>Step 3</b>
Create a database in Xammp called test_db 
then 
Run Migrations 
<code>php artisan migrate</code>
<b>Step 4</b>
Seed Database 
<code>php artisan db:seed</code>

<b>Step 4</b>
Copy .env.example over to .env
<code>cp .env.example .env</code>
<b>Step 4</b>
Open Xammp and click on start apache server and mysql
<b>Step 5</b>
To run the app, run <code>php artisan serve</code>

To run the tests, run <code>php artisan test</code>

</p>
<h2>Routes</h2>
<h6>ROUTES</h6>
<b>(GET)</b>'/' -> routes to viewing the login page 
<b>(GET)</b> /admin/dash -> routes to viewing the dashboard
<b>(GET)</b> logout --> destroys session and logs out user, regenerates new session to protect against CSRF 
<b>(POST)</b> /admin/dash/create_user --> POST request which creates a new user 
<b>(MATCH [GET, PUT]) </b> admin/user/{id}/edit --> this is both a get and put route which 
allows an admin to view individual employee info as well as update that employee's info

<b>(DELETE)</b> admin/user/{id}/delete --> DELETE request which deletes an individual employee

<h2>Default Login credentials</h2>
When you go to Login here: localhost:8000/admin/login, 
default login credentials are..

Email: admin@admin.com
Password: password

<b>Explanation on what was completed vs what was planned</b>

<b>Completed</b>
The backend api including the unit tests,
I also wrote the front end using the blade templating engine

<b>What was Planned</b>
Had I had more time to develop, I would have written the front end using React

as that is more modern and industry standard as well as put all the routes in api.php to communicate with the react front end. I would also have made the styling a lot better
