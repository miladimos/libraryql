<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Models\User;
use Closure;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;
use Rebing\GraphQL\Support\Facades\GraphQL;

class UsersQuery extends Query
{
    protected $attributes = [
        'name' => 'users',
        'description' => 'A query'
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('UserType'));
    }

    public function args(): array
    {
        return [];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        return User::all();
    }
}
