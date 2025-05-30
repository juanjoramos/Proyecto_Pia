# 📘 Proyecto Final PIA - Sistema de Administración de Proyectos

Este proyecto fue desarrollado por el Equipo F para el curso **ET0179 - Desarrollo Web con Nuevas Tecnologías** de la institución **Pascual Bravo**. El objetivo principal es gestionar los proyectos de aula a través de un sistema web, implementando herramientas modernas como Laravel, Breeze, Tailwind y Spatie.

---

## 👨‍👩‍👧‍👦 Integrantes del Equipo F

| Nombre                         | Foto                                                        |
|-------------------------------|-------------------------------------------------------------|
| Ximena Zamudio Mesa            | <img src="fotos/ximena.jpg" alt="Ximena Zamudio Mesa" width="150">          |
| John Jairo Cañaveral Gutiérrez| <img src="fotos/john.jpg" alt="John Jairo Cañaveral Gutiérrez" width="150"> |
| Juan José Ramos Agudelo        | <img src="fotos/juan.jpg" alt="Juan José Ramos Agudelo" width="150">        |
| Estiven Toro                   | <img src="fotos/estiven.jpg" alt="Estiven Toro" width="150">                |

---

## 🛠️ Tecnologías Usadas

- **Versión de Laravel:** 11
- **Base de datos:** PostgreSQL
- **Autenticación:**
  - Laravel Breeze (incluye Tailwind CSS)
- **Gestión de seguridad:**
  - Spatie Laravel-permission
- **Node.js y npm:**
  - Para ejecutar Tailwind CSS

---

## 🖼️ Capturas del Sistema

### 📌 Inicio de sesión
![Login](fotos/login.png)

### 📌 Panel de administración
![Dashboard](fotos/dashboard.png)

---

## 📁 Estructura del Proyecto

```
Proyecto_Pia/
├── proyecto/               → Código fuente Laravel
├── documentos/             → Informes, ER, diccionario de datos
├── fotos/                  → Fotos de los integrantes, pantallazos del sistema
├── manuales/               → Manual del sistema
├── README.md               → Este archivo
```

---

## 👤 Responsabilidades por Integrante

- **Estiven Toro**: Migraciones, rutas, diseño de interfaz, lógica CRUD.
- **Ximena Zamudio**: Manual del sistema, presentación en video, Modelo Conceptual.
- **John Jairo Cañaveral**: Autenticación, roles y permisos con Spatie, Diccionario de Datos.
- **Juan José Ramos**: Desarrollo de vistas Blade, controladores, Models.

---

## 📎 Video de Presentación

📺 Enlace al video: [Ver en YouTube](https://enlace-a-video.com)

---

## 🧭 Instrucciones de Instalación, Configuración y Arranque del Proyecto

Bienvenidos a una experiencia Laravel!

1. Ubicarse en una carpeta en el disco local.
2. Clonar el proyecto: `git clone https://github.com/juanjoramos/Desarrollo-Web.git`
3. Abrir la carpeta: `cd Proyecto_Pia`
4. Ejecutar: `composer update`
5. Crear el archivo `.env` (puedes copiarlo desde `.env.example`).
6. Configurar la base de datos en el `.env` (nombre: `proyecto_pia`).
7. Crear la base de datos en pgAdmin4 con el nombre `proyecto_pia`.
8. Ejecutar migraciones: `php artisan migrate`
9. Generar clave de la app: `php artisan key:generate`
10. Abrir 2 terminales en VS Code:
    - Terminal 1: `php artisan serve` → http://localhost:8000
    - Terminal 2: `npm install` y luego `npm run dev`
11. Acceder a la URL [http://localhost:8000](http://localhost:8000)

---

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

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

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
