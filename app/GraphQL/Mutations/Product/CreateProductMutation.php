<?php

namespace App\graphql\Mutations\Product;

use App\Models\Product;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;

class CreateProductMutation extends Mutation
{
    protected $attributes = [
        "name" => "createProduct",
    ];
    public function type(): Type
    {
        return GraphQL::type("Product");
    }
    public function args(): array
    {
        return [
            "brand_id" => [
                "name" => "brand_id",
                "type" => Type::nonNull(Type::string()),
                "rules" => ["exists:brands,id"]
            ],
            "name" => [
                "name" => "name",
                "type" => Type::nonNull(Type::string()),
            ],
            "picture" => [
                "name" => "picture",
                "type" => Type::nonNull(Type::string()),
            ],
            "price" => [
                "name" => "price",
                "type" => Type::nonNull(Type::int()),
            ],
        ];
    }
    public function resolve($root, $args)
    {
        $product = new Product();
        $product->fill($args);
        $product->save();
        return $product;
    }
}
