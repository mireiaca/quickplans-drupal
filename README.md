QUICKPLANS DRUPAL
    Backend para la gestión y creación de planes desde la plataforma Drupal, que se utilizarán posteriormente en la app de Agnular Quickplans.

Comenzando 🚀
    Estas instrucciones te permitirán obtener una copia del proyecto en funcionamiento en tu máquina local para propósitos de desarrollo y pruebas. Mira la sección Despliegue 📦 para conocer cómo desplegar el proyecto.

Pre-requisitos 📋
    Antes de instalar el proyecto, asegúrate de tener los siguientes componentes:

    - PHP >= 8.1: Asegúrate de tener la versión correcta de PHP.
    - Composer: Administrador de dependencias de PHP.
    - MySQL: Base de datos relacional para almacenar los datos.
    - Drupal 10: El CMS que servirá como base del backend.
    - Docker: Desplegar el contenedor para las pruebas en local
    - Ddev: Herramienta para poner en marcha entornos de desarrollo locales


    Ejemplo de instalación de estos componentes sobre un WSL de Ubuntu: 
        (https://docs.docker.com/desktop/wsl/) (https://docs.docker.com/desktop/install/windows-install/)

    - Instalar Docker Desktop desde el sitio web oficial de Docker. 
    - Instalar DDEV
        sudo apt-get update
        sudo apt-get install ddev
    - Desde Visual Studio Code:
        instalar extesión de Remote - SSH
        instalar extesión de Remote Explorer
        instalar extesión de WSL
        instalar extesión de Docker
    - Iniciar WSL: Ubuntu desde VSC
    - Iniciar Docker
    - Iniciar el proyecto e instalar composer 
        mkdir quickplans-drupal-docker
        cd quickplans-drupal-docker
        ddev config --project-type=drupal10 --docroot=web --project-name=quickplans-drupal-docker
        ddev start
        ddev composer create "drupal/recommended-project" --no-install
        ddev composer require drush/drush --no-install
        ddev composer require drupal/core-recommended:10.3.6 drupal/core-composer-scaffold:10.3.6 drupal/core-project-message:10.3.6 --with-all-dependencies
        ddev drush site:install -y
        ddev drush uli
        mkdir config/sync 
        ddev drush cex


Instalación 🔧
    Sigue estos pasos para configurar el entorno de desarrollo:

    - Clona el repositorio en tu máquina local:
        git clone https://github.com/usuario/quickplans-drupal.git
        cd quickplans-drupal

    - Instala las dependencias del proyecto:
        ddev composer install

    - Configura la base de datos:    
        Crea una base de datos en MySQL y actualiza el archivo settings.php con las credenciales de la base de datos.

    - Ejecuta las migraciones:
        ddev drush migrate:import --group=quickplans_migrations
    
    - Una vez que el entorno esté configurado, accede a la web Drupal y verifica que QuickPlans esté funcionando. 

Iniciar el proyecto ❗❗:
    - Abrir Visual Studio Code para inicializar WSL2
    - Iniciar Docker
    - Desde ubuntu en WSL:
        ddev start
    - Abrir en el navegador

Pruebas end-to-end 🔩
    Estas pruebas verifican el flujo completo de la creación de planes y la gestión de usuarios en el backend. Aseguran que los endpoints y las funcionalidades críticas funcionen según lo esperado.

Pruebas de estilo de codificación ⌨️
    Estas pruebas verifican que el código cumpla con los estándares de codificación de Drupal, lo cual es importante para mantener la calidad y legibilidad.

Despliegue 📦
    Para desplegar el proyecto en un servidor de producción:

    - Sube los archivos al servidor.

    - Configura las variables de entorno en el servidor.

    - Ejecuta las migraciones y actualiza las dependencias:
        ddev composer install
        ddev drush updb 
        ddev drush cr

Construido con 🛠️
    Drupal - Framework principal.
    PHP - Lenguaje de programación.
    Composer - Administrador de dependencias.
    Drush - Herramienta de línea de comandos para Drupal.

Contribuyendo 🖇️
    Por favor, lee el archivo CONTRIBUTING.md para conocer detalles de nuestro código de conducta y el proceso para enviarnos pull requests.

Wiki 📖
    Puedes encontrar más información sobre cómo utilizar este proyecto en nuestra Wiki.

Versionado 📌
    Usamos SemVer para el versionado. Para todas las versiones disponibles, mira los tags en este repositorio.

Autores ✒️
    Mireia Cando Alonso

Licencia 📄
    Este proyecto está bajo la Licencia MIT - mira el archivo LICENSE.md para más detalles.

Expresiones de Gratitud 🎁
    Comenta a otros sobre este proyecto 📢.
    Invita a una cerveza 🍺 o un café ☕ al equipo.
    Da las gracias públicamente 🤓.
