<?php

if (!function_exists('env')) {
    function env(string $key, mixed $default = null): ?string
    {
        $env_path = __DIR__ . '/../../../.env';

        if (!file_exists($env_path)) {
            throw new Exception(".env file does not exist");
        }

        if (!is_readable($env_path)) {
            throw new Exception(".env file is not readable");
        }

        $lines = file($env_path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($lines as $line) {
            if (str_starts_with(trim($line), '#')) {
                continue;
            }

            [$name, $value] = explode('=', $line, 2);

            $name  = trim($name);

            if ($name === $key) {
                return trim($value);
            }
        }

        return $default;
    }
}
