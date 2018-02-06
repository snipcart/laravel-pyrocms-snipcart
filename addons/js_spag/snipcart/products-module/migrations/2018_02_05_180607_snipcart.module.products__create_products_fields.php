<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

class SnipcartModuleProductsCreateProductsFields extends Migration
{

    /**
     * The addon fields.
     *
     * @var array
     */
    protected $fields = [
        'name' => 'anomaly.field_type.text',
        'description' => 'anomaly.field_type.text',
        'sku' => [
            'type' => 'anomaly.field_type.slug',
            'config' => [
                'slugify' => 'name',
                'type' => '-'
            ],
        ],
        'price'  => [
            'type'   => 'anomaly.field_type.decimal',
            'config' => [
                'min'       => 0
            ]
        ],
        'image' => 'anomaly.field_type.file',
        'tags'  => [
            'type'   => 'anomaly.field_type.tags',
            'config' => [
                'free_input'    => true
            ]
        ]
    ];

}
