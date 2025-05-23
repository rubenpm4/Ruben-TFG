# ⚽ Kizuma - Red Social Temática de Fútbol

Kizuma es una red social centrada en el fútbol, donde los usuarios pueden compartir publicaciones, seguir a otros aficionados, interactuar con comentarios, likes, menciones, y ver estadísticas como clasificaciones de LaLiga. Además, cuenta con un sistema de administración donde los usuarios pueden ser moderados.

---

## 🚀 Funcionalidades principales

- Registro e inicio de sesión de usuarios.
- Publicaciones con sistema de comentarios, likes y menciones (@usuario).
- Sistema de seguidores/seguidos.
- Página de perfil con estadísticas.
- Clasificación de Primera y Segunda División Española.
- Sistema de notificaciones en tiempo real.
- Panel de administración para banear usuarios.

---

## 🔧 Tecnologías utilizadas

- Laravel (Framework PHP)
- Blade (Motor de plantillas)
- Tailwind CSS (Estilos)
- MySQL (Base de datos)
- Laravel Notifications
- Font Awesome (Iconos)

---

## 🖥️ Requisitos previos

- PHP 8.1 o superior
- Composer
- MySQL o MariaDB
- Node.js y npm
- Git

---

## 📦 Instalación del proyecto

```bash
# 1. Clona el repositorio
git clone https://github.com/tu-usuario/kizuma.git
cd kizuma

# 2. Instala dependencias PHP
composer install

# 3. Copia el archivo de entorno y configúralo
cp .env.example .env
# Luego edita .env para ajustar la conexión a tu base de datos

# 4. Genera la clave de la app
php artisan key:generate

# 5. Ejecuta las migraciones
php artisan migrate

# 6. Instala dependencias frontend y compílalas
npm install
npm run dev

# 7. Inicia el servidor local
php artisan serve
