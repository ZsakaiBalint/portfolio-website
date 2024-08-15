# portfolio-website

This repository hosts my portfolio website, made in the symfony framework.
Here is a detailed tutorial on how to get the source code of the project and use this github reposotory for development, using a Windows machine.

## How to get the source code
To get the source code, you can follow these instructions:
1. Create a local directory on your machine where you want to store your symfony projects (optional).
* Open the command prompt, and navigate where you want to create your projects. I will create a folder in the root of my D drive: `D:`
* Create a new folder: `mkdir symfony_projects`
* Navigate into that folder: `cd symfony_projects`

2. Clone the remote repository:
* First, set your git name and email globally:
`git config --global user.name "Your Name"`
`git config --global user.email "youremail@example.com"`
* clone the github repo: `git clone https://github.com/ZsakaiBalint/portfolio-website.git`
* navigate into the local repo: `cd portfolio-website`
* to get the exact copy of all branch in the repo, run this powershell script (for windows users): `branches.ps1`

## How to commit your changes to this remote repository
* First, open your favourite IDE and make your first changes to the codebase i. e. VS Code.
* If you finished working, stage all changes: `git add .`
* Commit your changes: `git commit -m "Your commit message here"`
* Push the changes: `git push origin main`

## Where can you read and edit the documentation
you can find the documentation of this repo in the [Wiki section](https://github.com/ZsakaiBalint/portfolio-website/wiki)
