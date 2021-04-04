<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use Closure;
use App\Models\User;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\Facades\GraphQL;

class UserQuery extends Query
{
    protected $attributes = [
        'name' => 'user',
        'description' => 'A query'
    ];

    public function type(): Type
    {
        return GraphQL::type('UserType');
    }

    public function args(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int())
            ],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        return User::findOrFail($args['id']);
    }
}
