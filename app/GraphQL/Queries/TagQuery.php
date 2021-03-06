<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Models\Tag;
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
        return GraphQL::type('TagType');
    }

    public function args(): array
    {
        return [
            'id' => Type::nonNull(Type::int()),
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $tag =  Tag::find($args['id']);
        return $tag;
    }
}
