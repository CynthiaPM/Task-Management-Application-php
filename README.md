# Task Management Application

Welcome to the Task Management Application! This project was part of my training at IT Academy, where I had the opportunity to work with a custom-made framework. The goal was to create an application that allows users to manage a list of tasks. The application covers creating, updating, and deleting tasks, as well as listing tasks with their statuses and timestamps.

## Features

The Task Management Application includes the following features:

- **Task Creation:** Users can add new tasks to the list, including the task's description, start and end times, and the user who created it.
- **Task Status:** Each task can have one of three statuses: "Pending," "In Progress," or "Completed."
- **Updating Tasks:** Users have the ability to update the details of a task, including its description, status, and timestamps.
- **Deleting Tasks:** Users can remove tasks from the list.
- **Listing Tasks:** The application provides the capability to list all tasks or retrieve details about a specific task.
- **Responsive Design:** The front-end of the application was built using the Tailwind CSS framework, ensuring a responsive and user-friendly experience.

## How to Use

To use the Task Management Application:

1. Clone or download this repository to your local machine.
2. Set up a local development environment with PHP and a web server.
3. Import the provided framework and project files.
4. Configure the database connection settings in the framework.
5. Use your preferred web browser to access the application.

Follow the application's user interface to create, update, delete, and list tasks. Remember to adhere to the Gitflow workflow and use GitHub for version control.

## Technologies Used

- PHP: Used for the back-end logic and interaction with the custom framework.
- Tailwind CSS: Utilized for the responsive front-end design.

## Acknowledgements

This project was completed as part of the IT Academy training program, where I learned how to work with a custom-made framework, practice Gitflow, and build a functional task management application.

# PHP initial Project
Main structure of php project. Folders / files:
- **app**
  - **controllers**
  - **models**
  - **views**
- **config**
- **lib**
  - **base**
- **web**

### Usage

The web/index.php is the heart of the system.
This means that your web applications root folder is the “web” folder.

All requests go through this file and it decides how the routing of the app
should be.
You can add additional hooks in this file to add certain routes.

### Project Structure

The root of the project holds a few directories:
**/app** This is the folder where your magic will happen. Use the views, controllers and models folder for your app code.
**/config** this folder holds a few configuration files. Currently only the connection to the database.
**/lib** This is where you should put external libraries and other external files.
**/lib/base** The library files. Don’t change these :)
**/web** This folder holds files that are to be “downloaded” from your app. Stylesheets, javascripts and images used. (and more of course)

The system uses a basic MVC structure, with your web app’s files located in the
“app” folder.

#### app/controllers
Your application’s controllers should be defined here.

All controller names should end with “Controller”. E.g. TestController.
All controllers should inherit the library’s “Controller” class.
However, you should generally just make an ApplicationController, which extends
the Controller. Then you can defined beforeFilters etc in that, which will get run
at every request.

#### app/models
Models handles database interaction etc.

All models should inherit from the Model class, which provides basic functionality.
The Model class handles basic functionality such as:

Setting up a database connection (using PDO)
fetchOne(ID)
save(array) → both update/create
delete(ID)
app/views
Your view files.
The structure is made so that having a controller named TestController, it looks
in the app/views/test/ folder for it’s view files.

All view files end with .phtml
Having an action in the TestController called index, the view file
app/views/test/index.phtml will be rendered as default.

#### config/routes.php
Your routes around the system needs to be defined here.
A route consists of the URL you want to call + the controller#action you want it
to hit.

An example is:
$routes = array(
‘/test’ => ‘test#index’ // this will hit the TestController’s indexAction method.
);

#### Error handling
A general error handling has been added.

If a route doesn’t exist, then the error controller is hit.
If some other exception was thrown, the error controller is hit.
As default, the error controller just shows the exception occured, so remember
to style the error controller’s view file (app/views/error/error.phtml)

### Utilities
- [PHP Developers Guide](https://www.php.net/manual/en/index.php).
- .gitignore file configuration. [See Official Docs](https://docs.github.com/en/get-started/getting-started-with-git/ignoring-files).
- Git branches. [See Official Docs](https://git-scm.com/book/en/v2/Git-Branching-Branches-in-a-Nutshell).
