<?php

namespace App\GraphQL\Types;

use App\Models\Brand;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class BrandType extends GraphQLType
{
    protected $attributes = [
        "name" => "Brand",
        "description" => "Collection of brand",
        "model" => Brand::class,
    ];
    public function fields(): array
    {
        return [
            "id" => [
                "type" => Type::nonNull(Type::string()),
                "description" => "Id of a brand",
            ],
            "name" => [
                "type" => Type::nonNull(Type::string()),
                "description" => "The Name of Brand",
            ],
            "logo" => [
                "type" => Type::nonNull(Type::string()),
                "description" => "Logo of Brand",
            ],
            "banner" => [
                "type" => Type::nonNull(Type::string()),
                "description" => "Banner of Brand",
            ],
            'outlets' => [
                'type' => Type::listOf(GraphQL::type('Outlet')),
                'description' => 'The brand of Outlet'
            ],
            'products' => [
                'type' => Type::listOf(GraphQL::type('Product')),
                'description' => 'The brand of Product'
            ],
        ];
    }
}
