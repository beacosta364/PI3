Descripcion del proyecto-> uso, tecnologias usadas, instalacion

ABY: Desarrollo de un sistema de control de inventarios y acceso 

*********************************************************************************Descripción del Proyecto*******************************************************************************

Este sistema de gestión de inventarios tiene como objetivo principal mejorar la precisión y eficiencia en el control de productos almacenados. Al proporcionar una visibilidad en tiempo real de las existencias, permite al administrador tomar decisiones informadas para optimizar la gestión de inventarios. Con esta herramienta, se busca que la empresa o persona que la usa pueda mantener un registro preciso de productos: El sistema proporciona datos actualizados sobre la cantidad de productos disponibles en el inventario, previniendo tanto la sobrecompra como la falta de productos esenciales.
Reducir costos innecesarios: Al identificar a tiempo los productos que se encuentran próximos a agotarse, la empresa puede planificar compras de manera eficiente, reduciendo gastos asociados a adquisiciones innecesarias o urgentes.
Clasificar productos por categorías: La clasificación de productos facilita su gestión y permite un acceso rápido a información relevante, mejorando la organización general del inventario.
Gestionar usuarios y controlar accesos: El administrador tiene la capacidad de visualizar el listado completo de usuarios registrados en el sistema, permitiendo así gestionar accesos y permisos.
Registrar y auditar movimientos de productos: Cada movimiento (entrada o salida) de un producto queda registrado en un reporte detallado, que incluye el nombre del producto, la cantidad movida, el tipo de movimiento (entrada o salida), la fecha y el usuario que realizó la acción. Este reporte proporciona una trazabilidad completa de las transacciones, lo cual es esencial para la transparencia y control interno del inventario.
Este sistema no solo facilita la gestión de inventarios, sino que también contribuye a la seguridad y confiabilidad de la información, haciendo que cada acción en el inventario quede documentada y sea fácilmente accesible para auditorías y revisiones.

*********************************************************************************Tecnologías Utilizadas**********************************************************************************
Lenguajes de Programación:
Frontend: HTML, CSS, JavaScript
Backend: PHP
Herramientas de Base de Datos:

PhpMyAdmin para la gestión y administración de bases de datos MySQL
Entornos de Desarrollo:

Visual Studio Code para el desarrollo de código
XAMPP como servidor local para ejecutar el servidor Apache y MySQL
Manejo de Dependencias y Control de Versiones:

Composer para la gestión de dependencias de PHP
GitHub para el control de versiones y colaboración




*********************************************************************************Instalación en local*********************************************************************************
Para instalar y ejecutar este proyecto de manera local, sigue estos pasos. Nota: Asegúrate de tener instaladas todas las herramientas necesarias: Git, Composer, XAMPP y Visual Studio Code.

Clona el repositorio:

***Abre Git Bash y navega a la carpeta donde deseas instalar el proyecto.
Ejecuta los siguientes comandos para clonar el repositorio:
bash
****Copiar código
git clone https://github.com/beacosta364/PI3.git


***Accede al proyecto:
Ingresa en la carpeta del proyecto recién clonada: bash
Copiar código: cd PI3
Instala las dependencias de PHP:

***Ejecuta los siguientes comandos para instalar y actualizar las dependencias del proyecto:
bash
Copiar código
composer install
composer update
Configura la base de datos en XAMPP:

Inicia XAMPP y activa los módulos de Apache y MySQL.
Abre PhpMyAdmin (haz clic en "Admin" en el módulo de MySQL de XAMPP).
Crea una nueva base de datos con el nombre que prefieras, por ejemplo, gestion_inventarios.
Configura las variables de entorno:

En Visual Studio Code, renombra el archivo .env.example a .env.
Abre el archivo .env y configura las variables de conexión a la base de datos con los valores correspondientes:
env
Copiar código
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=gestion_inventarios
DB_USERNAME=root
DB_PASSWORD=
(Ajusta DB_DATABASE al nombre de la base de datos que creaste en PhpMyAdmin).
Ejecuta las migraciones y los seeders:

Abre un terminal en Visual Studio Code dentro de la carpeta del proyecto y ejecuta los siguientes comandos para crear las tablas y poblarlas con datos iniciales:
bash
Copiar código
php artisan migrate
php artisan db:seed
Inicia el servidor local:

Finalmente, ejecuta el siguiente comando para iniciar el servidor local:
bash
Copiar código
php artisan serve
Ahora puedes acceder al proyecto en tu navegador en la dirección indicada, generalmente http://127.0.0.1:8000.
