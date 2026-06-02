# Comandos de despliegue — MSA Automotriz

## Subir cambios al servidor (desde PowerShell local)

```powershell
rsync -avz --exclude='.env' --exclude='node_modules' --exclude='.git' --exclude='storage/logs' `
  /c/Users/INSTRUCTOR-Z5403/Desktop/msa_proyecto/ `
  msaautom@s301.hostgator.com:/home/msaautom/repositories/msa_proyecto/
```

## Limpiar caché en el servidor (SSH)

```bash
bash -lc 'PHP83=/opt/cpanel/ea-php83/root/usr/bin/php; APP=~/repositories/msa_proyecto; $PHP83 "$APP/artisan" config:cache && $PHP83 "$APP/artisan" view:clear && $PHP83 "$APP/artisan" route:clear'
```

## Verificar migraciones

```bash
bash -lc 'PHP83=/opt/cpanel/ea-php83/root/usr/bin/php; APP=~/repositories/msa_proyecto; $PHP83 "$APP/artisan" migrate:status'
```

## Ejecutar migraciones nuevas (si las hay)

```bash
bash -lc 'PHP83=/opt/cpanel/ea-php83/root/usr/bin/php; APP=~/repositories/msa_proyecto; $PHP83 "$APP/artisan" migrate'
```

## Datos de conexión

- **Servidor:** s301.hostgator.com
- **Usuario SSH:** msaautom
- **PHP CLI (8.3):** `/opt/cpanel/ea-php83/root/usr/bin/php`
- **App en servidor:** `/home/msaautom/repositories/msa_proyecto`
- **Document root:** `/home/msaautom/public_html`
- **Base de datos:** `msaautom_pagina`
- **Usuario BD:** `msaautom_martos`

## Flujo de trabajo

1. Editar archivos localmente
2. Ejecutar `rsync` desde PowerShell
3. Limpiar caché en el servidor
4. Verificar en https://msaautomotriz.com
