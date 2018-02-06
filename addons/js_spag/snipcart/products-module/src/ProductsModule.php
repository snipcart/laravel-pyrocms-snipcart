<?php namespace Snipcart\ProductsModule;

use Anomaly\Streams\Platform\Addon\Module\Module;

class ProductsModule extends Module
{

    /**
     * The navigation display flag.
     *
     * @var bool
     */
    protected $navigation = true;

    /**
     * The addon icon.
     *
     * @var string
     */
    protected $icon = 'fa fa-puzzle-piece';

    /**
     * The module sections.
     *
     * @var array
     */
    protected $sections = [
        'products' => [
            'buttons' => [
                'new_product',
            ],
        ],
    ];

}
