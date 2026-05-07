# Pokemon API PHP Clean Architecture

Proyecto backend desarrollado en PHP puro utilizando arquitectura por capas, consumo de APIs externas, procedimientos almacenados y auditoría mediante triggers.

## Características

- PHP puro con Composer
- Arquitectura tipo Clean Architecture
- Consumo de PokeAPI
- Stored Procedures
- Triggers de auditoría
- Variables de entorno con dotenv
- Router personalizado
- Integración con MySQL
- Patrón Controller / Service / Repository

---

# Estructura del Proyecto

```bash
src/
├── Clients/
├── Config/
├── Controllers/
├── Repositories/
├── Services/

database/
├── procedures/
├── schema/
├── triggers/

public/
storage/
```

---

# Tecnologías Utilizadas

- PHP 8+
- MySQL
- Composer
- PHPMailer
- vlucas/phpdotenv

---

# Configuración del Proyecto

## 1. Clonar repositorio

```bash
git clone <repo-url>
```

---

## 2. Instalar dependencias

```bash
composer install
```

---

## 3. Configurar variables de entorno

Crear archivo:

```bash
.env
```

Basado en:

```bash
.env.example
```

Ejemplo:

```env
DB_DSN=mysql:host=localhost;dbname=Pokedex
DB_USER=root
DB_PASS=
```

---

# Base de Datos

## Crear estructura

Ejecutar:

```bash
database/schema/create_tables.sql
```

---

## Crear Stored Procedures

Ejecutar:

```bash
database/procedures/spRegistrarPokemon.sql
database/procedures/spBorrarPokemon.sql
```

---

## Crear Triggers

Ejecutar:

```bash
database/triggers/pokemon_triggers.sql
database/triggers/habilidad_triggers.sql
database/triggers/sprite_triggers.sql
```

---

# Arquitectura

El proyecto implementa separación de responsabilidades:

## Controllers
Manejo de request y response.

## Services
Lógica de negocio.

## Repositories
Persistencia y acceso a base de datos.

## Clients
Consumo de APIs externas.

---

# Auditoría

Los triggers registran automáticamente:

- INSERT
- UPDATE
- DELETE

sobre las entidades principales.

Los eventos son almacenados en la tabla:

```bash
Bitacoras
```

---

# API Externa

El proyecto consume información desde:

https://pokeapi.co/

---

# Desarrollo

Actualizar autoload de Composer:

```bash
composer dump-autoload
```

---

# Ejecutar proyecto

```bash
php -S localhost:8000 -t public
```

---

# Endpoint Actual

## Registrar Pokémon

```http
POST /pokemon
```

Body:

```json
{
  "pokemon": "pikachu"
}
```