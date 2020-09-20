<?php


namespace App\Transporters;

use Dto\Dto;

class CreatePostTransporter extends Dto
{
    /**
     * schema transfer object
     *
     * @var array
     */
    protected $schema = [
        'type' => 'object',
        'properties' => [
            'title'     => ['type' => 'string'],
            'message'   => ['type' => 'string'],
            'user_id'   => ['type' => 'integer'],
        ],
        'required'   => [
            'title',
            'message',
            'user_id',
        ],
    ];
}
