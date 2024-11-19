# Vitafy Challenge

## Resumen
El propósito de este desafío es poder verificar los conocimientos relativos a la abstracción de estructuras de datos, desacople y escalabilidad de una aplicación.

### Proyecto
El proyecto es un CRUD de leads, donde se podrá registrar un lead junto con un cliente, actualizarlo y eliminarlo. Cada lead debe conectar con un servicio de scoring para obtener el score de un cliente.
Está realizado en Laravel 11 y PHP 8.3, incluye migraciones, factories, rutas API y tests.

### Tests
Los tests están escritos de tal manera que pueda verificarse si el desarrollo de la aplicación está completo y no hay ninguna falla en el camino.
Para que el desafío se considere exitoso, se deben pasar todos los tests de manera satisfactoria.

### Desarrollo
- Crear un LeadController encargado de realizar las operaciones CRUD necesarias.
- Un cliente debe crearse luego de crear un lead.
- Obtener el score luego de crear o actualizar un lead.
- Crear un trait HasUuid para que cada modelo se cree con un UUID por defecto, como se puede ver en las migraciones.
- Crear un servicio LeadScoringService con un método getLeadScore, este servicio debe ser programado de tal manera que se pueda intercambiar su implementación de manera transparente para todo el sistema.

## Plazos
48 horas desde la recepción del desafío.

## Entrega
- El desafío debe ser entregado a traves de un repositorio en GitHub con el siguiente formato:
vitafy-challenge-<nombre-apellido>
- Se pueden realizar tantos commits como se quieran.
- Detallar instrucciones a seguir para poner en marcha el proyecto y realizar pruebas necesarias.
- Explicar la implementación y desarrollo de la solución, así como las decisiones de diseño tomadas para llevar a cabo el desafío y cualquier otra información relevante que amerite describir.


# Resolución
Dockericé el proyecto y seguí los pasos del enunciado, comencé creando el LeadController y probé las rutas.
Luego cree los modelos Lead y Client, el trait HasUuid y el servicio LeadScoringService. Seguido de esto generé las operaciones CRUD.
Los detalles de la implementación pude verlos en los test, como el LeadResource y la interfaz LeadScoringServiceInterface.

## NOTA
Los test test_store_lead_returns_correct_data y test_update_lead_returns_correct_data fallan debido a que en el enunciado se pide "Obtener el score luego de crear o actualizar un lead", por tal motivo siempre genero un score y esto hace fallar ambos test.
Adicionalmente en test_update_lead_returns_correct_data se crea un lead mediante el factory, lo que genera un lead con el atributo "phone" y hace fallar el test.


## Requisitos Técnicos
- **docker-compose v3**

## Cómo Ejecutar el Proyecto

- **Clonar repositorio**:
   ```bash
   git clone url_repositorio

- **En el directorio raiz ejecutar**:
   ```bash
   docker-compose up -d

- **Dentro del contenedor de PHP, instalar dependencias con composer**:
   ```bash
   composer install

- **Copiar y configurar el archivo de variables de entorno según su configuración local**:
   ```bash
   cp .env.example .env

- **Generar la key**:
   ```bash
   php artisan key:generate

- **Dentro del contenedor de PHP, ejecutar las migraciones**:
   ```bash
   php artisan migrate