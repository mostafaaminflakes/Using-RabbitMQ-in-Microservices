## Description

Event-driven microservices with asynchronous communication built with Laravel, Docker, and RabbitMQ.
The admin API is using Laravel Passport for authentication.

## Scenario

Add a product to the admin microservice, and then it will be automatically dispatched and synced to the client microservice using RabbitMQ.

## How it works

For each microservice: docker images are downloaded, and containers are built [App, Queue, Database] from the DockerFile.
After that the docker compose file runs a few `[.sh]` files inside the container to prepare the microservice for work.

### `[start.sh]` file is responsible for:

1. Install dependencies
2. Create `[.env]` file
3. Run a command to initialize the laravel app:

    1. Generate an app key
    2. Migrate the database

    - Admin-only commands:

    3. Seed the database
    4. Install Laravel Passport
    5. Create a Passport client
    6. Create a sample user
    7. Create a token
    8. <a name="token"></a>Store the token in a file called `[/api_token.txt]` to use it later with Postman.
    9. Serve the Laravel app

### `[queue.sh]` file is responsible for:

1. Install dependencies
2. Create `[.env]` file
3. Start the queue listener
4. Serve the Laravel app

## Prerequisites

-   RabbitMQ account [https://www.cloudamqp.com/](https://www.cloudamqp.com/)
-   Docker
-   Postman

## Usage

-   Make sure Docker is running.
-   Clone the repository.

    ```
    $ git clone https://github.com/mostafaaminflakes/Using-RabbitMQ-in-Microservices.git
    ```

-   Populate `[.env.example]` with your RabbitMQ account details:

    ```
    RABBITMQ_HOST=
    RABBITMQ_USER=
    RABBITMQ_PASSWORD=
    RABBITMQ_VHOST=
    ```

-   Admin microservice

    ```
    $ cd Using-RabbitMQ-in-Microservices/admin
    $ docker compose up -d
    ```

-   Client microservice

    ```
    $ cd Using-RabbitMQ-in-Microservices/main
    $ docker compose up -d
    ```

## Postman

-   Import the collection file from [/postman/collection.json](postman/collection.json) into Postman.
-   Navigate to `Authorization/Bearer Token` and add the token from step [3.8](#token) above.

## Notes

Depending on your internet speed, you may need need to run `[docker compose up -d]` command twice at first time only to allow all dependencies to install properly. This is because the queue container depends on other containers to be ready to run.
