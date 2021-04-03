<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class BookType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Book',
        'description' => 'Book type'
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::int()
            ],
            'title' => [
                'type' => Type::string()
            ],
            'updated_at' => [
                'type'   => Type::string()
            ],
            'created_at' => [
                'type'   => Type::string()
            ],
        ];
    }
}
