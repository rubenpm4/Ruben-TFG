# ⚽ Kizuma - Red Social Temática de Fútbol

Kizuma es una red social centrada en el fútbol, desarrollada con Laravel. Permite a los usuarios registrarse, publicar contenido, seguir a otros, interactuar mediante comentarios, menciones, likes y ver estadísticas deportivas.

---

## 🖥️ Requisitos

- PHP 8.1 o superior
- Composer
- MySQL o MariaDB
- Node.js y npm
- Git

---

## 📦 Instrucciones de instalación (Windows/Linux)

### 1. Clona el repositorio

```bash
git clone https://github.com/rubenpm4/Ruben-TFG.git
cd Ruben-TFG
```

### 2. Instala las dependencias PHP

```bash
composer install
```

### 3. Copia y configura el archivo de entorno

```bash
cp .env.example .env
```

Luego edita el archivo .env y ajusta los valores de conexión a tu base de datos:
```
DB_DATABASE=kizuma_score
DB_USERNAME=root
DB_PASSWORD=tu_contraseña
```

### 4. Genera la clave de la aplicación

```bash
php artisan key:generate
```

### 5. Exporta tu base de datos (Yo ya tengo subido en mi GitHub mi archivo de base de datos)

```bash
mysqldump -u root -p kizuma_score > database_export.sql
```

6. (Opcional) Instala y compila dependencias frontend

```bash
npm install
npm run build
```

7. Inicia el servidor

```bash
php artisan serve
```
