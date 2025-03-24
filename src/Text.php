<?php

namespace SoDe\Extend;

class Text
{
    static private string $lineBreak = '
';
    /**
     * Verifica si un String comienza con un caracter en especifico.
     *
     * @param string $string El String con el que se va a realizar
     * la verificación.
     * @param string $needle El caracter con el que se va a realizar
     * la comparación.
     * 
     * @return bool Un valor booleano capaz de representar si el
     * string comienza con el caracter especificado.
     */
    static public function startsWith($string, $needle): bool
    {
        return strpos($string, $needle) === 0;
    }

    /**
     * Esta función limpia los retornos de línea en una cadena dada.
     *
     * @param string $text La cadena que será limpiada.
     * 
     * @return string Una cadena limpia de retornos de línea.
     */
    static public function cleanLineBreak(string $text): string
    {
        $text = str_replace(' ', ' ', $text);
        $text = trim($text, '\\n');
        $text = trim($text, '\n');
        $text = trim($text, Text::$lineBreak);
        $text = trim($text);
        $text = preg_replace('/^\s+|\s+$/m', '', $text);
        return $text;
    }

    /** 
     * Esta función devuelve una cadena con un salto de línea.
     * 
     * @return string un salto de línea
     */
    static public function lineBreak(?int $repeat = 1): string
    {
        return str_repeat(Text::$lineBreak, $repeat);
    }

    /**
     * Separa una cadena de texto en palabras o partes según el separador.
     *
     * @param string $text La cadena a separar.
     * @param string $separator El carácter separador para los elementos
     * del array. (Opcional, por defecto es un espacio en blanco).
     *
     * @return array Un array con las cadenas separadas.
     */
    static public function split(string $text, string $separator = ' '): array
    {
        return explode($separator, $text);
    }

    /**
     * La función "keep" filtra una cadena para incluir solo caracteres
     * específicos y elimina cualquier espacio en blanco.
     * 
     * @param string string La cadena de entrada que debe filtrarse y
     * devolverse.
     * @param string characters El parámetro de caracteres es una cadena
     * que contiene todos los caracteres que deben mantenerse en la cadena
     * de entrada. Todos los demás personajes serán eliminados.
     * 
     * @return string una cadena que contiene solo los caracteres
     * especificados en el parámetro ``, con cualquier carácter que no
     * coincida eliminado. Además, se eliminan los caracteres de espacio
     * en blanco y las palabras restantes se concatenan con un solo
     * carácter de espacio entre ellas.
     */
    public static function keep(string $string, string $characters): string
    {
        $regex = '/[^' . preg_quote($characters, '/') . ']/';
        $filteredString = preg_replace($regex, '', $string);
        $wordsArray = preg_split('/\s+/', $filteredString);
        $filteredArray = array_filter($wordsArray, 'strlen');
        $result = implode(' ', $filteredArray);
        return $result;
    }

    /**
     * La función coincide con un patrón de expresión regular en una
     * cadena determinada y devuelve el resultado junto con el texto
     * restante.
     * 
     * @param string text La cadena de entrada que debe compararse con la
     * expresión regular.
     * @param string regex El patrón de expresión regular a buscar en el
     * texto dado. Se establece en '/{{(.+?)}}/' de forma predeterminada,
     * que coincide con cualquier texto encerrado entre llaves dobles.
     * 
     * @return An array is being returned with three elements:
     */
    public static function match(string $text, string $regex = '/{{(.+?)}}/')
    {
        try {
            $matches = [];

            $found = preg_match($regex, $text, $matches);
            $clean_text = str_replace($matches[0], '', $text);

            return [$found, $matches[1], $clean_text];
        } catch (\Throwable $th) {
            return [false, '', $text];
        }
    }

    /**
     * La función reduce una cadena dada a un número específico de
     * caracteres y agrega puntos suspensivos si la cadena es más larga
     * que el número especificado de caracteres.
     * 
     * @param string string Una cadena de caracteres que debe reducirse
     * en longitud.
     * @param int chars El número máximo de caracteres al que debe
     * reducirse la cadena.
     * 
     * @return string una cadena que es la cadena original pasada o una
     * versión abreviada de la misma con puntos suspensivos agregados al
     * final si la cadena original era más larga que el número especificado
     * de caracteres.
     */
    public static function reduce(string $string, int $chars): string
    {
        $text = strval($string);
        if (strlen($text) > $chars) {
            $text = substr($text, 0, $chars - 3) . "...";
        }
        return $text;
    }

    /**
     * La función comprueba si una cadena contiene una subcadena
     * específica y devuelve un valor booleano.
     * 
     * @param string string El primer parámetro es una variable de cadena
     * llamada `string` que representa la cadena en la que queremos buscar
     * el segundo parámetro.
     * @param string needle El parámetro "aguja" es una cadena que estamos
     * buscando dentro de otra cadena. Es la subcadena que queremos
     * verificar si existe dentro de la cadena principal.
     * 
     * @return bool Un valor booleano que indica si la cadena `needle` se
     * encuentra dentro de la cadena `string`.
     */
    public static function has(string $string, string $needle): bool
    {
        return str_contains($string, $needle);
    }

    /**
     * Esta es una función de PHP que verifica si una cadena contiene
     * alguna de las cadenas en una lista dada.
     * 
     * @param string string Una cadena en la que queremos verificar la
     * presencia de ciertas subcadenas.
     * @param array needle_list Una matriz de cadenas que representan las
     * cadenas para buscar en el parámetro.
     * 
     * @return bool un valor booleano, ya sea verdadero o falso.
     */
    public static function hasOne(string $string, array $needle_list): bool
    {
        foreach ($needle_list as $needle) {
            if (str_contains($string, $needle)) return true;
        }
        return false;
    }

    /**
     * La función verifica si una cadena dada contiene todas las subcadenas
     * en una lista dada.
     * 
     * @param string string Una cadena que queremos verificar si contiene
     * todas las subcadenas en la lista de subcadenas.
     * @param array needle_list Una matriz de cadenas que se buscan en
     * el parámetro.
     * 
     * @return bool Se devuelve un valor booleano, ya sea verdadero o falso.
     */
    public static function hasAll(string $string, array $needle_list): bool
    {
        foreach ($needle_list as $needle) {
            if (!str_contains($string, $needle)) return false;
        }
        return true;
    }

    /**
     * Esta función comprueba si una cadena determinada es nula o
     * está vacía.
     * 
     * @param string El parámetro llamado "string" es un tipo de
     * string anulable, indicado por el "?" antes de la palabra
     * clave "string". Esto significa que puede ser una string o
     * un valor nulo.
     * 
     * @return bool un valor booleano. Si la cadena de entrada es
     * nula o está vacía, devolverá verdadero. De lo contrario,
     * devolverá falso.
     */
    public static function nullOrEmpty(?string $string): bool
    {
        if (!isset($string) || $string == null || trim($string) == '') {
            return true;
        }
        return false;
    }

    public static function toTitleCase(string $string, bool $capitalizeSingleWords = true): string
    {
        $string = mb_strtolower($string);
        $result = preg_replace_callback('/(\b\w|\.\s\w)/u', function ($matches) {
            return mb_strtoupper($matches[0]);
        }, $string);

        $result = preg_replace_callback('/(\w+)/u', function ($matches) use ($capitalizeSingleWords) {
            $word = $matches[0];
            if ($word === mb_strtoupper($word)) {
                return $word;
            }
            return ($capitalizeSingleWords || mb_strlen($word) > 1) ? ucfirst($word) : mb_strtolower($word);
        }, $result);

        return trim($result);
    }

    public static function fillObject(string $string, array $object): string
    {
        $flattened = JSON::flatten($object);
        foreach ($flattened as $key => $value) {
            $string = str_replace('{{' . $key . '}}', $value, $string);
        }
        return $string;
    }

    public static function isIn(string $string, array $array): bool
    {
        return in_array($string, $array);
    }

    public static function isNumber(string $string): bool
    {
        return is_numeric($string);
    }

    public static function fillStart(string $string, string $fill, int $length): string
    {
        return str_pad($string, $length, $fill, STR_PAD_LEFT);
    }

    public static function fillEnd(string $string, string $fill, int $length): string
    {
        return str_pad($string, $length, $fill, STR_PAD_RIGHT);
    }

    public static function replaceData(string $string, array $object, ?array $rules = [])
    {
        foreach ($object as $key => $value) {
            if (isset($rules[$key])) {
                try {
                    $value = $rules[$key]($value);
                } catch (\Throwable $th) {
                }
            }
            $string = str_replace('{{' . $key . '}}', $value, $string);
        }
        return $string;
    }

    /**
     * La función `html2wa` convierte texto con formato HTML a un formato de texto simplificado adecuado para una
     * plataforma de mensajería como WhatsApp.
     * 
     * @param string string La función `html2wa` que has proporcionado es una función PHP que convierte
     * texto con formato HTML a un formato de texto simplificado adecuado para mensajes de WhatsApp. Realiza
     * varios reemplazos y transformaciones en la cadena de entrada para lograr esta conversión.
     * 
     * @return string La función `html2wa` toma una cadena HTML como entrada y la convierte a un
     * formato compatible con WhatsApp reemplazando ciertas etiquetas HTML con su sintaxis de markdown equivalente.
     * Luego, la función elimina cualquier etiqueta HTML restante y devuelve la cadena procesada.
     */
    public static function html2wa(string $string): string
    {
        $string = str_replace('{{session.sign}}', '', $string);

        // Convertir listas desordenadas <ul> a formato de WhatsApp
        $string = preg_replace_callback('/<ul[^>]*>(.*?)<\/ul>/s', function ($matches) {
            return preg_replace('/<li[^>]*>(.*?)<\/li>/', "- $1\n", $matches[1]);
        }, $string);

        // Convertir listas ordenadas <ol> a formato de WhatsApp
        $string = preg_replace_callback('/<ol[^>]*>(.*?)<\/ol>/s', function ($matches) {
            $counter = 1;
            return preg_replace_callback('/<li[^>]*>(.*?)<\/li>/', function ($liMatches) use (&$counter) {
                return ($counter++) . ". " . trim($liMatches[1])  . "\n";
            }, $matches[1]);
        }, $string);

        // Convertir párrafos
        $string = preg_replace_callback('/<p[^>]*>(.*?)<\/p>/s', function ($matches) {
            return trim($matches[1]) . "\n";
        }, $string);

        // Convertir negrita <strong> y <b> a *
        $string = preg_replace_callback('/<(strong|b)[^>]*>(.*?)<\/\1>/', function ($matches) {
            return '*' . trim($matches[2]) . '*';
        }, $string);

        // Convertir cursiva <i> y <em> a _
        $string = preg_replace_callback('/<(i|em)[^>]*>(.*?)<\/\1>/', function ($matches) {
            return '_' . trim($matches[2]) . '_';
        }, $string);

        // Convertir tachado <s> a ~
        $string = preg_replace_callback('/<s[^>]*>(.*?)<\/s>/', function ($matches) {
            return '~' . trim($matches[1]) . '~';
        }, $string);

        // Convertir código <code> y <pre> a ```
        $string = preg_replace_callback('/<(code|pre)[^>]*>(.*?)<\/\1>/s', function ($matches) {
            return '```' . trim($matches[2]) . '```';
        }, $string);

        // Convertir blockquote
        $string = preg_replace_callback('/<blockquote[^>]*>(.*?)<\/blockquote>/', function ($matches) {
            return "> " . trim($matches[1]) . "\n";
        }, $string);

        // Convertir saltos de línea <br> a \n
        $string = str_replace(['<br>', '</br>'], "\n", $string);

        // Eliminar etiquetas HTML restantes
        $string = strip_tags($string);

        return trim($string);
    }

        /**
     * La función `wa2html` convierte texto con formato WhatsApp a formato HTML.
     * 
     * @param string string El texto con formato WhatsApp que se convertirá a HTML
     * 
     * @return string El texto convertido a formato HTML
     */
    public static function wa2html(string $string): string
    {
        $lines = explode("\n", $string);
        $html = '';
        $inList = false;
        $listType = '';
        $listContent = '';
        
        foreach ($lines as $line) {
            $line = trim($line);
            if (empty($line)) {
                if ($inList) {
                    $html .= $listType === 'ul' ? "</ul>\n" : "</ol>\n";
                    $inList = false;
                }
                continue;
            }

            // Convertir listas no ordenadas (- item)
            if (preg_match('/^-\s+(.+)$/', $line, $matches)) {
                if (!$inList || $listType !== 'ul') {
                    if ($inList) {
                        $html .= $listType === 'ul' ? "</ul>\n" : "</ol>\n";
                    }
                    $html .= "<ul>\n";
                    $inList = true;
                    $listType = 'ul';
                }
                $html .= "<li>" . self::convertInlineFormats($matches[1]) . "</li>\n";
                continue;
            }

            // Convertir listas ordenadas (1. item)
            if (preg_match('/^\d+\.\s+(.+)$/', $line, $matches)) {
                if (!$inList || $listType !== 'ol') {
                    if ($inList) {
                        $html .= $listType === 'ul' ? "</ul>\n" : "</ol>\n";
                    }
                    $html .= "<ol>\n";
                    $inList = true;
                    $listType = 'ol';
                }
                $html .= "<li>" . self::convertInlineFormats($matches[1]) . "</li>\n";
                continue;
            }

            // Convertir blockquotes (> texto)
            if (preg_match('/^>\s+(.+)$/', $line, $matches)) {
                if ($inList) {
                    $html .= $listType === 'ul' ? "</ul>\n" : "</ol>\n";
                    $inList = false;
                }
                $html .= "<blockquote>" . self::convertInlineFormats($matches[1]) . "</blockquote>\n";
                continue;
            }

            // Texto normal
            if ($inList) {
                $html .= $listType === 'ul' ? "</ul>\n" : "</ol>\n";
                $inList = false;
            }
            $html .= "<p>" . self::convertInlineFormats($line) . "</p>\n";
        }

        if ($inList) {
            $html .= $listType === 'ul' ? "</ul>\n" : "</ol>\n";
        }

        return trim($html);
    }

    /**
     * Función auxiliar para convertir formatos inline de WhatsApp a HTML
     */
    private static function convertInlineFormats(string $text): string
    {
        // Convertir negrita (*texto*)
        $text = preg_replace('/\*(.*?)\*/', '<strong>$1</strong>', $text);
        
        // Convertir cursiva (_texto_)
        $text = preg_replace('/_(.*?)_/', '<em>$1</em>', $text);
        
        // Convertir tachado (~texto~)
        $text = preg_replace('/~(.*?)~/', '<s>$1</s>', $text);
        
        // Convertir código (```texto```)
        $text = preg_replace('/```(.*?)```/', '<code>$1</code>', $text);
        
        return $text;
    }

    public static function getYTVideoId($url)
    {
        $patterns = [
            '/(?:https?:\/\/)?(?:www\.)?youtube\.com\/watch\?v=([a-zA-Z0-9_-]+)/', // URL estándar
            '/(?:https?:\/\/)?(?:www\.)?youtu\.be\/([a-zA-Z0-9_-]+)/', // URL corta
            '/(?:https?:\/\/)?(?:www\.)?youtube\.com\/embed\/([a-zA-Z0-9_-]+)/', // URL embebida
            '/(?:https?:\/\/)?(?:www\.)?youtube\.com\/watch\?v=([a-zA-Z0-9_-]+)&.+/', // URL con parámetros adicionales
        ];
        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $url, $matches)) {
                return $matches[1];
            }
        }
        return null;
    }

    public static function slug(string $string): string
    {
        $slug = strtolower($string);

        // Reemplazar los caracteres especiales y acentuados por sus equivalentes sin acento
        $slug = iconv('UTF-8', 'ASCII//TRANSLIT', $slug);

        // Reemplazar cualquier cosa que no sea una letra, número o guión por un espacio
        $slug = preg_replace('/[^a-z0-9-]+/', '-', $slug);

        // Eliminar guiones repetidos
        $slug = preg_replace('/-+/', '-', $slug);

        // Eliminar guiones al principio y al final
        $slug = trim($slug, '-');

        return $slug;
    }

    public static function getEmailProvider($correo)
    {
        // Convertir el correo a minúsculas para evitar problemas de comparación
        $correo = strtolower($correo);

        // Verificar si el correo tiene el formato correcto (si contiene un '@')
        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            throw new \Exception("Correo no válido");
        }

        // Extraer el dominio del correo
        $partes = explode('@', $correo);
        $dominio = end($partes);

        // Revisar si es de un proveedor específico
        if (strpos($dominio, 'gmail.com') !== false) {
            return "Gmail";
        } elseif (strpos($dominio, 'outlook.com') !== false) {
            return "Outlook";
        } elseif (strpos($dominio, 'hotmail.com') !== false) {
            return "Hotmail";
        } elseif (strpos($dominio, 'yahoo.com') !== false) {
            return "Yahoo";
        } elseif (strpos($dominio, 'aol.com') !== false) {
            return "AOL";
        } elseif (strpos($dominio, 'icloud.com') !== false) {
            return "iCloud";
        } elseif (strpos($dominio, 'zoho.com') !== false) {
            return "Zoho Mail";
        } elseif (strpos($dominio, 'protonmail.com') !== false) {
            return "ProtonMail";
        } elseif (strpos($dominio, 'gmx.com') !== false) {
            return "GMX Mail";
        } elseif (strpos($dominio, 'yandex.com') !== false) {
            return "Yandex";
        }
        // Verificar si es un correo institucional con dominio .edu
        elseif (strpos($dominio, '.edu') !== false) {
            return "Institucional";
        } else {
            return "Otro";
        }
    }

    public static function camelToSnakeCase(string $input): string
    {
        return strtolower(preg_replace('/([a-z])([A-Z])/', '$1_$2', $input));
    }

    public static function snakeToCamelCase(string $input): string
    {
        $input = str_replace('_', ' ', strtolower($input));
        $input = str_replace(' ', '', ucwords($input));
        return lcfirst($input);
    }
}
