# Rest-API for Virta's electric vehicle charging station management system

# Description
* PHP based application (Laravel);
* MySQL DB;
* Server logs;
* PHP Unit tested;

# Docker Images and Containers
-Web, Mysql, Redis, Mailhog, Swagger

# Running the project
Some requirements before running the application:
-Install Docker; 
-Install Laravel;
-Install PHP;
-For initializing the project, run on your terminal: `make setup`
-The API will start on http://127.0.0.1:80, and the swagger doc will start on http://127.0.0.1:8080. *For API details, see the `wiki/swagger.yaml` file.

# Running the containers via Docker
-On your terminal, run: `make up` or `docker-compose up -d`

# DB Seeding
-On your terminal, run `make seed` or `docker-compose exec web seed`

# Installing dependencies
-On your terminal, run `make bash` or `docker-compose exec web bash`, for making a SSH connection to the web container.
Make a ssh connection to the `web` container using one of these ways:  

# Generating swagger documentation
-Inside the container, run `openapi ./app -o wiki/swagger.yaml`;
-Outside the container, run `make openapi`

# The CI/CD deployment
-Github
