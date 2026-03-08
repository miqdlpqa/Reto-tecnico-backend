# 🏢 API Backend - Módulo de Divisiones

Sistema backend desarrollado con **Laravel 10** para gestionar divisiones, subdivisiones y colaboradores de una organización.

---

## 🚀 INICIO RÁPIDO

**Para comenzar a ejecutar el backend, sigue esta guía:**

### 👉 [**VER GUÍA DE EJECUCIÓN**](./Gui_De_Ejecucion.md)

Esta guía contiene **instrucciones paso a paso** para:
- Verificar requisitos (PHP, MySQL, Composer)
- Instalar dependencias
- Configurar la base de datos
- Ejecutar migraciones y seeders
- Iniciar el servidor

---

## 📋 ¿Qué es este proyecto?

Este es un **API REST** que proporciona:

✅ **6 Endpoints CRUD** para gestionar divisiones  
✅ **Base de datos relacional** con 14 divisiones precargadas  
✅ **Documentación interactiva** con Swagger UI  
✅ **Validación de datos** en cada request  
✅ **Relaciones jerárquicas** (divisiones padre-hijo)  

---

## 📊 Características

| Característica | Detalles |
|---|---|
| **Framework** | Laravel 10 |
| **PHP** | 8.1+ |
| **Base de datos** | MySQL 8.0+ |
| **API Documentation** | L5-Swagger (OpenAPI 3.0) |
| **Endpoints** | 6 rutas REST + subdivisiones |
| **Datos precargados** | 14 divisiones en estructura jerárquica |

---

## 🔌 Endpoints Disponibles

```
🔷 GET    http://localhost:8000/api/divisions
🟢 POST   http://localhost:8000/api/divisions
🔷 GET    http://localhost:8000/api/divisions/{id}
🟡 PUT    http://localhost:8000/api/divisions/{id}
🔴 DELETE http://localhost:8000/api/divisions/{id}
🔷 GET    http://localhost:8000/api/divisions/{id}/subdivisions
```

---

## 🗂 Estructura de una División

```json
{
  "id": 1,
  "name": "Presidencia",
  "parent_id": null,
  "level": 1,
  "collaborators": 45,
  "ambassador": "Juan García",
  "created_at": "2026-03-06T17:23:41.000000Z",
  "updated_at": "2026-03-06T17:23:41.000000Z"
}
```

**Campos:**
- `name` (string, max 45 caracteres, único)
- `parent_id` (nullable - referencia a división padre)
- `level` (integer - nivel jerárquico)
- `collaborators` (integer - cantidad de colaboradores)
- `ambassador` (string, nullable - embajador de la división)

---

## 📚 Documentación Adicional

| Archivo | Contenido |
|---------|-----------|
| **[Gui_De_Ejecucion.md](./Gui_De_Ejecucion.md)** | ⭐ **EMPEZAR AQUÍ** - Guía paso a paso |
| [DIVISIONES_API.md](./DIVISIONES_API.md) | Referencia técnica completa |
| [EJEMPLOS_RESPUESTAS.md](./EJEMPLOS_RESPUESTAS.md) | Ejemplos JSON de respuestas |
| [MIGRACIONES_Y_SEEDERS.md](./MIGRACIONES_Y_SEEDERS.md) | Explicación de BD y datos |
| [INSTALACION_Y_EJECUCION.md](./INSTALACION_Y_EJECUCION.md) | Instalación en otra PC |

---

## 🖥 Acceso a la API

Con el servidor ejecutando:

**Swagger UI (Documentación Interactiva):**
```
http://localhost:8000/api/documentation
```

**API Base URL:**
```
http://localhost:8000/api
```

---

## 🛠 Requisitos Previos

Antes de empezar, verifica que tengas instalado:

- **PHP 8.1+** → [Descargar](https://www.php.net/downloads)
- **MySQL 8.0+** → [Descargar](https://dev.mysql.com/downloads/mysql/)
- **Composer** → [Descargar](https://getcomposer.org/)

---

## ⚡ Comando Rápido (solo si tienes todo instalado)

```bash
cd "ruta/al/backend"
composer install
cp .env.example .env
php artisan key:generate
mysql -u root -p -e "CREATE DATABASE divisiones_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
php artisan migrate
php artisan db:seed --class=DivisionSeeder
php artisan l5-swagger:generate
php artisan serve
```

Luego abre: `http://localhost:8000/api/documentation`

---

## 🔗 Relaciones de Datos

### Estructura Jerárquica
```
Presidencia (nivel 1)
├── Dirección General (nivel 2)
│   └── Asuntos Legales (nivel 3)
└── ...

Administración (nivel 1)
├── Recursos Humanos (nivel 2)
├── Finanzas (nivel 2)
└── ...
```

Cada división puede tener:
- **Parent:** referencia a su división padre (si existe)
- **Children:** lista de sus subdivisiones
- **AllChildren:** método para obtener todas las subdivisiones recursivas

---

## 📝 Validación

Al crear/actualizar una división:

```php
'name' => 'required|string|max:45|unique:divisions,name',
'parent_id' => 'nullable|exists:divisions,id',
'level' => 'required|integer|min:1',
'collaborators' => 'required|integer|min:0',
'ambassador' => 'nullable|string|max:255'
```

---

## 🗄 Base de Datos

La BD se crea automáticamente con:
- **Tabla:** `divisions`
- **Registros iniciales:** 14 divisiones organizadas jerárquicamente
- **Timestamps:** created_at, updated_at automáticos
- **Restricciones:** Cascade delete en relaciones padre-hijo

---

## ❓ Primeros Pasos

1. **Descargaste el proyecto** → Ve a [Gui_De_Ejecucion.md](./Gui_De_Ejecucion.md)
2. **Necesitas documentación** → Revisa los archivos `.md` en esta carpeta
3. **Quieres probar la API** → Abre Swagger en `http://localhost:8000/api/documentation`
4. **Tienes dudas** → Consulta [EJEMPLOS_RESPUESTAS.md](./EJEMPLOS_RESPUESTAS.md)

---

## 💡 Tips

- 📌 Las migraciones crean las tablas automáticamente
- 📌 Los seeders insert datos de ejemplo (14 divisiones)
- 📌 L5-Swagger genera documentación interactiva
- 📌 Usa `php artisan tinker` para consultar datos desde consola
- 📌 Limpia caché si Swagger se ve en blanco: `Ctrl + Shift + Delete`

---

## 🆘 Problemas Comunes

| Problema | Solución |
|----------|----------|
| "mysql: no se reconoce" | Instala MySQL desde https://dev.mysql.com/downloads/mysql/ |
| "SQLSTATE[HY000] Connection refused" | MySQL no está corriendo → Inicia desde Services |
| "Class 'PDO' not found" | Habilita `extension=pdo_mysql` en php.ini |
| "Swagger en blanco" | Limpia caché: Ctrl + Shift + Delete |
| "Database does not exist" | Crea la BD manualmente: `CREATE DATABASE divisiones_db ...;` |

---

## 📄 Licencia

Este proyecto es software de código abierto bajo licencia [MIT](https://opensource.org/licenses/MIT).

---

**¿Listo para empezar?** → [👉 VER GUÍA DE EJECUCIÓN](./Gui_De_Ejecucion.md)

