# Sode/Extend

[![Latest Stable Version](https://poser.pugx.org/sode/extend/v)](//packagist.org/packages/sode/extend)
[![License](https://poser.pugx.org/sode/extend/license)](//packagist.org/packages/sode/extend)

## Descripción

Sode/Extend es un paquete de PHP que proporciona clases extendidas para el manejo rápido de datos.

## Instalación

Puedes instalar este paquete utilizando Composer. Asegúrate de tener Composer instalado en tu proyecto y luego ejecuta el siguiente comando:

```bash
composer require sode/extend
```

## Uso

Para utilizar las clases de Sode/Extend, simplemente importa la clase que necesitas y úsala en tu código. Aquí tienes una descripción de algunos de los paquetes disponibles:

## Crypto

El paquete Crypto ofrece métodos para generar caracteres aleatorios. Puedes utilizar el método `short()` para generar 8 caracteres aleatorios y devolverlos como una cadena. También puedes utilizar el método `randomUUID()` para generar un UUID con caracteres aleatorios.

## Fetch

Fetch es un análogo a la función Fetch de JavaScript, pero escrita en PHP. Puedes instanciarlo utilizando `new Fetch($url, $options = [method => string, headers => array, body => array])`. Esto te permite realizar solicitudes HTTP en tu código PHP.

## File

El paquete File proporciona métodos para trabajar con extensiones de archivos y tipos MIME. Puedes utilizar el método `getExtension()` para obtener la extensión de un archivo según su tipo MIME, y utilizar el método `getMimeType()` para obtener el tipo/subtipo MIME de una extensión de archivo.

## HTML

El paquete HTML te permite crear etiquetas HTML desde una clase de PHP. Puedes instanciarlo utilizando `new HTML($tag)`, y luego agregar atributos, valores, texto, etc., utilizando métodos. Además, el paquete ofrece el método `toImage()` que convierte una cadena HTML en una imagen. Puedes utilizarlo de la siguiente manera: `HTML::toImage($html, $type: url|base64|blob)`.

## JSON

El paquete JSON proporciona métodos estáticos `parse()` y `stringify()` para trabajar con JSON. Puedes utilizar `parse()` para analizar una cadena JSON y obtener un objeto PHP, y utilizar `stringify()` para convertir un objeto PHP en una cadena JSON.

## Status

El paquete Status ofrece el método estático `get()` que recibe un número entero y devuelve un código de estado HTTP correspondiente. Si el código no se encuentra, se devuelve un entero con el valor 500.

## Text

El paquete Text proporciona métodos para el manejo rápido de texto. Algunos de los métodos disponibles son:

- `startsWith($string, $needle)`: Verifica si una cadena comienza con otra cadena específica.
- `cleanLineBreak($string)`: Elimina los saltos de línea al comienzo y al final de una cadena.
- `lineBreak($int)`: Devuelve una cadena con un número especificado de saltos de línea.
- `split($text, $sep)`: Divide una cadena en un array utilizando un separador.
- `keep($string, $chars)`: Mantiene solo los caracteres especificados en una cadena.
- `reduce($string, $chars)`:

# Math

La clase `Math` proporciona una serie de métodos estáticos para realizar operaciones matemáticas comunes.

## Métodos

### `min`

La función encuentra y retorna el valor mínimo de una lista de parámetros.

```php
public static function min(...$args): int
```

### `max`

La función encuentra y retorna el valor máximo de una lista de parámetros.

```php
public static function max(...$args): int
```

### `avg`

La función calcula el promedio de una lista de argumentos.

```php
public static function avg(...$args): int
```

### `round`

Redondea un número al número especificado de decimales.

```php
public static function round(float $number, int $decimals = 0): float
```

### `highs`

Devuelve los números más altos de una matriz en orden descendente.

```php
public static function highs(array $numbers, int $quantity): array
```

### `lows`

Devuelve los números más bajos de una matriz en orden ascendente.

```php
public static function lows(array $numbers, int $quantity): array
```

### `sum`

Calcula la suma de una lista de números.

```php
public static function sum(array $numbers): int
```

### `factorial`

Calcula el factorial de un número.

```php
public static function factorial(int $number): int
```

### `pow`

Calcula el exponente de un número elevado a una potencia.

```php
public static function pow(float $base, float $exponent): float
```

### `pow`

Genera un número aleatorio (entero o decimal) dentro de un rango.

```php
public static function round(int|float $base, int|float $exponent, ?bool $isInteger = true): int|float
```

## Atributos Estáticos

La clase `Math` también proporciona algunos atributos estáticos para números comunes:

- `PI`: Valor de PI.
- `E`: Número de Euler.
- `PHI`: Proporción áurea.
- `LN2`: Logaritmo natural de 2
- `LN10`: Logaritmo narutal de 10
- `LOG2E`: Logaritmo natural de 2e
- `LOG10E`: Logaritmo narutal de 10e
- `SQRT1_2`: Raiz de 1/2
- `SQRT2`: Raiz de 2

```php
public const PI      = 3.141592653589793;
public const E       = 2.718281828459045;
public const PHI     = 1.618033988749894;
public const LN2     = 0.6931471805599453;
public const LN10    = 2.302585092994046;
public const LOG2E   = 1.4426950408889634;
public const LOG10E  = 0.4342944819032518;
public const SQRT1_2 = 0.7071067811865476;
public const SQRT2   = 1.4142135623730951;
```

Estos atributos pueden ser utilizados en los cálculos matemáticos realizados con los métodos de la clase `Math`.

## Ejemplo de Uso

Aquí tienes un ejemplo de cómo usar la clase `Math`:

```php
use SoDe\Extend\Math;

echo Math::min(5, 3, 8); // Output: 3
echo Math::max(5, 3, 8); // Output: 8
echo Math::avg(2, 4, 6); // Output: 4
echo Math::round(3.14159, 2); // Output: 3.14

$numbers = [9, 4, 7, 2, 5];
echo implode(', ', Math::highs($numbers, 3)); // Output: 9, 7, 5

echo Math::factorial(5); // Output: 120
echo Math::pow(2, 3); // Output: 8
```
