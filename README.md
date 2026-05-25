# Build With Abdallah MVP

Professional MVP for **Build With Abdallah**.

## Stack

- Laravel 12 (Laravel 13 requires PHP 8.3; this Pi is on PHP 8.2)
- Livewire 4
- Alpine.js
- Tailwind CSS + Vite
- Filament 5 admin panel
- Laravel Sanctum for API tokens
- MariaDB/MySQL-ready schema
- Nginx + PHP-FPM deployment config included

## Public Pages

- Home
- About
- Services
- Tutorials / Blog
- Single Tutorial page
- Videos
- Contact

## Admin Panel

Path: `/admin`

Admin can manage:
- Posts / tutorials
- Videos
- Categories
- Tags
- Media
- Contact messages
- API tokens

## API

Base path: `/api/v1`

### Protected endpoints

Posts:
- `POST /api/v1/posts`
- `GET /api/v1/posts`
- `GET /api/v1/posts/{id}`
- `PATCH /api/v1/posts/{id}`
- `DELETE /api/v1/posts/{id}`
- `POST /api/v1/posts/{id}/publish`
- `POST /api/v1/posts/{id}/unpublish`

Videos:
- `POST /api/v1/videos`
- `GET /api/v1/videos`
- `GET /api/v1/videos/{id}`
- `PATCH /api/v1/videos/{id}`
- `DELETE /api/v1/videos/{id}`
- `POST /api/v1/videos/{id}/publish`
- `POST /api/v1/videos/{id}/unpublish`

Media:
- `POST /api/v1/media/upload`
- `GET /api/v1/media`
- `DELETE /api/v1/media/{id}`

Categories:
- `GET /api/v1/categories`
- `POST /api/v1/categories`

Tags:
- `GET /api/v1/tags`
- `POST /api/v1/tags`

Contact messages:
- `GET /api/v1/contact-messages`

### Public endpoints

- `GET /api/v1/public/posts`
- `GET /api/v1/public/posts/{slug}`
- `GET /api/v1/public/videos`
- `GET /api/v1/public/videos/{slug}`
- `POST /api/v1/contact`

## Token abilities

- `posts:create`
- `posts:update`
- `posts:delete`
- `posts:publish`
- `videos:create`
- `videos:update`
- `videos:delete`
- `videos:publish`
- `media:upload`
- `admin:read`

## Local run (quick MVP mode)

```bash
cd /path/to/buildwithabdallah
cp .env.example .env
composer install
npm install
php artisan key:generate
php artisan migrate --seed
php artisan storage:link
npm run build
php artisan serve --host=127.0.0.1 --port=8091
```

## Raspberry Pi deployment (MariaDB + Nginx + PHP-FPM)

> Note: the current agent session may not have elevated sudo access from Telegram. If package installs are blocked, run these commands on the Pi shell.

### 1) Install packages

```bash
sudo apt-get update
sudo apt-get install -y nginx mariadb-server php8.2-fpm php8.2-mysql php8.2-cli php8.2-mbstring php8.2-xml php8.2-bcmath php8.2-curl unzip curl git
```

### 2) Install Composer and Node if missing

```bash
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php composer-setup.php
sudo mv composer.phar /usr/local/bin/composer
rm composer-setup.php
```

Node can be installed via NodeSource, nvm, or your existing preferred setup.

### 3) Clone the repo

```bash
cd /var/www
sudo git clone https://github.com/Abdallah-Tah/buildwithabdallah.git
sudo chown -R $USER:www-data /var/www/buildwithabdallah
cd /var/www/buildwithabdallah
```

### 4) Configure `.env`

```bash
cp .env.example .env
php artisan key:generate
```

Edit `.env`:

```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://buildwithabdallah.com

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=buildwithabdallah
DB_USERNAME=buildwithabdallah
DB_PASSWORD=change-me

SESSION_DRIVER=file
QUEUE_CONNECTION=database
FILESYSTEM_DISK=public
```

### 5) Create MariaDB database and user

```bash
sudo mysql
```

```sql
CREATE DATABASE buildwithabdallah CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER 'buildwithabdallah'@'localhost' IDENTIFIED BY 'change-me';
GRANT ALL PRIVILEGES ON buildwithabdallah.* TO 'buildwithabdallah'@'localhost';
FLUSH PRIVILEGES;
EXIT;
```

### 6) Install app dependencies and build assets

```bash
composer install --no-dev --optimize-autoloader
npm install
npm run build
php artisan migrate --seed
php artisan storage:link
```

### 7) Permissions

```bash
sudo chgrp -R www-data storage bootstrap/cache
sudo chmod -R ug+rwx storage bootstrap/cache
```

### 8) Nginx config

```bash
sudo cp deploy/nginx/buildwithabdallah.conf /etc/nginx/sites-available/buildwithabdallah.conf
sudo ln -s /etc/nginx/sites-available/buildwithabdallah.conf /etc/nginx/sites-enabled/buildwithabdallah.conf
sudo nginx -t
sudo systemctl restart php8.2-fpm
sudo systemctl restart nginx
```

### 9) Optional queue worker

If you need queue-backed jobs later:

```bash
sudo cp deploy/systemd/buildwithabdallah-queue.service /etc/systemd/system/
sudo systemctl daemon-reload
sudo systemctl enable --now buildwithabdallah-queue
```

## Admin credentials after seed

Default values come from `.env`:

```env
ADMIN_NAME="Abdallah Mohamed"
ADMIN_EMAIL=admin@buildwithabdallah.com
ADMIN_PASSWORD=ChangeMe123!
```

Change the password immediately in production.

## API curl examples

### Create a token in Filament admin

- Log in at `/admin`
- Open **Access → Personal Access Tokens**
- Create a token with the abilities you need
- Copy the plain text token immediately

### List public posts

```bash
curl https://buildwithabdallah.com/api/v1/public/posts
```

### List protected posts

```bash
curl -H "Authorization: Bearer YOUR_TOKEN" \
     -H "Accept: application/json" \
     https://buildwithabdallah.com/api/v1/posts
```

### Create a post

```bash
curl -X POST https://buildwithabdallah.com/api/v1/posts \
  -H "Authorization: Bearer YOUR_TOKEN" \
  -H "Accept: application/json" \
  -H "Content-Type: application/json" \
  -d '{
    "title": "New automation tutorial",
    "excerpt": "Short summary",
    "body": "# Markdown body\n\nReal content here.",
    "publish": false
  }'
```

### Publish a post

```bash
curl -X POST https://buildwithabdallah.com/api/v1/posts/1/publish \
  -H "Authorization: Bearer YOUR_TOKEN" \
  -H "Accept: application/json"
```

### Upload media

```bash
curl -X POST https://buildwithabdallah.com/api/v1/media/upload \
  -H "Authorization: Bearer YOUR_TOKEN" \
  -H "Accept: application/json" \
  -F "file=@/path/to/image.png" \
  -F "title=Homepage hero image"
```

## Verification completed so far

- Laravel app boots successfully
- Public home page returns HTTP 200
- Admin login page returns HTTP 200
- Public API endpoints respond with JSON
- Protected API endpoints respond with JSON using Sanctum bearer tokens
- Test suite passes
- Vite production build completes

## Current limitation

The codebase is ready for Pi deployment, but **installing Nginx / MariaDB / PHP-FPM from this Telegram session may be blocked if elevated access is not allowed for the current provider**.

If that happens, run the install commands above directly on the Pi shell, then the app can be switched from the temporary local dev server to full Nginx + PHP-FPM hosting.
