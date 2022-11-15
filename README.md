## Instalaciones requeridas

- Laravel ultima version (9)
- Nodejs ultima version (18.12.1 LTS)
- Composer
- XAMPP

## Comienzo

Una vez instalado lo anterior se debe clonar este repositorio y una vez dentro arrancar los siguientes comandos en la terminal:

- `composer install`
- `npm install` 
- `php artisan migrate`(previamente creada la base de datos sistema_pvo)
- `npm run dev` (en una terminal, sin cerrar)
- `php artisan serve` (abrir otra terminal sin cerrar la anterior)

## Configuracion base de datos

La base de datos se llama sistema_pvo, una vez migrado todo, se debe ir manualmente al gestor de base de datos y agregar los datos de la empresa. Es importante que el id de la empresa sea 1, todo lo demas se hace desde el sistema.

## Funcionalidades

Las funcionalidades del sistema son las siguientes:

- Creacion de categorias
- Creacion de productos (Código de producto está validado para que sea único en la base de datos)
- Creacion de venta (Solo el producto y la cantidad son obligatorios. El monto en efectivo no es necesario y se puede guardar la venta sin haberse indicado)
- Listado de ventas creadas.
- Rebajar stock tras la creacion de la venta.
- Validacion de stock en el momento de agregar producto a la venta.
