# Moodlyn - Docker Setup

This Laravel application can be run using Docker and Docker Compose.

## Prerequisites

-   Docker
-   Docker Compose

## Quick Start

1. Clone the repository and navigate to the project directory
2. Copy the environment file:

    ```bash
    cp .env.docker .env
    ```

3. Generate an application key:

    ```bash
    docker-compose run --rm app php artisan key:generate
    ```

4. Build and start the containers:

    ```bash
    docker-compose up --build -d
    ```

5. Run database migrations:

    ```bash
    docker-compose exec app php artisan migrate
    ```

6. (Optional) Seed the database:

    ```bash
    docker-compose exec app php artisan db:seed
    ```

7. Access the application at: http://localhost:8080

## Services

-   **app**: Laravel application running on Apache (port 8080)

## Useful Commands

### Application Management

```bash
# View logs
docker-compose logs -f app

# Access application container
docker-compose exec app bash

# Run Artisan commands
docker-compose exec app php artisan [command]

# Install Composer dependencies
docker-compose exec app composer install

# Build assets
docker-compose exec app npm run build
```

### Database Management

```bash
# Run migrations
docker-compose exec app php artisan migrate

# Run seeders
docker-compose exec app php artisan db:seed

# Fresh migration with seeding
docker-compose exec app php artisan migrate:fresh --seed
```

### Cache Management

```bash
# Clear all caches
docker-compose exec app php artisan cache:clear
docker-compose exec app php artisan config:clear
docker-compose exec app php artisan view:clear
docker-compose exec app php artisan route:clear
```

## Optional Services

### MySQL Database

To use MySQL instead of SQLite, uncomment the MySQL service in `docker-compose.yml` and update your `.env` file:

```env
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=moodlyn
DB_USERNAME=moodlyn
DB_PASSWORD=password
```

### Nginx Reverse Proxy

To use Nginx as a reverse proxy, uncomment the nginx service in `docker-compose.yml`.

## Development

For development, you can mount your local files as volumes:

```bash
# Start in development mode
docker-compose -f docker-compose.yml -f docker-compose.dev.yml up
```

## Production

For production deployment:

1. Update the `.env` file with production settings
2. Set `APP_DEBUG=false`
3. Use a proper database (MySQL/PostgreSQL)
4. Configure proper cache settings
5. Set up SSL certificates

## Troubleshooting

### Permission Issues

```bash
# Fix storage permissions
docker-compose exec app chown -R www-data:www-data /var/www/html/storage
docker-compose exec app chmod -R 775 /var/www/html/storage
```

### Clear Everything and Restart

```bash
docker-compose down
docker-compose up --build -d
```

### View Application Logs

```bash
docker-compose logs -f app
```
