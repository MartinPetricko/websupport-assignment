<?php

namespace App\Helpers;

class Route
{
    public static function get(string $route, Callable $callback): void
    {
        if ($_SERVER['REQUEST_METHOD'] === "GET") {
            if ($parameters = self::compareRoute($route)) {
                call_user_func_array($callback, array_merge([new Request()], $parameters === true ? [] : $parameters));

                die();
            }
        }
    }

    public static function post(string $route, Callable $callback): void
    {
        $request = new Request();

        if ($_SERVER['REQUEST_METHOD'] === "POST" && $request->input('_method', 'POST') === 'POST') {
            if ($parameters = self::compareRoute($route)) {
                call_user_func_array($callback, array_merge([$request], $parameters === true ? [] : $parameters));

                die();
            }
        }
    }

    public static function put(string $route, Callable $callback): void
    {
        $request = new Request();

        if ($_SERVER['REQUEST_METHOD'] === "PUT" || ($_SERVER['REQUEST_METHOD'] === "POST" && $request->input('_method') === 'PUT')) {
            if ($parameters = self::compareRoute($route)) {
                call_user_func_array($callback, array_merge([$request], $parameters === true ? [] : $parameters));

                die();
            }
        }
    }

    public static function delete(string $route, Callable $callback): void
    {
        $request = new Request();

        if ($_SERVER['REQUEST_METHOD'] === "DELETE" || ($_SERVER['REQUEST_METHOD'] === "POST" && $request->input('_method') === 'DELETE')) {
            if ($parameters = self::compareRoute($route)) {
                call_user_func_array($callback, array_merge([$request], $parameters === true ? [] : $parameters));

                die();
            }
        }
    }

    private static function compareRoute($route): bool|array
    {
        $route = str_replace("*/", "*\\/", $route);

        $request_uri = explode('/', self::escapeUri($_SERVER['REQUEST_URI']));
        $route       = explode('/', self::escapeUri($route));

        $wildcard = false;

        $parameters = [];

        foreach ($request_uri as $key => $uri_param) {
            if (!isset($route[$key])) {
                return false;
            }

            if (preg_match("/{.*}/", $route[$key], $matched)) {
                $parameter = trim($matched[0], "{}");

                $parameters[$parameter] = $uri_param;

                $route[$key] = "*\\";
            }

            if ($route[$key] === $uri_param && isset($route[$key + 1]) && ($route[$key + 1] === "*" || $route[$key + 1] === "*\\") && $key === count($request_uri) - 1) {
                $wildcard = true;

                break;
            }

            if (isset($request_uri[$key + 1]) && $request_uri[$key + 1][0] === "?") {
                break;
            }

            if ($route[$key] === "*") {
                break;
            }

            if ($route[$key] !== $uri_param && $route[$key] !== "*\\") {
                return false;
            }
        }

        if (!$wildcard && count($route) > count($request_uri)) {
            return false;
        }

        return empty($parameters) ? true : $parameters;
    }

    private static function escapeUri($uri): string
    {
        return trim(rtrim($uri, '/'), '/');
    }
}
