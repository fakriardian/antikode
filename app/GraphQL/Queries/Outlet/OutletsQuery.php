<?php

namespace App\graphql\Queries\Outlet;

use App\Models\Outlet;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class OutletsQuery extends Query
{
    protected $attributes = [
        "name" => "outlets",
    ];
    public function type(): Type
    {
        return Type::listOf(GraphQL::type("Outlet"));
    }
    public function resolve($root, $args)
    {
        return Outlet::all();
    }
}
