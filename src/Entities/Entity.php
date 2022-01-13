<?php

namespace App\Entities;

use ReflectionClass;
use App\Helpers\Str;
use ReflectionMethod;

abstract class Entity
{
    public function fill(array $data): void
    {
        foreach ($data as $key => $item) {
            $setterMethod = $this->getSetterMethodByAttribute($key);

            $this->$setterMethod($item);
        }
    }

    public function getGetterMethodByAttribute(string $attribute): string
    {
        return Str::camel("get_" . $attribute);
    }

    public function getSetterMethodByAttribute(string $attribute): string
    {
        return Str::camel("set_" . $attribute);
    }

    public function toArray(): array
    {
        $attributes = $this->getAttributes();

        $properties = [];

        foreach ($attributes as $attribute) {
            $getterMethod = $this->getGetterMethodByAttribute($attribute);

            $properties[$attribute] = isset($this->{$attribute}) ? $this->$getterMethod() : null;

            if (($this->{$attribute} ?? null) instanceof self) {
                $properties[$attribute] = $this->$getterMethod()->toArray();
            }

            if (is_array(($this->{$attribute} ?? null))) {
                $properties[$attribute] = [];

                foreach ($this->{$attribute} as &$entityItem) {
                    if ($entityItem instanceof self) {
                        $properties[$attribute][] = $entityItem->toArray();
                    }
                }
            }
        }

        return $properties;
    }

    public function getAttributes(): array
    {
        $methods = [];

        foreach ((new ReflectionClass($this))->getMethods(ReflectionMethod::IS_PUBLIC) as $method) {
            if ($method->class !== __CLASS__) {
                $methods[] = $method->name;
            }
        }

        $getters = array_filter($methods, static function ($method) {
            return (str_starts_with($method, 'get'));
        });

        $attribs = [];
        foreach ($getters as $getter) {
            $attribs[] = Str::snake(substr($getter, 3));
        }

        return $attribs;
    }
}
