# Pokemon API PHP Clean Architecture

Proyecto desarrollado en PHP utilizando una arquitectura limpia (Clean Architecture) para consumir la PokeAPI, registrar Pokémon en MySQL y enviar información por correo electrónico.

---

## Características

- Consumo de API externa (PokeAPI)
- Arquitectura limpia en PHP
- API REST personalizada
- Frontend modularizado con jQuery + Bootstrap
- Registro de Pokémon en MySQL
- Eliminación de Pokémon
- Validación de registros duplicados
- Envío de correos con PHPMailer
- Stored Procedures
- Triggers para bitácora
- Swagger/OpenAPI Documentation
- Indicador visual de Pokémon registrados

---

## Tecnologías utilizadas

- PHP 8
- MySQL
- jQuery
- Bootstrap
- PHPMailer
- Composer
- Swagger / OpenAPI
- Apache

---

## Arquitectura del proyecto
src/  
├── Config/  
├── Controllers/  
├── Services/  
├── Repositories/  
├── Infrastructure/  
├── Mail/  
├── Docs/  
  
public/  
├── assets/  
│ ├── css/  
│ ├── js/  
│ │ ├── api/  
│ │ ├── events/  
│ │ ├── ui/  
│ │ └── app.js  
│
├── views/  
│ ├── partials/  
│ └── index.php  

database/  
├── tables/  
├── procedures/  
└── triggers/  


---

## Instalación

### 1. Clonar repositorio

```bash
git clone https://github.com/TU-USUARIO/pokemon-api-php-clean-architecture.git
```

### 2. Instalar dependencias
```bash
composer install
```

### 3. Crear archivo .env
```
DB_HOST=localhost
DB_NAME=pokedex
DB_USER=root
DB_PASSWORD=

MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=correo@gmail.com
MAIL_PASSWORD=password_app
MAIL_FROM=correo@gmail.com
MAIL_FROM_NAME=Pokemon API
```

### 4. Configurar base de datos
database/tables/create_tables.sql
database/procedures/
database/triggers/

## Ejecutar proyecto
### Opción 1 — Apache/WAMP
```
http://localhost/pokemon-api-php-clean-architecture/public
```
###
```
php -S localhost:8000 -t public
``` 
Abrir: 
```
http://localhost:8000
```

## Endpoints API
### Obtener Pokémon
```
GET /pokemon?name=pikachu
```

### Registrar Pokémon
```
POST /pokemon
```
#### Body:
```
{
  "name": "pikachu",
  "number": 25
}
```

### Eliminar Pokémon
```
DELETE /pokemon
```

### Enviar correo
```
POST /mail
```

## Swagger Documentation
```
http://localhost:8000/docs
```

## Funcionalidades del frontend
* Listado dinámico desde PokeAPI
* Modal para guardar Pokémon
* Modal para eliminar Pokémon
* Modal para envío de correo
* Cards dinámicas
* Renderizado de habilidades
* Renderizado de sprites
* Indicador visual de Pokémon registrados
* Botón guardar deshabilitado para Pokémon existentes
* Base de datos

## El proyecto utiliza:
* Stored Procedures
* Triggers
* Relaciones entre tablas
* Bitácora de acciones

## Triggers implementados
### INSERT
Registro automático en bitácora.
### UPDATE
Registro automático en bitácora.
### DELETE
Registro automático en bitácora.