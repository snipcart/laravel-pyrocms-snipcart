<?php namespace Snipcart\ProductsModule\Http\Controller;

use Anomaly\Streams\Platform\Event\Response;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ShippingController extends Controller
{
    /**
     * The request object.
     *
     * @var Request
     */
    protected $request;

    /**
     * The response factory.
     *
     * @var ResponseFactory
     */
    protected $response;

	public function __construct()
    {
        $this->request     = app('Illuminate\Http\Request');
        $this->response    = app('Illuminate\Contracts\Routing\ResponseFactory');
    }

	public function webhook()
	{
		$country = $this->request->input('content.shippingAddress.country');
		$province = $this->request->input('content.shippingAddress.province');

		$items = $this->request->input('content.items');

		$hasFrozenFood = false;
		foreach ($items as $item) {
			if($item['metadata'] != null && $item['metadata']['frozen']) {
				$hasFrozenFood = true;
			}
		}

		if($hasFrozenFood && ($country != 'CA' || $province != 'QC')) {
			return $this->response->json([
			  "errors" => [[
			    "key"=> "invalid_shipping_address",
			    "message"=> "We can only ship frozen food to the Province of Quebec."
			    ]
			  ]
			]);
		}

		return $this->response->json([
			"rates"=> [[
				"cost"=> 10,
				"description"=> "10$ shipping"
				]
			]
		]);
	}
}