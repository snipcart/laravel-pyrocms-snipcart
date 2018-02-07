<?php namespace Snipcart\ProductsModule\Product;

use Anomaly\Streams\Platform\Entry\EntryPresenter;
use Anomaly\FilesModule\File\Command\GetType;
use Collective\Html\HtmlBuilder;

class ProductPresenter extends EntryPresenter
{
	/**
     * The HTML builder.
     *
     * @var HtmlBuilder
     */
    protected $html;

    /**
     * Create a new ProductPresenter instance.
     *
     * @param HtmlBuilder $html
     * @param             $object
     */
    public function __construct(HtmlBuilder $html, $object)
    {
        $this->html = $html;

        parent::__construct($object);
    }

    /**
     * Return the full name.
     *
     * @return string
     */
    public function buyButton($text, array $attributes = [])
    {
    	$object = $this->object;
    	if(array_key_exists('class', $attributes))
    	{
    		$attributes['class'] = $attributes['class'].' snipcart-add-item';
    	}
    	else
    	{
    		$attributes['class'] = 'snipcart-add-item';
    	}

    	$attributes['data-item-id'] = $object->sku;
    	$attributes['data-item-name'] = $object->name;
    	$attributes['data-item-description'] = $object->description;
    	$attributes['data-item-price'] = $object->price;
    	$attributes['data-item-url'] = '/products';

    	$type = $this->dispatch(new GetType($this->object->image)) ?: 'document';
    	$imageUrl = $this->object->image
            ->make('anomaly.module.files::img/types/' . $type . '.png')
            ->cropped()->widen(100)->path();

        $attributes['data-item-image'] = $imageUrl;

    	$metadata = [];

    	foreach ($object->tags as $tag) {
    		$metadata[$tag] = true;
    	}

    	if(count($metadata) > 0) {
    		$attributes['data-item-metadata'] = json_encode($metadata);
    	}

        return $this->html->link('#', $text, $attributes);
    }
}
