# Pokemon API PHP - Clean Architecture

Proyecto backend en PHP puro estructurado con arquitectura por capas.

## Características

- Consumo de PokeAPI
- Persistencia en base de datos
- Envío de correos con PHPMailer
- Uso de variables de entorno (.env)

## Estructura

src/
  Controllers/
  Services/
  Repositories/
  Clients/
  Config/

## Instalación

composer install
cp .env.example .env

## Desarrollo

Para actualizar el autoload al agregar nuevas clases:

composer dump-autoload

## Endpoint

POST /pokemon

Body:
pokemon: string

## Arquitectura

El proyecto sigue una arquitectura por capas:

- Controllers: manejo de request/response
- Services: lógica de negocio
- Repositories: acceso a datos (pendiente)
- Clients: consumo de APIs externas

## Base de Datos

El proyecto utiliza un stored procedure:

spRegistrarPokemon

Encargado de persistir la información del Pokémon en la base de datos.