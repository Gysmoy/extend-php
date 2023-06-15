<?php

namespace SoDe\Extend;

class Math
{
    /**
     * La función encuentra y retorna el valor mínimo de una lista
     * de parámetros.
     * 
     * @return int El valor mínimo entre los parámetros ingresados.
     */
    public static function min(...$args): int
    {
        $min = $args[0];
        foreach ($args as $number) {
            if ($number <= $min) {
                $min = $number;
            }
        }
        return $min;
    }

    /**
     * La función encuentra y retorna el valor máximo de una lista
     * de parámetros.
     * 
     * @return int El valor máximo entre los parámetros ingresados.
     */
    public static function max(...$args): int
    {
        $max = $args[0];
        foreach ($args as $number) {
            if ($number >= $max) {
                $max = $number;
            }
        }
        return $max;
    }

    /**
     * La función calcula el promedio de una lista de argumentos.
     * 
     * @return int El promedio de los parámetros ingresados.
     */
    public static function avg(...$args): int
    {
        $sum = 0;
        foreach ($args as $number) {
            $sum += $number;
        }
        return $sum / count($args);
    }
}
