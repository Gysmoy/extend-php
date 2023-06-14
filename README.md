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
El paquete Crypto ofrece métodos para generar caracteres aleatorios. Puedes utilizar el método ```short()``` para generar 8 caracteres aleatorios y devolverlos como una cadena. También puedes utilizar el método randomUUID() para generar un UUID con caracteres aleatorios.

Fetch
Fetch es un análogo a la función Fetch de JavaScript, pero escrita en PHP. Puedes instanciarlo utilizando new Fetch($url, $options = [method => string, headers => array, body => array]). Esto te permite realizar solicitudes HTTP en tu código PHP.

File
El paquete File proporciona métodos para trabajar con extensiones de archivos y tipos MIME. Puedes utilizar el método getExtension() para obtener la extensión de un archivo según su tipo MIME, y utilizar el método getMimeType() para obtener el tipo/subtipo MIME de una extensión de archivo.

HTML
El paquete HTML te permite crear etiquetas HTML desde una clase de PHP. Puedes instanciarlo utilizando new HTML($tag), y luego agregar atributos, valores, texto, etc., utilizando métodos. Además, el paquete ofrece el método toImage() que convierte una cadena HTML en una imagen. Puedes utilizarlo de la siguiente manera: HTML::toImage($html, $type: url|base64|blob).

JSON
El paquete JSON proporciona métodos estáticos parse() y stringify() para trabajar con JSON. Puedes utilizar parse() para analizar una cadena JSON y obtener un objeto PHP, y utilizar stringify() para convertir un objeto PHP en una cadena JSON.

Status
El paquete Status ofrece el método estático get() que recibe un número entero y devuelve un código de estado HTTP correspondiente. Si el código no se encuentra, se devuelve un entero con el valor 500.

Text
El paquete Text proporciona métodos para el manejo rápido de texto. Algunos de los métodos disponibles son:

startsWith($string, $needle): Verifica si una cadena comienza con otra cadena específica.
cleanLineBreak($string): Elimina los saltos de línea al comienzo y al final de una cadena.
lineBreak($int): Devuelve una cadena con un número especificado de saltos de línea.
split($text, $sep): Divide una cadena en un array utilizando un separador.
keep($string, $chars): Mantiene solo los caracteres especificados en una cadena.
`reduce($string, $