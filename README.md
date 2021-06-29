# NAS (National Address system)

## Setup development enviroment
- Make sure docker is installed 
- Run **dev.sh** setup
- After the build is completed, a new directory will be created called **projects**
- Clone or create your projects in this directory


## Helpful info
- To start the containers: while in this folder run **sudo docker-compose up** .
  This command will run docker in the foreground. 
- Connecting your application to mariadb server
   - host: db
   - username: root
   - pasword: dbpassword
- Running composer, yarn or npm should be done in the **phpfpm** container
- To login to the **phpfpm** container execture: **sudo doker-compose exec phpfpm bash** . 
  Once logged in, you will be in the **projects** directory
- Add data that needs persisting, eg: mariadb databases, are store in the respective container folder.
  eg: mariadb databases are stored in **docker/db/data**
- Running **sh dev.sh** will display instructions on how to ssh into the other containers

# Codebase structure
Source code are in the directory **projects**

|project       | directory   | description                      |
|--------------|-------------|----------------------------------|
| api (backend)| nas_backend | Contains the laravel (php) code  |
| UI (frontend API) | nas_frontend | APA and desktop application|


# Developing
## Backend (API)
Laravel is use for the backend. You need to know PHP
The test domain for the backend is `nas.test` . Register this in your `hosts` file

##
Quasar is use for the frontend.
The frontend test domain is `nasfrontend.test`

You need to start quasar dev server
 - ssh into the nodejs container: `docker-compose exec nodje bash`
 - cd into the frontend project folder: `cd nas_frontend`
 - install node modules: `yarn install`
 - run quasar dev server start command: `npx quasar dev`
