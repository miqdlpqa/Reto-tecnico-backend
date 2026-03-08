# 🚀 CÓMO EJECUTAR EL BACKEND - GUÍA RÁPIDA

> **Sigue esta guía para que el backend corra correctamente.**

---

## ⚡ INICIO RÁPIDO (3 minutos)

Si ya tienes PHP 8.1+, MySQL y Composer instalados:

```bash
# 1. Entra a la carpeta backend
cd "ruta\donde\descargaste\Reto tecnico\backend"

# 2. Instala dependencias
composer install

# 3. Copia configuración
cp .env.example .env

# 4. Genera clave
php artisan key:generate

# 5. CREA LA BD (ejecuta en MySQL primero)
mysql -u root -p
CREATE DATABASE divisiones_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
EXIT;

# 6. Crea las tablas
php artisan migrate

# 7. Llena con datos de ejemplo
php artisan db:seed --class=DivisionSeeder

# 8. Verifica que se insertaron 14 divisiones
php artisan tinker
> App\Models\Division::count();
> exit

# 9. Genera documentación
php artisan l5-swagger:generate

# 10. Inicia servidor
php artisan serve
```

**Luego abre:** `http://localhost:8000/api/documentation`

---

## 📋 REQUISITOS PREVIOS (Instalalos primero)

### 1️⃣ **PHP 8.1 o Superior**

**Verificar si lo tienes:**
```bash
php --version
```

**Si NO lo tienes:**
- Descarga: https://www.php.net/downloads
- Instálalo
- Reinicia PowerShell
- Verifica: `php --version`

---

### 2️⃣ **MySQL 8.0+**

**Verificar si lo tienes:**
```bash
mysql --version
```

**Si NO lo tienes:**
- Descarga: https://dev.mysql.com/downloads/mysql/
- Instálalo
- **Importante:** En Windows, inicia el servicio MySQL desde Panel de Control → Servicios

**Verificar que esté corriendo:**
```bash
mysql -u root -p

EXIT;
```

---

### 3️⃣ **Composer**

**Verificar si lo tienes:**
```bash
composer --version
```

**Si NO lo tienes:**
- Descarga: https://getcomposer.org/
- Instálalo como administrador
- Reinicia PowerShell
- Verifica: `composer --version`

---

## 🔧 PASO A PASO DETALLADO

### **PASO 1: Abre PowerShell en la carpeta del proyecto**

**Opción A: Desde el Explorador**
- Abre la carpeta donde descargaste "Reto tecnico"
- Entra a la carpeta `backend`
- Haz clic en la barra de direcciones
- Escribe `powershell` y presiona Enter

**Opción B: Desde PowerShell**
```bash
cd "C:\Users\TuUsuario\Desktop\Reto tecnico\backend"

```

**Verifica que estés en la carpeta correcta:**
```bash
dir 
```

Deberías ver: `artisan`, `app/`, `database/`, `routes/`, `composer.json`, etc.

---

### **PASO 2: Instala las librerías PHP**

```bash
composer install
```

⏳ **Espera 2-5 minutos** (depende de tu internet)

✅ **Resultado esperado:**
```
... (muchas líneas)
No security vulnerability advisories found.
```

---

### **PASO 3: Copia el archivo de configuración**

```bash
cp .env.example .env
```

✅ **Se crea el archivo `.env` automáticamente**

---

### **PASO 4: Genera la clave secreta de la app**

```bash
php artisan key:generate
```

✅ **Resultado esperado:**
```
Application key set successfully.
```

---

### **PASO 5: Crea la base de datos**

**Opción A: Desde PowerShell (Recomendado)**

```bash
mysql -u root -p
```

Se te pedirá contraseña. Presiona Enter si no la tienes, o ingresa tu contraseña.

Luego ejecuta:
```sql
CREATE DATABASE divisiones_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
EXIT;
```

**Opción B: Desde phpMyAdmin**
1. Abre: `http://localhost/phpmyadmin`
2. Haz clic en "Nueva"
3. Nombre: `divisiones_db`
4. Haz clic en "Crear"

✅ **BD creada**

---

### **PASO 6: Ejecuta las migraciones**

```bash
php artisan migrate
```

✅ **Resultado esperado:**
```
Migration table created successfully.
2026_03_06_172341_create_divisions_table ... 107ms DONE
```

---

### **PASO 7: Llena la BD con datos**

```bash
php artisan db:seed --class=DivisionSeeder
```

✅ **Datos precargados**: Se insertan 14 divisiones

**Verifica que se insertaron:**
```bash
php artisan tinker
> App\Models\Division::count();
```

Deberías ver: `= 14`

Presiona `exit` para salir

---

### **PASO 8: Genera la documentación (Swagger)**

```bash
php artisan l5-swagger:generate
```

✅ **Documentación creada**

---

### **PASO 9: Inicia el servidor**

```bash
php artisan serve
```

✅ **Resultado esperado:**
```
INFO  Server running on [http://127.0.0.1:8000]

Press Ctrl+C to quit
```

---

## 🌐 ACCEDE A LA API

Con el servidor corriendo, abre tu navegador en:

```
http://localhost:8000/api/documentation
```

Verás:
- 🟦 Interfaz visual de Swagger UI
- 📋 Todos los 6 endpoints documentados
- ▶️ Botón "Try it out" para probar
- 📊 Respuestas en JSON con ejemplos

---

## 🛑 DETENER EL SERVIDOR

En la PowerShell donde corre el servidor, presiona:

```
Ctrl + C
```

El servidor se detiene inmediatamente.

---

## ✅ CHECKLIST DE VERIFICACIÓN

Antes de considerar todo listo, verifica:

- [ ] PHP 8.1+ instalado (`php --version`)
- [ ] MySQL instalado y corriendo
- [ ] Composer instalado (`composer --version`)
- [ ] Carpeta correcta: `backend/artisan` existe
- [ ] `composer install` completado sin errores
- [ ] `.env` creado
- [ ] `php artisan key:generate` ejecutado
- [ ] BD `divisiones_db` creada
- [ ] `php artisan migrate` ejecutado
- [ ] `php artisan db:seed` ejecutado
- [ ] 14 divisiones en BD (`App\Models\Division::count()` = 14)
- [ ] `php artisan l5-swagger:generate` completado
- [ ] Servidor corriendo: `php artisan serve`
- [ ] Swagger en: `http://localhost:8000/api/documentation`

---

## ❌ PROBLEMAS COMUNES

### **❌ "mysql: el término no se reconoce"**
- MySQL no está instalado
- O no está en el PATH
- Solución: Descarga de https://dev.mysql.com/downloads/mysql/

### **❌ "SQLSTATE[HY000] [2002] Connection refused"**
- MySQL no está corriendo
- Solución: Services (Servicios) → Busca MySQL → Iniciar

### **❌ "composer: el término no se reconoce"**
- Composer no está instalado
- Solución: Descarga de https://getcomposer.org/

### **❌ "Class 'PDO' not found"**
- PHP sin extensión MySQL
- Solución: Habilita `extension=pdo_mysql` en `php.ini`

### **❌ "Database does not exist"**
- No creaste la BD manualmente
- Solución: Ejecuta en MySQL:
  ```sql
  CREATE DATABASE divisiones_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
  ```

### **❌ Swagger en blanco**
- Caché del navegador
- Solución: 
  - Ctrl + Shift + Delete (limpiar caché)
  - O abre en incógnito: Ctrl + Shift + N

---

## 📚 DOCUMENTACIÓN ADICIONAL

Después de que el backend esté corriendo, consulta:

| Documento | Para |
|-----------|------|
| `MIGRACIONES_Y_SEEDERS.md` | Entender cómo funciona la BD |
| `EJEMPLOS_RESPUESTAS.md` | Ver respuestas JSON de cada endpoint |
| `DIVISIONES_API.md` | Referencia técnica completa |
| `INSTALACION_Y_EJECUCION.md` | Instalación en otra PC |

---

## 🎯 COMANDOS ÚTILES

```bash
# Ver estado de las migraciones
php artisan migrate:status

# Resetear TODO (borra datos y recrea)
php artisan migrate:fresh --seed

# Consultar divisiones desde consola
php artisan tinker
> App\Models\Division::all();
> exit

# Limpiar caché
php artisan cache:clear

# Regenerar Swagger
php artisan l5-swagger:generate

# Ver todas las rutas
php artisan route:list
```

---

## ✨ RESUMEN

| Paso | Comando | Resultado |
|------|---------|-----------|
| 1 | `cd "..."` | Estás en la carpeta backend |
| 2 | `composer install` | Librerías instaladas |
| 3 | `cp .env.example .env` | Archivo de configuración listo |
| 4 | `php artisan key:generate` | Clave secreta generada |
| 5 | Crear BD manualmente | `divisiones_db` creada |
| 6 | `php artisan migrate` | Tablas creadas |
| 7 | `php artisan db:seed` | 14 divisiones insertadas |
| 8 | `php artisan l5-swagger:generate` | Swagger listo |
| 9 | `php artisan serve` | Servidor en puerto 8000 |

---

## 🎉 ¡LISTO!

Si completaste todos los pasos sin errores, tu backend está completamente funcional.

**Accede a:** `http://localhost:8000/api/documentation`

**Y comienza a usar la API!**

---

## 💡 TIPS

- 📌 Siempre asegúrate de que MySQL esté corriendo antes de ejecutar comandos
- 📌 Si haces cambios en seeders, ejecuta: `php artisan migrate:fresh --seed`
- 📌 Para ver qué hay en la BD: `php artisan tinker` → `App\Models\Division::all();`
- 📌 Si algo no funciona, revisa que estés en la carpeta correcta (`ls` debe mostrar `artisan`)

---

**¿Dudas?** Revisa los documentos `*.md` en la carpeta del proyecto.
