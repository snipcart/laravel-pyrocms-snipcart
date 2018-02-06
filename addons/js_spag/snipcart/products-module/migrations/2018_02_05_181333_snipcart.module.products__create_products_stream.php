<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

class SnipcartModuleProductsCreateProductsStream extends Migration
{

    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'slug' => 'products',
         'title_column' => 'name',
         'translatable' => false,
         'trashable' => false,
         'searchable' => false,
         'sortable' => false,
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'name' => [
            'required' => true,
        ],
        'sku' => [
            'unique' => true,
            'required' => true,
        ],
        'price' => [
            'required' => true
        ],
        'description',
        'image',
        'tags',
    ];

}
