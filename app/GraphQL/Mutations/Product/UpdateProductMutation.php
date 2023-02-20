<?php

namespace App\graphql\Mutations\Product;

use App\Models\Product;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;

class UpdateProductMutation extends Mutation
{
    protected $attributes = [
        "name" => "updateProduct",
        'description' => 'updates a Product'
    ];
    public function type(): Type
    {
        return GraphQL::type("Product");
    }
    public function args(): array
    {
        return [
            "id" => [
                "name" => "id",
                "type" => Type::nonNull(Type::string()),
            ],
            "brand_id" => [
                "name" => "brand_id",
                "type" => Type::getNullableType(Type::string()),
                "rules" => ["exists:brands,id"]
            ],
            "name" => [
                "name" => "name",
                "type" => Type::nonNull(Type::string()),
            ],
            "picture" => [
                "name" => "picture",
                "type" => Type::getNullableType(Type::string()),
            ],
            "price" => [
                "name" => "price",
                "type" => Type::getNullableType(Type::int()),
            ],
        ];
    }
    public function resolve($root, $args)
    {
        $product = Product::findOrFail($args['id']);
        $product->fill($args);
        $product->save();

        return $product;
    }
}
