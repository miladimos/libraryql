<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Models\Book;
use Closure;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;
use Rebing\GraphQL\Support\Facades\GraphQL;

class BooksQuery extends Query
{
    protected $attributes = [
        'name' => 'books',
        'description' => 'Books query'
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('BookType'));
    }

    public function args(): array
    {
        return [];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $books = Book::all();
        return $books;
    }
}
