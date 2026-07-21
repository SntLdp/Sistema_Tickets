# Sistema de Gestión de Tickets — Ingeniería de Sistemas

Sistema profesional de gestión de tickets construido con **Laravel 12**, **PHP 8.4**, **MySQL**, **Tailwind CSS** y **Alpine.js**.

## Instalación

```bash
composer install
npm install

cp .env.example .env
php artisan key:generate

# Configura tu base de datos MySQL en .env, luego:
php artisan migrate --seed

npm run build   # o npm run dev en desarrollo
php artisan serve
```

## Usuario administrador inicial

Tras ejecutar los seeders, podrás iniciar sesión como Ingeniero de Sistemas con:

- **Correo:** `admin@sistema-tickets.local`
- **Contraseña:** `CambiarPassword123!`

⚠️ Cambia esta contraseña inmediatamente después del primer inicio de sesión.

## Estructura del proyecto

- `app/Models` — Entidades Eloquent (User, Ticket, TicketCategory, TicketComment, TicketStatusHistory, Role)
- `app/Enums` — `TicketPriority` y `TicketStatus` (con colores de badge y transiciones válidas)
- `app/Http/Controllers/User` — Módulo del Usuario (crear/consultar tickets propios)
- `app/Http/Controllers/Engineer` — Módulo del Ingeniero (dashboard, gestión, categorías, reportes)
- `app/Services` — Lógica de negocio (`TicketService`, `ReportExportService`)
- `app/Policies/TicketPolicy` — Autorización por rol
- `resources/views` — Vistas Blade + Tailwind, organizadas por módulo
- `database/migrations` y `database/seeders` — Esquema completo de base de datos

## Roles

| Rol | Permisos |
|---|---|
| Usuario | Crear tickets, ver el estado de sus propios tickets (no puede editar tickets cerrados) |
| Ingeniero de Sistemas | Dashboard, gestión completa de tickets, clasificación, comentarios internos, categorías, reporte diario con exportación a PDF/Excel |

## Módulos incluidos

1. Autenticación y control de roles (registro público solo crea usuarios con rol "usuario")
2. Creación y seguimiento de tickets con prioridad (alta/moderada/baja)
3. Dashboard con estadísticas, gráfico de barras (últimos 7 días) y gráfico circular por prioridad
4. Gestión de tickets: cambio de estado con historial auditado, clasificación, notas internas
5. Categorías dinámicas (el ingeniero puede agregar nuevas)
6. Reporte diario con filtros, totales por prioridad/estado y exportación a PDF, Excel e impresión
7. Búsqueda y filtros en tiempo real (fecha, usuario, prioridad, clasificación, estado)
