<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;

class TagQuery extends Query
{
    protected $attributes = [
        'name' => 'tag',
        'description' => 'A Tag query'
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('TagType'));
    }

    public function args(): array
    {
        return [
            'id' => Type::int(),
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        /** @var SelectFields $fields */
        $fields = $getSelectFields();
        $select = $fields->getSelect();
        $with = $fields->getRelations();

        return [
            'The tag works',
        ];
    }
}
