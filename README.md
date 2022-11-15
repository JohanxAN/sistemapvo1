## Instalaciones requeridas

- Laravel ultima version (9)
- Nodejs ultima version (18.12.1 LTS)
- Composer
- XAMPP

## Comienzo

Una vez instalado lo anterior se debe clonar este repositorio y una vez dentro arrancar los siguientes comandos en la terminal:

- `composer install` 
- `php artisan migrate`(previamente creada la base de datos sistema_pvo
- `npm run dev` (en una terminal, sin cerrar)
- `php artisan serve` (abrir otra terminal sin cerrar la anterior)

## Configuracion base de datos

La base de datos se llama sistema_pvo, una vez migrado todo, se debe ir manualmente al gestor de base de datos y agregar los datos de la empresa. Es importante que el id de la empresa sea 1

