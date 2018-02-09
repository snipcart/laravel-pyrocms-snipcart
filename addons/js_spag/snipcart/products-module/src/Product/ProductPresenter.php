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
        $class     = trim(array_get($attributes, 'class', '') . ' snipcart-add-item');
        $imageType = $this->dispatch(new GetType($this->object->image)) ?: 'document';

        $imageUrl = $this->object->image
            ->make("anomaly.module.files::img/types/{$imageType}.png")
            ->cropped()->widen(100)->path();

        return $this->html->link(
            '#',
            $text,
            array_merge($attributes, [
                'class'                 => $class,
                'data-item-id'          => $this->object->sku,
                'data-item-name'        => $this->object->name,
                'data-item-description' => $this->object->description,
                'data-item-price'       => $this->object->price,
                'data-item-url'         => '/products',
                'data-item-image'       => $imageUrl,
                'data-item-metadata'    => json_encode(array_combine(
                    $this->object->tags,
                    array_map(function ($tag) { return true; }, $this->object->tags)
                )),
            ])
        );
    }
}
