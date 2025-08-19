# Docker Setup for PHP 5.6 MikroTik Project

This setup provides a complete environment for running the PHP 5.6 MikroTik management system.

## Services Included

- **Web Server**: PHP 5.6 with Apache
- **Database**: MySQL 5.7
- **Database Admin**: phpMyAdmin 4.9

## Quick Start

1. **Build and start the containers:**
   ```bash
   docker-compose up -d --build
   ```

2. **Access the application:**
   - Main application: http://localhost:8080
   - phpMyAdmin: http://localhost:8081

3. **Database credentials:**
   - Host: db (from within containers) or localhost:3306 (from host)
   - Database: mydatabase
   - Username: myuser
   - Password: mypassword
   - Root password: rootpassword

4. **Default admin login:**
   - Username: admin
   - Password: admin123

## Commands

- **Start services:** `docker-compose up -d`
- **Stop services:** `docker-compose down`
- **View logs:** `docker-compose logs -f`
- **Rebuild:** `docker-compose up -d --build`

## Configuration

The database configuration in `include/config.inc.php` should match:
- hostname: "db" (Docker service name)
- username: "myuser"
- password: "mypassword"
- database: "mydatabase"

## Troubleshooting

- If you get connection errors, make sure the database service is fully started
- Check logs with `docker-compose logs db` for database issues
- The MySQL extension is included for PHP 5.6 compatibility