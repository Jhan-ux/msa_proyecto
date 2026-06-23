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
MSA_WEB es un proyecto de una pagina web que usa un framework llamado Laravel, tiene diferentes funcionalidades tales como mostrar marcas, locales, modelos de locales, contacto e información de la empresa.

```
