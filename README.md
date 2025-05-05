<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Web API de Pólizas con Laravel + PHP + SQL Server

Este repositorio contiene una implementación de una Web API REST para la gestión de pólizas de seguros utilizando **Laravel 10**, **PHP 8.0+**, y **SQL Server** (hospedado en Azure). Se han aplicado buenas prácticas modernas como uso de controladores, modelos, autenticación con Sanctum, y arquitectura MVC.

---

## 🚀 Tecnologías Usadas

* **Lenguaje:** PHP 8.0+
* **Framework:** Laravel 10
* **Base de Datos:** Azure SQL Server
* **ORM:** Eloquent
* **Autenticación:** Laravel Sanctum
* **Controladores REST:** `PolizaController`

---

## 🚧 Instalación y Configuración

### Requisitos previos

* PHP >= 8.0
* Composer
* Extensiones PHP para SQL Server:

  * `pdo_sqlsrv`
  * `sqlsrv`

### Pasos para instalar

```bash
# Clona el repositorio
https://github.com/CH88320B/TestWebApiPHP.git
cd TestWebApiPHP

# Instala dependencias
composer install

# Crea archivo .env
cp .env.example .env

# Genera la key de Laravel
php artisan key:generate
```

### Configura la conexión en `.env`

```dotenv
DB_CONNECTION=sqlsrv
DB_HOST=polizasserverhj2025.database.windows.net
DB_PORT=1433
DB_DATABASE=DBPolizas
DB_USERNAME=admihj
DB_PASSWORD=Hj@2024!Polizas
```

> Asegúrate de que el servidor acepte conexiones remotas y que el firewall esté configurado.

### Ejecutar migraciones

```bash
php artisan migrate
```

---

## 🌐 Endpoints

### Rutas públicas:

```http
GET     /api/polizas         # Lista todas las pólizas
```

### Rutas protegidas con Sanctum:

```http
POST    /api/polizas         # Crear nueva póliza
GET     /api/polizas/{id}    # Ver detalle
PUT     /api/polizas/{id}    # Actualizar
DELETE  /api/polizas/{id}    # Eliminar
```

---

## 🔐 Autenticación Sanctum

### Instalación Sanctum

```bash
composer require laravel/sanctum
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
php artisan migrate
```

### Middleware en `app/Http/Kernel.php`

```php
'api' => [
    \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
    'throttle:api',
    \Illuminate\Routing\Middleware\SubstituteBindings::class,
],
```

### Rutas con protección

En `routes/api.php`:

```php
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('polizas', PolizaController::class)->except(['index']);
});

Route::get('polizas', [PolizaController::class, 'index']); // Público
```

---

## 💻 Estructura del Proyecto

```
polizas-api/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       └── PolizaController.php
│   ├── Models/
│   │   └── Poliza.php
├── database/
│   └── migrations/
├── routes/
│   └── api.php
├── .env
├── composer.json
└── README.md
```

---

## 🚫 Buenas Prácticas Aplicadas

* Separación clara de responsabilidades (MVC).
* Validación de datos con Form Requests (a implementar).
* Uso de migraciones para versionado de base de datos.
* Autenticación basada en tokens segura con Sanctum.
* Rutas RESTful claras y semánticas.

---

## 🌟 Futuras Mejores

* Validaciones con `FormRequest`
* Tests unitarios con PHPUnit
* Documentación OpenAPI con Swagger
* Despliegue en Azure App Service o Vercel

---

## 📄 Licencia

MIT - Henderson J. Castañeda
