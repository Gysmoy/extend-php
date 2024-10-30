<?php

namespace SoDe\Extend;

class Array2
{
  /**
   * La función `find` toma un array y una función de devolución de llamada como entrada, filtra el array 
   * en función de la devolución de llamada y devuelve el primer elemento que coincide con la condición 
   * o null si no se encuentra ninguna coincidencia.
   * 
   * @param array array El parámetro `array` en la función `find` es un array que contiene los elementos 
   * que desea buscar. Puede pasar cualquier array a esta función para buscar.
   * @param callable callback El parámetro `callback` en la función `find` es un callable que se utiliza 
   * para filtrar los elementos del array de entrada. Es una función que se aplicará a cada elemento del 
   * array, y si la función devuelve true para un elemento en particular, ese elemento se incluirá en el 
   * resultado.
   * 
   * @return mixed La función `find` devuelve el primer elemento del array que cumple la condición 
   * especificada por la función de devolución de llamada. Si no se encuentra ningún elemento, devuelve `null`.
   */
  public static function find(array $array, callable $callback): mixed
  {
    $found = array_filter($array, $callback);
    return count($found) > 0 ? array_values($found)[0] : null;
  }
}
