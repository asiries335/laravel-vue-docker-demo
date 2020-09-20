<?php


namespace App\Transporters;


use Dto\Dto;

class EditPostTransporter extends Dto
{
    /**
     * schema transfer object
     *
     * @var array
     */
    protected $schema = [
        'type' => 'object',
        'properties' => [
            'user_id'   => ['type' => 'integer'],
            'post_id'   => ['type' => 'integer'],
            'title'     => ['type' => 'string'],
            'message'   => ['type' => 'string'],
        ],
        'required'   => [
            'user_id',
            'post_id',
            'title',
            'message',
        ],
    ];
}
