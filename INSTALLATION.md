# Installatie Instructies voor Craft CMS

## Vereisten
- PHP 8.1 of hoger
- MySQL 5.7+ of PostgreSQL 9.5+
- Composer
- Webserver (Apache of Nginx)

## Stap 1: Database Setup
1. Maak een nieuwe MySQL database aan:
   ```sql
   CREATE DATABASE thilacoloma_craft;
   CREATE USER 'craft_user'@'localhost' IDENTIFIED BY 'your_secure_password';
   GRANT ALL PRIVILEGES ON thilacoloma_craft.* TO 'craft_user'@'localhost';
   FLUSH PRIVILEGES;
   ```

## Stap 2: Environment File
1. Kopieer `.env.example` naar `.env`:
   ```bash
   cp .env.example .env
   ```

2. Update de database instellingen in `.env`:
   ```
   CRAFT_DB_DATABASE=thilacoloma_craft
   CRAFT_DB_USER=craft_user
   CRAFT_DB_PASSWORD=your_secure_password
   ```

3. Genereer een security key:
   ```bash
   ./craft setup/security-key
   ```

## Stap 3: Composer Dependencies
```bash
cd craft
composer install
```

## Stap 4: Craft Setup
```bash
./craft setup
```

## Stap 5: Install Craft
```bash
./craft install
```

## Stap 6: Content Structure Setup

### Sections (Secties)
1. **News** - Voor nieuwsberichten en evenementen
   - Handle: `news`
   - Type: Channel
   - Entry URL Format: `nieuws/{slug}`

2. **Pages** - Voor statische pagina's
   - Handle: `pages`
   - Type: Structure
   - Entry URL Format: `{slug}`

3. **Navigation** - Voor navigatie-items
   - Handle: `navigation`
   - Type: Channel

### Fields (Velden)
Voor News section:
- `newsImage` (Assets)
- `newsExcerpt` (Plain Text)
- `newsContent` (Rich Text)
- `newsDate` (Date/Time)

Voor Navigation section:
- `navigationIcon` (Assets)
- `navigationLink` (URL)
- `navigationOrder` (Number)

## Stap 7: Web Server Setup

### Apache
Configureer je virtual host om naar de `web/` directory te wijzen:
```apache
<VirtualHost *:80>
    DocumentRoot "/path/to/craft/web"
    ServerName thilacoloma.local
</VirtualHost>
```

### Nginx
```nginx
server {
    listen 80;
    server_name thilacoloma.local;
    root /path/to/craft/web;
    index index.php;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass 127.0.0.1:9000;
        fastcgi_index index.php;
        include fastcgi_params;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
    }
}
```

## Stap 8: Admin Panel
Ga naar `http://yoursite.com/admin` om in te loggen op het Craft Control Panel.

## Migratie van Bestaande Content
1. Import je bestaande data via het Control Panel
2. Upload afbeeldingen naar de Assets
3. Maak entries aan voor nieuws en pagina's
4. Test alle functionaliteit

## Productie Setup
1. Zet `CRAFT_ENVIRONMENT=production` in je `.env`
2. Zet `CRAFT_DEV_MODE=false`
3. Configureer email instellingen
4. Setup SSL certificaat
5. Configureer caching en optimalisaties
