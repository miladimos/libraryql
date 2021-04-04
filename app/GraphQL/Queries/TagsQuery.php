<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use Closure;
use App\Models\Tag;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;
use Rebing\GraphQL\Support\Facades\GraphQL;

class TagsQuery extends Query
{
    protected $attributes = [
        'name' => 'tags',
        'description' => 'A query'
    ];

    public function type(): Type
    {
        return GraphQL::paginate('TagType');
    }

    public function args(): array
    {
        return [
            'page' => [
                'type' => Type::int(),
            ],
            'pagination' => [
                'type' => Type::int(),
            ],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $page = $args['page'] ?? 1;
        $pagination = $args['pagination'] ?? 12;

        $tags = Tag::paginate($pagination, ["*"], 'page', $page);
        return $tags;
    }
}
