# MSA Automotriz — Sitio Web

Sitio web corporativo con panel de administración para **MSA Automotriz S.A.A.**, concesionaria automotriz en Cajamarca, Perú.

---

## Stack tecnológico

| Capa | Tecnología |
|---|---|
| Framework | Laravel 13.11.2 |
| Panel Admin | Filament v5.6.5 |
| Base de datos | MySQL (XAMPP) |
| Servidor local | Apache (XAMPP) + PHP 8.2 |
| PHP CLI (Artisan) | PHP 8.4 (Laravel Herd) |

---

## Requisitos previos

- XAMPP con Apache y MySQL activos
- PHP 8.2+ en PATH (para el servidor web)
- Composer

---

## Instalación

```bash
# 1. Clonar / copiar el proyecto en:
C:\xampp\htdocs\msa_web

# 2. Instalar dependencias
composer install

# 3. Copiar el archivo de entorno
copy .env.example .env

# 4. Generar clave de aplicación
php artisan key:generate

# 5. Ejecutar migraciones
php artisan migrate

# 6. Poblar la base de datos con datos de prueba
php artisan db:seed --class=MarcaModeloSeeder
php artisan db:seed --class=ServiciosLocalesSeeder
```

---

## Configuración `.env` importante

```env
APP_URL=http://localhost/msa_web/public

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=msa_web
DB_USERNAME=root
DB_PASSWORD=
```

---

## Acceso al sitio

| Entorno | URL |
|---|---|
| Sitio público | `http://localhost/msa_web/public` |
| Panel de administración | `http://localhost/msa_web/public/admin` |

### Credenciales del admin

| Campo | Valor |
|---|---|
| Email | `admin@msa.com` |
| Contraseña | `987654321` |

---

## Rutas públicas

### Generales

| Método | Ruta | Nombre | Descripción |
|---|---|---|---|
| GET | `/` | `home` | Página principal |
| GET | `/nosotros` | `nosotros` | Quiénes somos |
| GET | `/contacto` | `contacto` | Formulario de contacto |
| POST | `/contacto` | `contacto.store` | Envío del formulario de contacto |
| GET | `/libro-reclamaciones` | `libro-reclamaciones` | Libro de reclamaciones |
| POST | `/libro-reclamaciones` | `libro-reclamaciones.store` | Envío del libro de reclamaciones |

### Marcas y modelos

| Método | Ruta | Nombre | Descripción |
|---|---|---|---|
| GET | `/marcas` | `marcas.index` | Listado de todas las marcas |
| GET | `/marcas/{slug}` | `marcas.show` | Detalle de una marca y sus modelos |
| GET | `/marcas/{marca_slug}/{modelo_slug}` | `modelos.show` | Detalle de un modelo específico |

**Ejemplos:**
```
/marcas/chevrolet
/marcas/honda-motos
/marcas/isuzu-camiones
/marcas/chevrolet/onix
/marcas/honda-motos/cb190r
```

### Posventa / Servicios

| Método | Ruta | Nombre | Descripción |
|---|---|---|---|
| GET | `/servicios` | `servicios` | Listado de todos los servicios de posventa |
| GET | `/servicios/{slug}` | `servicios.show` | Detalle de un servicio |
| POST | `/servicios/{slug}/consultar` | `servicios.consultar` | Envío de consulta sobre un servicio |

**Ejemplos:**
```
/servicios/mantenimiento
/servicios/repuestos
/servicios/agenda-tu-cita
/servicios/carroceria-y-pintura
```

### Locales / Sedes

| Método | Ruta | Nombre | Descripción |
|---|---|---|---|
| GET | `/locales` | `locales` | Listado de todas las sedes |
| GET | `/locales/{id}` | `locales.show` | Detalle de una sede (por ID numérico) |

**Ejemplos:**
```
/locales/1   → Sede Cajamarca
/locales/2   → Sede Baños del Inca
```

---

## Panel de administración (`/admin`)

### Grupo: Catálogo

| Sección | Ruta admin | Descripción |
|---|---|---|
| Marcas | `/admin/marcas` | CRUD de marcas (nombre, slug, logo, descripción) |
| Modelos | `/admin/modelos` | CRUD de modelos vinculados a una marca |
| Servicios | `/admin/servicios` | CRUD de servicios de posventa |
| Locales | `/admin/locales` | CRUD de sedes (dirección, teléfono, mapa, etc.) |

### Grupo: Comunicaciones

| Sección | Ruta admin | Descripción |
|---|---|---|
| Contactos | `/admin/contactos` | Mensajes recibidos desde el formulario de contacto |
| Reclamaciones | `/admin/reclamacions` | Libro de reclamaciones con todos sus campos |
| Consultas de Servicios | `/admin/consulta-servicios` | Consultas enviadas desde páginas de posventa |

---

## Base de datos — Tablas principales

| Tabla | Descripción |
|---|---|
| `marcas` | Marcas de vehículos (Chevrolet, Honda Motos, Isuzu, etc.) |
| `modelos` | Modelos por marca (slug, precio, descripción, imagen) |
| `servicios` | Servicios de posventa (slug, descripción, icono, imagen) |
| `locales` | Sedes de la empresa (dirección, teléfono, WhatsApp, mapa embed) |
| `contactos` | Mensajes del formulario de contacto |
| `reclamaciones` | Registros del libro de reclamaciones (con número de reclamo auto-generado) |
| `consultas_servicio` | Consultas enviadas desde páginas de servicio (nombre, email, vehículo, mensaje, estado) |
| `users` | Usuarios del panel de administración |

---

## Seeders disponibles

```bash
# Poblar marcas y modelos (10 marcas, ~40 modelos)
php artisan db:seed --class=MarcaModeloSeeder

# Poblar servicios (7) y locales (4)
php artisan db:seed --class=ServiciosLocalesSeeder
```

---

## Estructura de carpetas relevante

```
msa_web/
├── app/
│   ├── Filament/Resources/       ← Recursos del panel admin
│   │   ├── Marcas/
│   │   ├── Modelos/
│   │   ├── Servicios/
│   │   ├── Locales/
│   │   ├── Contactos/
│   │   ├── Reclamacions/
│   │   └── ConsultaServicios/
│   ├── Http/Controllers/         ← Controladores del sitio público
│   │   ├── HomeController.php
│   │   ├── MarcaController.php
│   │   ├── ServiciosController.php
│   │   ├── LocalesController.php
│   │   ├── ContactoController.php
│   │   ├── LibroReclamacionesController.php
│   │   └── NosotrosController.php
│   ├── Models/                   ← Modelos Eloquent
│   │   ├── Marca.php
│   │   ├── Modelo.php
│   │   ├── Servicio.php
│   │   ├── Local.php
│   │   ├── Contacto.php
│   │   ├── Reclamacion.php
│   │   └── ConsultaServicio.php
│   └── Providers/
│       └── AppServiceProvider.php  ← View Composer (nav dinámico)
├── database/
│   ├── migrations/               ← Todas las migraciones
│   └── seeders/                  ← Datos de prueba
├── public/
│   ├── css/
│   │   ├── baner.css             ← Estilos del banner principal (3 paneles)
│   │   ├── pages.css             ← Estilos de páginas internas
│   │   └── ...
│   └── img/                      ← Imágenes de marcas y modelos
└── resources/views/
    ├── layouts/app.blade.php     ← Layout principal (nav + footer)
    ├── home.blade.php            ← Página principal
    ├── nosotros.blade.php
    ├── servicios.blade.php       ← Listado de posventa
    ├── locales.blade.php         ← Listado de sedes
    ├── contacto.blade.php
    ├── libro-reclamaciones.blade.php
    ├── marcas/
    │   ├── index.blade.php       ← Listado de marcas
    │   ├── show.blade.php        ← Detalle de marca + modelos
    │   └── modelo.blade.php      ← Detalle de modelo
    ├── servicios/
    │   └── show.blade.php        ← Detalle de servicio + formulario de consulta
    └── locales/
        └── show.blade.php        ← Detalle de sede + mapa + CTA
```

---

## Comandos útiles

```bash
# Limpiar cachés
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Ver todas las rutas
php artisan route:list

# Crear usuario administrador
php artisan make:filament-user

# Ejecutar migraciones frescas (⚠ borra todos los datos)
php artisan migrate:fresh --seed
```

---

## Notas importantes

- El **número de reclamo** se genera automáticamente con el formato `MSA-YYYYMMDD-0001`.
- El **menú de navegación** (Posventa y Locales) es **dinámico**: lee directamente de la base de datos. Si agregas o cambias un servicio/local en el admin, el menú se actualiza automáticamente.
- Las **consultas de servicio** recibidas desde el sitio aparecen en el admin con estado `nuevo` (rojo), `en_revision` (naranja) o `respondido` (verde).
- El panel de admin usa **Filament v5** — para agregar nuevos recursos usar `php artisan make:filament-resource NombreModelo --generate`.

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

In addition, [Laracasts](https://laracasts.com) contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

You can also watch bite-sized lessons with real-world projects on [Laravel Learn](https://laravel.com/learn), where you will be guided through building a Laravel application from scratch while learning PHP fundamentals.

## Agentic Development

Laravel's predictable structure and conventions make it ideal for AI coding agents like Claude Code, Cursor, and GitHub Copilot. Install [Laravel Boost](https://laravel.com/docs/ai) to supercharge your AI workflow:

```bash
composer require laravel/boost --dev

php artisan boost:install
```

Boost provides your agent 15+ tools and skills that help agents build Laravel applications while following best practices.

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
