<?php

namespace App\graphql\Mutations\Brand;

use App\Models\Brand;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\Type;

class DeleteBrandMutation extends Mutation
{
    protected $attributes = [
        "name" => "deleteBrand",
        'description' => 'deletes a brand'
    ];
    public function type(): Type
    {
        return Type::boolean();
    }
    public function args(): array
    {
        return [
            "id" => [
                "name" => "id",
                "type" => Type::nonNull(Type::string()),
                "rules" => ["required"],
            ],
        ];
    }
    public function resolve($root, $args)
    {
        $brand = Brand::findOrFail($args['id']);

        return  $brand->delete() ? true : false;
    }
}
