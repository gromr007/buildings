<?php

declare(strict_types=1);

namespace App\Utils;


class ConvertCase
{
    /**
     * snake_case — для разделения используется подчеркивание (my_super_var)
     * ConvertCase::camelToSnake($input);
     * */
    public static function camelToSnake($input)
    {
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $input));
    }


    /**
     * lowerCamelCase — каждое слово в переменной пишется с заглавной буквы, кроме первого (mySuperVar)
     * */
    public static function snakeToLowCamel($input)
    {
        return lcfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $input))));
    }


    /*
     * CamelCase — каждое слово в переменной пишется с заглавной буквы (MySuperVar)
     * */
    public static function snakeToCamel($input)
    {
        return str_replace(' ', '', ucwords(str_replace('_', ' ', $input)));
    }

    /**
     * kebab-case — составные части переменной разделяются дефисом (my-super-var)
     * */

}
