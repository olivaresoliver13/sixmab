# 🚀 Sixmab
Es una solución avanzada que abarca seis procesos clave, integrando tecnología de punta, maquinaria moderna, plataformas web y sistemas de gestión. Su objetivo es optimizar el manejo de baterías eléctricas, generando ahorros significativos y mejorando la eficiencia de las operaciones que dependen de ellas.

## 📝 Requisitos
Antes de comenzar, asegúrate de tener instalados los siguientes programas en tu máquina:

- Docker
- Docker Compose
- Composer

## ⚙️ Instalación
Sigue los pasos a continuación para instalar y configurar el proyecto.

### 1. Clonar el repositorio
Clona este repositorio en tu máquina local:

```bash
git clone https://github.com/olivaresoliver13/sixmab.git
cd sixmab
```

### 2. Configurar las variables de entorno
Copia el archivo `.env.example` a `.env`:

```bash
cp .env.example .env
```

Modifica las variables de entorno en `.env` según tus necesidades. En particular, asegúrate de que los detalles de la base de datos estén correctos. Deberían lucir algo como esto:

```bash
DB_CONNECTION=pgsql
DB_HOST=db
DB_PORT=5432
DB_DATABASE=sixmab
DB_USERNAME=root
DB_PASSWORD=secret
```

### 3. Levantar los contenedores
Usa Docker Compose para levantar el entorno. Esto creará y ejecutará los contenedores necesarios para la aplicación:

```bash
docker-compose up -d --build
```

Este comando descarga las imágenes de Docker necesarias, construye el contenedor para la aplicación Laravel y ejecuta PostgreSQL y Nginx.

### 4. Instalar dependencias de Composer
Una vez que los contenedores estén funcionando, ejecuta Composer dentro del contenedor de la aplicación para instalar las dependencias de Laravel:

```bash
docker exec -it sixmab composer install
```

### 5. Aplicar migraciones
Corre las migraciones de la base de datos:

```bash
docker exec -it sixmab php artisan migrate

```

### 6. Acceder a la aplicación
La aplicación debería estar corriendo en http://localhost:8000. Puedes abrirla en tu navegador y comenzar a trabajar con la API o el frontend que hayas configurado.



## 📝 Estructura del Proyecto
Aquí está la estructura principal de archivos en el repositorio:


```txt
sixmab/
├── app/                      # Código principal del backend (controladores, modelos, etc.)
├── bootstrap/
├── config/
├── database/                 # Migraciones, seeds, factories
├── docker/
│   └── nginx/
│       └── conf.d/
│           └── default.conf  # Configuración de Nginx
├── public/                   # Document root, index.php vive acá
├── resources/                # Vistas, assets no compilados
├── routes/                   # Definiciones de rutas
├── scripts/                  # Emuladores de datos
├── storage/                  # Logs, archivos temporales, cache
├── tests/
├── .env                      # Variables de entorno
├── .gitignore
├── composer.json
├── Dockerfile                # Define la imagen PHP con extensiones necesarias
├── docker-compose.yml        # Orquestador de contenedores
├── artisan
└── README.md
```

## 📝 Comandos Útiles
- Levantar contenedores:
```bash
docker-compose up -d
```

- Detener contenedores:
```bash
docker-compose down
```

- Ejecutar migraciones:
```bash
docker exec -it sixmab php artisan migrate
```

- Instalar dependencias de Composer:
```bash
docker exec -it sixmab composer install
```

- Acceder al contenedor:
```bash
docker exec -it sixmab bash
```

## 📝 Contribuciones
Las contribuciones son bienvenidas. Si deseas mejorar este proyecto, por favor sigue estos pasos:

- Haz un fork del repositorio.
- Crea una nueva rama `git checkout -b feature/mi-nueva-funcionalidad`.
- Realiza los cambios y haz commit de tus cambios `git commit -am 'Añadir nueva funcionalidad'`.
- Haz push a tu rama `git push origin feature/mi-nueva-funcionalidad`.
- Abre un Pull Request con una descripción detallada.



