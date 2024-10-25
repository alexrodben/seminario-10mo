## Sistema de gestión de inventarios y entradas

```bash
cd inventory_sys
```

1.

```bash
composer install
```

2. hacer copia `.env`

```bash

cp .env.example .env

```

3. Generar app key

```bash
php artisan key:generate
```

4. Cambiar datos en el `.env`.
5. Migraciones y seed Db:

```bash

php artisan migrate:fresh --seed

```

6. Link al storage

```bash
php artisan storage:link
```

7. NPM dependencias

```bash

npm install && npm run dev

```

8. Run

```bash

php artisan serve

```
