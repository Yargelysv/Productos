-   Para ingresar a la vista que contiene la información de los productos es con el siguiente link:
    http://127.0.0.1:8000/productos

-   La configuracion de la base de datos se realiza desde el archivo .env, modificando los siguientes parametros.

El manejador de base de datos que se utilizo fue PostgreSQL

DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=Productos
DB_USERNAME=postgres
DB_PASSWORD=1234

Luego de realizar la configuracion de la base de datos se procede a abrir la aplicación con el link que se menciono en lineas anteriores.

La aplicacion muestra una pantalla principal con la lista de productos creadas.

Posteriormente posee acciones que permite realizar las siguientes funcionalidades:

Ver: Permite visualizar el producto a traves de la vista 'Show.blade'
Editar: Se puede realizar modificaciones en la vista 'Edit.blade'
Eliminar: Eliminar registros.

-   La aplicacion posee la base de datos que se utilizo en caso de que quieran visualizarla.
