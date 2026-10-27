# Simple Task Management System

A small Laravel + MySQL application to create, view, edit and delete tasks.

**Live demo:** Not available (free hosting limits). Run it locally using the steps below.

## Features
- Add a task (title, description, due date, status)
- View all tasks in a paginated table (overdue tasks highlighted)
- Edit and delete tasks (delete asks for confirmation)
- Server-side validation with friendly messages (title required, valid due date, valid status)

## Tech
PHP 8.2+, Laravel 11/12, MySQL, Blade templates (plain CSS, no frontend build step needed).

## Project structure (files added on top of a fresh Laravel app)
| File | Purpose |
|---|---|
| `database/migrations/..._create_tasks_table.php` | `tasks` table |
| `app/Models/Task.php` | Eloquent model, status list, helpers |
| `app/Http/Requests/TaskRequest.php` | Validation rules and messages |
| `app/Http/Controllers/TaskController.php` | CRUD actions |
| `routes/web.php` | Resource routes |
| `resources/views/layouts/app.blade.php` | Layout and styling |
| `resources/views/tasks/*.blade.php` | Index, create, edit, shared form |

## Run locally (XAMPP)
**Requirements:** XAMPP (MySQL running), PHP 8.2+, Composer.

1. Clone and install dependencies:
   ```bash
   git clone <your-repo-url> task-manager
   cd task-manager
   composer install
   ```
2. Create the environment file and app key:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
3. Start **MySQL** in the XAMPP Control Panel, open `http://localhost/phpmyadmin` and create a database named `task_manager` (collation `utf8mb4_unicode_ci`).
4. Edit `.env`:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=task_manager
   DB_USERNAME=root
   DB_PASSWORD=
   ```
5. Run migrations and start the server:
   ```bash
   php artisan migrate
   php artisan serve
   ```
6. Open http://localhost:8000

## Deploy on Railway
1. Push the repo to GitHub.
2. On Railway: **New Project -> Deploy from GitHub repo**, then **+ New -> Database -> MySQL**.
3. In the app service **Variables**, add:
   ```
   APP_NAME=Task Manager
   APP_ENV=production
   APP_DEBUG=false
   APP_KEY=<output of: php artisan key:generate --show>
   APP_URL=https://<your-app>.up.railway.app
   DB_CONNECTION=mysql
   DB_HOST=${{MySQL.MYSQLHOST}}
   DB_PORT=${{MySQL.MYSQLPORT}}
   DB_DATABASE=${{MySQL.MYSQLDATABASE}}
   DB_USERNAME=${{MySQL.MYSQLUSER}}
   DB_PASSWORD=${{MySQL.MYSQLPASSWORD}}
   ```
4. Run migrations on each deploy (Settings -> Deploy -> Pre-deploy command):
   ```bash
   php artisan migrate --force
   ```
5. Settings -> Networking -> **Generate Domain**.

## Notes
- `bootstrap/app.php` trusts the hosting proxy so HTTPS URLs and CSRF work:
  `$middleware->trustProxies(at: '*');` inside `->withMiddleware(...)`.
- Due dates for **new** tasks can't be in the past; existing tasks can keep older dates when edited.
