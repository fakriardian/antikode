<?php

namespace App\graphql\Mutations\Outlet;

use App\Models\Outlet;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;

class CreateOutletMutation extends Mutation
{
    protected $attributes = [
        "name" => "createOutlet",
    ];
    public function type(): Type
    {
        return GraphQL::type("Outlet");
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
            "address" => [
                "name" => "address",
                "type" => Type::nonNull(Type::string()),
            ],
            "latitude" => [
                "name" => "latitude",
                "type" => Type::nonNull(Type::float()),
            ],
            "longitude" => [
                "name" => "longitude",
                "type" => Type::nonNull(Type::float()),
            ],
        ];
    }
    public function resolve($root, $args)
    {
        $outlet = new Outlet();
        $outlet->fill($args);
        $outlet->save();
        return $outlet;
    }
}
