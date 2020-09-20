<?php


namespace App\Transporters;


use Dto\Dto;

class DeletePostTransporter extends Dto
{
    /**
     * schema transfer object
     *
     * @var array
     */
    protected $schema = [
        'type' => 'object',
        'properties' => [
            'post_id'   => ['type' => 'integer'],
            'user_id'   => ['type' => 'integer'],
        ],
        'required'   => [
            'post_id',
            'user_id',
        ],
    ];
}
