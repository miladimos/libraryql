<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use Rebing\GraphQL\Support\Type as GraphQLType;

class AuthorType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Author',
        'description' => 'A type'
    ];

    public function fields(): array
    {
        return [

        ];
    }
}
