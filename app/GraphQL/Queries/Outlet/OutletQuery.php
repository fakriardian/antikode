<?php

namespace App\GraphQL\Queries\Outlet;

use App\Models\Outlet;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class OutletQuery extends Query
{
    protected $attributes = [
        "name" => "outlet",
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
                "type" => Type::string(),
                "rules" => ["required"],
            ],
        ];
    }
    public function resolve($root, $args)
    {
        return Outlet::findOrFail($args["id"]);
    }
}
