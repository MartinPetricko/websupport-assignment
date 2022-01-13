<?php

namespace App\Helpers;

class Str
{
    public static function camel(string $value): string
    {
        $value = ucwords(str_replace(['-', '_'], ' ', $value));

        $value = str_replace(' ', '', $value);

        return lcfirst($value);
    }

    public static function snake(string $value, string $delimiter = '_'): string
    {
        if (!ctype_lower($value)) {
            $value = preg_replace('/\s+/u', '', ucwords($value));

            $value = preg_replace('/(.)(?=[A-Z])/u', '$1' . $delimiter, $value);

            $value = mb_strtolower($value, 'UTF-8');
        }

        return lcfirst($value);
    }
}