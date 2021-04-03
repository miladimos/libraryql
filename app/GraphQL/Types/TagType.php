<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use App\Models\Tag;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class TagType extends GraphQLType
{
    protected $attributes = [
        'name' => 'TagType',
        'description' => 'Tag type',
        'model'  => Tag::class,
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type'          => Type::nonNull(Type::int()),
                'description'   => 'ID of the user',
            ],
            'title' => [
                'type' => Type::string(),
            ],
            'created_at' => [
                'type' => Type::string(),
            ],
        ];
    }
}
