<?php

namespace App\graphql\Mutations\Outlet;

use App\Models\Outlet;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;

class UpdateOutletMutation extends Mutation
{
    protected $attributes = [
        "name" => "updateOutlet",
        'description' => 'updates a Outlet'
    ];
    public function type(): Type
    {
        return GraphQL::type("Outlet");
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
            "address" => [
                "name" => "address",
                "type" => Type::getNullableType(Type::string()),
            ],
            "longitude" => [
                "name" => "longitude",
                "type" => Type::getNullableType(Type::float()),
            ],
            "latitude" => [
                "name" => "address",
                "type" => Type::getNullableType(Type::float()),
            ],
        ];
    }
    public function resolve($root, $args)
    {
        $outlet = Outlet::findOrFail($args['id']);
        $outlet->fill($args);
        $outlet->save();

        return $outlet;
    }
}
