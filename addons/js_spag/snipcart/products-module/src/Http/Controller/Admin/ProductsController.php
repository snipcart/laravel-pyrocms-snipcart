<?php namespace Snipcart\ProductsModule\Http\Controller\Admin;

use Snipcart\ProductsModule\Product\Form\ProductFormBuilder;
use Snipcart\ProductsModule\Product\Table\ProductTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

class ProductsController extends AdminController
{

    /**
     * Display an index of existing entries.
     *
     * @param ProductTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(ProductTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Create a new entry.
     *
     * @param ProductFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(ProductFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Edit an existing entry.
     *
     * @param ProductFormBuilder $form
     * @param        $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(ProductFormBuilder $form, $id)
    {
        return $form->render($id);
    }
}
