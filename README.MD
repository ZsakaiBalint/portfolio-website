# balintfejleszto.hu

A personal development website built with Docker, featuring an Nginx server, PHP backend, and MySQL database. This project uses GitHub Actions for automated deployment.

## Prerequisites
- Docker (v20.10 or higher)
- Docker Compose (v1.29 or higher)
- Browser supporting modern web standards

## How to run the development environment
1. Install [Docker](https://www.docker.com/)
2. Start Docker, then call the following command in your terminal:
```
docker compose up
```
This command will start the following services:
* Nginx server
* PHP with extensions
* MySQL database

You can access the website by opening your favourite browser and typing "localhost" into the url field.

## Database connection details
You can access the test database by creating a database connection with these credentials:

| Key            | Value            |
|----------------|------------------|
| Host           | 127.0.0.1        |
| Port           | 4306             |
| Root Password  | secret           |
| MySQL User     | user             |
| MySQL Password | secret           |
| Database Name  | docker-php       |


## How to deploy the application
Push your changes to the main branch and deployment will be handled automatically by the GitHub Action [SamKirkland/FTP-Deploy-Action](https://github.com/marketplace/actions/ftp-deploy).

## Explaining the structure of the project
The project's file structure is as follows:

/github/workflows:      Contains the GitHub workflows.
/docker:                Contains configuration files necessary to run Docker images.
/documentation:         Contains the documentation files related to this project.
/documents:             Contains .pdf files.
/images:                Contains image files.
/includes:              Contains PHP files (backend-related logic).
/migrations:            Contains .sql files (database migration files).
/scripts:               Contains .js files (frontend-related logic).
/styles:                Contains .css files (stylesheets defining the look and feel of the website).
/vendor:                Contains PHP packages installed by Composer.
/views:                 Contains PHP view files (the frontend of the application).

## How to test the application
Testing is not yet implemented. Future plans include:
- Unit tests for backend logic using PHPUnit
- End-to-end tests for frontend interactions

## How to document the application
The documentation is written in LaTeX format, using [Overleaf](https://www.overleaf.com/project/67685faf6b009ac6bceb922a).

Steps:
1. Modify the LaTeX files in Overleaf.
2. Compile the updated documentation into a `.pdf` file.
3. Place the `.pdf` file in the `/documentation` folder with the format `documentation_v<version>.pdf`.
