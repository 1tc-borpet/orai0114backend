# Kisúj SkillForge — Backend (Laravel 10+)

Ez a mappa tartalmazza a Laravel alapú REST API-t a "Kisúj SkillForge" projekt számára. Az API CRUD végpontokat szolgáltat a kihívásokhoz.

## Követelmények
- PHP 8.1+
- Composer
- SQLite (ajánlott egyszerű teszthez) vagy MySQL
- Laravel 10+

## Telepítés (lokálisan)
1. Klónozd a repót és lépj bele:
   ```bash
   git clone https://github.com/1tc-borpet/orai0114backend.git
   cd orai0114backend
   ```

2. Telepítsd a függőségeket:
   ```bash
   composer install
   ```

3. Másold a `.env.example`-t `.env`-re és állítsd be a DB-t. A legegyszerűbb: SQLite.

4. Generálj app key-et:
   ```bash
   php artisan key:generate
   ```

5. Hozz létre egy `database/database.sqlite` fájlt ha SQLite-ot használsz, majd futtasd migrációt és seedert:
   ```bash
   mkdir -p database
   touch database/database.sqlite
   php artisan migrate --seed
   ```

6. Indítsd el a fejlesztői szervert:
   ```bash
   php artisan serve
   ```

Az API alap URL-je: `http://127.0.0.1:8000/api`

Végpontok: GET /api/challenges, GET /api/challenges/{id}, POST /api/challenges, PATCH /api/challenges/{id}, DELETE /api/challenges/{id}
