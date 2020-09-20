<?php


namespace App\Transporters;

use Dto\Dto;

class GetAllPostTransporter extends Dto
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
        ],
        'required'   => [
            'user_id',
        ],
    ];
}
