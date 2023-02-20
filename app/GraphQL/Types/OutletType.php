<?php

namespace App\GraphQL\Types;

use App\Models\Outlet;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class OutletType extends GraphQLType
{
    protected $attributes = [
        "name" => "Outlet",
        "description" => "Collection of outlet",
        "model" => Outlet::class,
    ];
    public function fields(): array
    {
        return [
            "id" => [
                "type" => Type::nonNull(Type::string()),
                "description" => "Id of a Outlet",
            ],
            'brand' => [
                'type' => GraphQL::type('Brand'),
                'description' => 'The brand of Outlet'
            ],
            "name" => [
                "type" => Type::nonNull(Type::string()),
                "description" => "The Name of Outlet",
            ],
            "picture" => [
                "type" => Type::nonNull(Type::string()),
                "description" => "Picture of Outlet",
            ],
            "address" => [
                "type" => Type::nonNull(Type::string()),
                "description" => "Address of Outlet",
            ],
            "longitude" => [
                "type" => Type::nonNull(Type::float()),
                "description" => "Longitude of Outlet",
            ],
            "latitude" => [
                "type" => Type::nonNull(Type::float()),
                "description" => "Latitude of Outlet",
            ],
        ];
    }
}
