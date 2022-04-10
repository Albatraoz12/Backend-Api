
# Introduction

**Hello**, and welcome to my Recipe app.  
  
My name is **Dimosthenis Emmanouil** and this is my verry first fullstack webb application.
This is my backend for my school assigment where I use laravel 8 as my backend and Angular as my frontend

To see my frontend repository please [Click here](https://github.com/Albatraoz12/Frontend-Angular)


This is a school assigment and the requirements for this application is, a user should be able to:

- Register an account
- Login to the account / logout
- Make lists / delete lists
- Save recipes into a lists / deleteting them from list
- **Extra!** Like recipes / deleteting liked recipes. 
- Every user should be able to add the same recipes to their list/lists but only once per list.

**NOTE:** Styling was not a part off this assigment and I haven't put so much effort into
making this site look great. Iam using Bootstrap 5 (CSS) for the styling.

I was trying to mimic [Icas recipes app](https://www.ica.se/recept/), but in the end I driffted off and decided to do something similar but a bit simpler.

# Deployments

I used heroku for my backend, url: https://dinorage-api.herokuapp.com/
And for my frontend I used netlify, url: https://vermillion-twilight-e4aac6.netlify.app/


# Further work

This project has met all its requirements but i might come back and change some implementations. And they are,


- UserList model, migration and controller should be deleted due to being replaced by Ulist model, migration and controller.



## API Reference

Every Route exept /register and /login are inside of a middleware group route. This is to ensure my users safety and to keep ther list/likes secured.  
Due to all off my routes are inside off a middleware every user must be authorized with a bearer token. Which every user gets once they log in.

Lets breake down what each Routes means and do:

### List Routes

```http
  GET /api/userlist/{id}
  POST /api/create-list/{id}
  DELETE /api/remove-list/{id}
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `GET from id` | `integer` | Fethes all lists where id = user_id|
| `POST to id` | `integer` | Posts a title with $request to the user_id where ${id} = user_id |
| `DELETE the id` | `integer` | Deleting a list where ${id} = id in Ulist table |

### Recipe Routes

```http
  GET /api/getrecipe/{id}
  POST /api/addrecipe/{id}
  DELETE /api/deleterecipe/{id}
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `GET from id` | `integer` | Get all recipes where ${id} = ulist_id |
| `POST to id` | `integer` | Checks if a recipe_id exist with ${id} = ulists_id. If there isent a recipe_id same as the requested one, it will add title, recipe_id and image to ulist_id = ${id}.|
| `DELETE the id` | `integer` | Deleting a recipe where ${id} = id in Recipe table |

### Likes Routes

```http
  GET /api/get-likes/{id}
  POST /add-like/{id}
  DELETE /api/delete-like/{id}
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `GET from id` | `integer` | Get all likes where ${id} = user_id |
| `POST to id` | `integer` | Checks if a recipe_id exist with ${id} = user_id. If there isent a recipe_id same as the requested one, it will add title, recipe_id and image to user_id = ${id}.|
| `DELETE the id` | `integer` | Deleting a liked recipe where ${id} = id in Like table |

### Get User Route

```http
  GET /api/user
  POST /api/logout
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `GET from $request` | `string` | POST email and password to route and if exists returns user with email and a bearer token |
| `POST` | `string` | POST the users id and bearer token and destroys the token |

# Installation

The requirements you need to have to be able to use my project for is:

- Have Docker installed and Docker extension in Visual Studio Code.
- Have the necessary tools and requirements for using Laravel.
- Have a folder where you will save the projects.

## How to set up Backend

Follow these steps under!

1. First  
- Open upp your wished terminal and cd into the map where you will download my projects.
- Then you clone this repository [here](https://github.com/Albatraoz12/docker-template) wich will include 1 map containing 2 docker files. After that you need to make a map named project Inside of docker-template map where the 2 docker files are.
- So in otherwords you will haven 1 map containing 2 docker files and 1 map called project.

2. Secound  
- cd into the project file and in here you will need to clone this [repository here](https://github.com/Albatraoz12/Backend-Api)
- After you clone the repository you will have 1 map called Backend-Api inside your project map!

3. Third  
- cd .. out so you stand inside the folder containing the project map and the 2 dockerfiles then type code . (open it with Visual Studio Code). Make sure you have Docker app up and running.
- When you land inside off Visual Studio Code open up your terminal and write this command: `docker compose build`, after that command is finnished loading you need to type this command: `docker compose up`.

4. Fourth  
- Open the docker extension and right click on the Backend-Api_php and click on the Attach Sehll. cd into Backend-Api and type `composer i`.

5. Fifth  
- After compose has finnished its installation you need to make a copy off the .env.example and call the copy .env.
- open .env file and change the DB_HOST:db, DB_DATABSE: "YourDBNameHere", DB_USERNAME:"YourNameHere", DB_PASSWORD="YourPassHere".
- After you have altered the .env file you need to go to localhost:8080 and login into the main db which will have Username "root" and Password will be "example"
- When you log in, create a database with the same name as you said in the .env file (DB_DATABSE="Yourname").
- Go back to your Visual Studio Code and in the shell terminal write `php artisan migrate` and after that has finnished loading type `php artisan serve --host 0.0.0.0 --port 8000`.


The Backend should now be up and running. You can now go over to my [frontend repository](https://github.com/Albatraoz12/Frontend-Angular) and follow its steps.


# Toughts!

I have not enjoyed this assigment so much due to making a whole fullstack project from ground up in just 2 weeks.
Tho its has been a good journey with many ups and downs and iam glad that I have finnished the project. I have learned alot this past 2 weeks
and iam looking forward to see what more i will learn.

# Follow me!

My [Github](https://github.com/Albatraoz12)  
My [LinkedIn](https://www.linkedin.com/in/dimosthenis-emmanouil-4ba731207/)


