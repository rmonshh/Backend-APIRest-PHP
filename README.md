# API REST de productos con PHP

## Descripción

Proyecto de desarrollo de una API REST básica en PHP que permite consultar productos y crear nuevos mediante peticiones HTTP. La API procesa los datos recibidos, gestiona las solicitudes y devuelve respuestas en formato JSON.

Los datos se almacenan actualmente en un array en memoria, simulando una pequeña fuente de datos, con el objetivo de comprender el funcionamiento de un backend y la comunicación entre aplicaciones.

## Tecnologías

- PHP
- HTTP (GET y POST)
- JSON
- CORS

## Funcionalidades

- Consultar todos los productos disponibles.
- Buscar productos mediante su ID.
- Crear nuevos productos mediante peticiones POST.
- Recibir datos JSON desde el cliente.
- Validar los datos recibidos.
- Devolver respuestas JSON.
- Gestionar códigos de estado HTTP.
- Configurar cabeceras CORS para permitir peticiones externas.

## Endpoints

| Método | Endpoint | Descripción |
|---|---|---|
| GET | `/api.php` | Obtener todos los productos |
| GET | `/api.php?id=1` | Buscar un producto por ID |
| POST | `/api.php` | Crear un nuevo producto |

## Ejemplo de respuesta

```json
[
  {
    "id": 1,
    "nombre": "Arroz",
    "precio": 2.00
  },
  {
    "id": 2,
    "nombre": "Leche",
    "precio": 1.20
  }
]
```

## Objetivo del proyecto

Practicar el desarrollo backend con PHP, comprender el funcionamiento de las APIs REST, el protocolo HTTP, el intercambio de información mediante JSON y la comunicación entre frontend y backend.

## Próximas mejoras

- Conexión con una base de datos MySQL.
- Persistencia de los productos.
- Implementación de PUT y DELETE.
- Mejora de la validación de datos.
- Integración con un frontend desarrollado en Angular.