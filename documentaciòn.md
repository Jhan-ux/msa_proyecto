DOCUMENTACIÒN DE LA WEB DE MSA AUTOMOTRIZ(desarrollada en Laravel ):

=====IP por defecto====
192.168.1.199

Panel principal:

======HEADER======

- Nosotros.
. Contenido
ruta: msa_web/resources/views/nosotros.blade.php
. Estilo
ruta: msa_web/public/css/nostros.css

- Marcas.
. Contenido
ruta: msa_web/resources/views/marcas/index.php
. Estilos
ruta: msa_web/public/css/marca_page.css

- Posventa.
. Contenido
ruta: msa_web/resources/views/servicios.blade.php
. Estilo.+
ruta: msa_web/public/css/servicios.css

- Locales
. Contenido
ruta: msa_web/resources/views/locales.blade.php
. Estilo
ruta: msa_web/public/css/locales.css

- Contacto
. Contenido
ruta: msa_web/resources/views/contacto.blade.php
. Estilos
ruta: msa_web/public/css/contacto.css

=======BODY======

- baner de los 3 modelos destacados (chevrolet, honda motos, isuzu camiones)
ruta de contenido y estilo: msa_web/resources/home.blade.php

- modelos destacados
estos se editan desde el  panel de admin que se encuentra en la siguiente ruta: msaautomotriz.com/admin/boton Marcas

- servicios de posventa
estos se editan desde el  panel de admin que se encuentra en la siguiente ruta: msaautomotriz.com/admin/boton Servicios

- transporte y tentign
estos se editan desde el  panel de admin que se encuentra en la siguiente ruta: msaautomotriz.com/admin/boton Transporte y Renting

- encuentra el vehiculo perfeccto para ti
ruta: msa_web/resources/views/home.blade.php(sección Buscador de vehculos)

- por que elegirnos
ruta: msa_web/resources/views/home.blade.php(sección ¿Por qué elegirnos?)

- nuestras sedes
estos se editan desde el  panel de admin que se encuentra en la siguiente ruta: msaautomotriz.com/admin/boton Locales

=====FOOTER======
- redes sociales
ruta: msa_web/resourses/views/home.blade.php(bloque de Footer)

- nuestras marcas
ruta contenido: msa_web/resources/views/marcas/index.php
ruta estilos: msa_web/public/css/body_marcas.css

- servicios
ruta contenido: msa_web/resources/views/servicios/show.blade.php
ruta estilos: msa_web/public/css/body_servicios.php

- contacto
ruta contenidp: msa_web/resources/views/contacto.blade.php
ruta de estilos: msa_web/public/css/contacto.css
- libro de reclamaciones
ruta contenido: msa_web/resources/views/libro-reclamaciones.blade.php
ruta estilos: msa_web/public/css/libro_reclamaciones.css

========PANEL ADMIN=======

Panel Admin(desarrollado con Filament):

=====Comunicacipnes:=====
- Mensaje de Contacto
ruta cotenido:msa_web/app/filament-resources/contactos/pages/(dependiendo a lo que necesite hacer abra el dox correspondiente)
ruta estilo:
ruta base de datos:

- Reclamaciones
ruta contenido: msa_web/filament-resource/reclamacions/pages/(dependiendo a lo que se necesite hacer, abra el dox correspondiente)
ruta estilo:
ruta base de datos:

- Consulta de Servicios
ruta contendio: msa_web/filament-resource/consultaServicio/(dependiendo a lo que se necesite hacer, abra el dox correspondiente)
ruta estilos:
ruta base de datos:

=====Catalágo:=====

- Marcas
rutqs contendor: msa_web/filament-resources/marcas/(dependiendo a lo que se necesite hacer, abra el dox correspondiente)
rutas diseño contenedor:

- Modelos
rutas contenedor: msa_web/filament-resources/modelos/(dependiendo a lo que se necesite hacer, abra el dox correspondiente)
rutas diseño contenedor:

- Servicios
rutas contenedor: msa_web/filament-resources/servicios/(dependiendo a lo que se necesite hacer, abra el dox correspondiente)
rutas diseño cinntenedor:

- Locales
rutas contenedor: msa_web/filament-resources/servicios/(dependiendo a lo que se necesite hacer, abra el dox correspondiente)
rutas diseño contenedor:

- Transporte y Renting
rutas contenedor: msa_web/filament-resource/transporteRenting/(dependiendo a lo que se necesite hacer, abra el dox correspondiente)
rutas diseño contenedor:

=====Administración:=====
- Usuarios
rutas contenedor: msa_web/filament-resources/users/(dependiendo a lo que se necesite hacer, abra el dox correspondiente)
rutas de diseño contenedor:

Base de datos(desarrollado con MySQL):
backup creado y almacenado, solicitar drive en caso de fallas.
Tablas:
- cache
- cache_locks
- consultas_servicio
- contacto
- falled_jobs
- jobs
- job_batches
- locales
- marcas
- migrations
- modelos
- passwords_reset_tokens
- reclamaciones
- servicios
- sessions
- transporte_renting
- users
- versiones


