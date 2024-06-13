<?php
namespace JoeSzeto\SchemaFromData;

use Filament\Forms\Components\TextInput;
use ReflectionClass;

class Schema
{
    public static function from(string $className)
    {
        $reflection = new ReflectionClass($className);
        $properties = $reflection->getProperties(
            \ReflectionProperty::IS_PUBLIC
        );

        $schema = [];

        foreach ($properties as $property) {
            $data = PropertyData::fromProperty($property);
            if ($data->type === 'string') {
                $schema[] = TextInput::make($data->name);
            }
        }

        return $schema;

    }
}
