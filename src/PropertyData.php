<?php

namespace JoeSzeto\SchemaFromData;

use ReflectionProperty;

class PropertyData
{
    public function __construct(
        public string $type,
        public string $name,
    )
    {
    }

    public static function fromProperty( ReflectionProperty $property): PropertyData
    {
        return new PropertyData(
            type: $property->getType()->getName(),
            name: $property->getName(),
        );
    }

}
