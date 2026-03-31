# Task Manager - Laravel CRUD App

A simple task management CRUD application built with Laravel 13, deployed on AWS Elastic Beanstalk.

## Requirements

- [AWS CLI](https://docs.aws.amazon.com/cli/latest/userguide/getting-started-install.html) configured with credentials
- [EB CLI](https://docs.aws.amazon.com/elasticbeanstalk/latest/dg/eb-cli3-install.html) (`pip install awsebcli`)

## Deploy to Elastic Beanstalk

### 1. Initialize the EB application

```bash
eb init -p "PHP 8.4" task-manager --region us-east-1
```

### 2. Create the environment with an RDS MySQL database

```bash
eb create task-manager-env \
  --database.engine mysql \
  --database.username admin \
  --database.password <your-db-password> \
  --envvars APP_KEY=<your-app-key>
```

Generate an `APP_KEY` locally if needed:

```bash
php artisan key:generate --show
```

### 3. Set environment variables

```bash
eb setenv \
  APP_ENV=production \
  APP_DEBUG=false \
  APP_KEY=base64:yourkey \
  LOG_CHANNEL=stderr
```

The RDS variables (`RDS_HOSTNAME`, `RDS_PORT`, `RDS_DB_NAME`, `RDS_USERNAME`, `RDS_PASSWORD`) are injected automatically when you attach an RDS instance to your environment.

### 4. Deploy updates

```bash
eb deploy
```

### 5. Open the app

```bash
eb open
```

## Project Structure (Beanstalk)

```
.ebextensions/
  01-laravel.config      # PHP settings, document root, env vars
  02-permissions.config  # storage/cache directory permissions
.platform/
  hooks/postdeploy/
    01_migrate.sh         # Runs migrations + caches config after deploy
  nginx/conf.d/
    elasticbeanstalk/
      laravel.conf        # Nginx rewrite rules for Laravel
```

## Features

- Create, read, update, and delete tasks
- Task status tracking (Pending, In Progress, Completed)
- MySQL database via RDS with automatic migrations on deploy

## Useful Commands

```bash
eb status          # Check environment health
eb logs            # View application logs
eb ssh             # SSH into the instance
eb terminate       # Tear down the environment
```
