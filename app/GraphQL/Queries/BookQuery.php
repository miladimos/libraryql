<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Models\Book;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;

class BookQuery extends Query
{
    protected $attributes = [
        'name' => 'book',
        'description' => 'Book query'
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('BookType'));
    }

    public function args(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(GraphQL::type('BookType'))
            ]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $book = Book::find($args['id']);

        return $book;
    }
}
