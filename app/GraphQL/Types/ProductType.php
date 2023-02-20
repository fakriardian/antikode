<?php

namespace App\GraphQL\Types;

use App\Models\Product;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class ProductType extends GraphQLType
{
    protected $attributes = [
        "name" => "Product",
        "description" => "Collection of Product",
        "model" => Product::class,
    ];
    public function fields(): array
    {
        return [
            "id" => [
                "type" => Type::nonNull(Type::string()),
                "description" => "Id of a Product",
            ],
            'brand' => [
                'type' => GraphQL::type('Brand'),
                'description' => 'The Brand of Product'
            ],
            "name" => [
                "type" => Type::nonNull(Type::string()),
                "description" => "The Name of Product",
            ],
            "picture" => [
                "type" => Type::nonNull(Type::string()),
                "description" => "Picture of Product",
            ],
            "price" => [
                "type" => Type::nonNull(Type::int()),
                "description" => "Price of Product",
            ],
        ];
    }
}
