<?php

namespace App\graphql\Mutations\Brand;

use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\Facades\GraphQL;

class UploadBrandMutation extends Mutation
{
    protected $attributes = [
        'name' => 'uploadBrand',
    ];

    public function type(): Type
    {
        return Type::string();
    }

    public function args(): array
    {
        return [
            'image' => [
                'name' => 'image',
                'type' => GraphQL::type('Upload'),
                'rules' => ['required', 'image', 'max:1500'],
            ],
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $file = $args['image'];

        return $file->storePublicly('/public/uploads');

        // Do something with file here...
    }
}
