<?php

namespace Yandex\Marketplace\Partner\Clients;

use Yandex\Marketplace\Partner\Models\Response\GetCartResponse;
use Yandex\Marketplace\Partner\Models\Response\AcceptOrderResponse;
use Yandex\Marketplace\Partner\Models\Response\CancellationOrderResponse;

class OrderProcessingBeruClient extends Client
{
    /**
     * Sends the store a list of items in the shopping cart
     *
     * @see https://yandex.ru/dev/market/partner-marketplace-cd/doc/dg/reference/post-cart-docpage/
     *
     * @param $response
     * @return \Yandex\Marketplace\Partner\Models\Cart
     */
    public function getCart($response)
    {
        $decodedResponseBody = $this->getDecodedBody($response);
        $getCartResponse = new GetCartResponse($decodedResponseBody);

        return $getCartResponse->getCart();
    }

    /**
     * Sends a new order to the store
     *
     * @see https://yandex.ru/dev/market/partner-marketplace-cd/doc/dg/reference/post-order-accept-docpage/
     *
     * @param $response
     * @return \Yandex\Marketplace\Partner\Models\Order
     */
    public function acceptOrder($response)
    {
        $decodedResponseBody = $this->getDecodedBody($response);
        $acceptOrderResponse = new AcceptOrderResponse($decodedResponseBody);

        return $acceptOrderResponse->getOrder();
    }

    /**
     * Notifies the store about changing the status of the order.
     *
     * @see https://yandex.ru/dev/market/partner-marketplace-cd/doc/dg/reference/post-order-status-docpage/
     *
     * @param $response
     * @return \Yandex\Marketplace\Partner\Models\Order
     */
    public function orderStatus($response)
    {
        $decodedResponseBody = $this->getDecodedBody($response);
        $acceptOrderResponsenew = new AcceptOrderResponse($decodedResponseBody);

        return $acceptOrderResponsenew->getOrder();
    }

	/**
	 * Sends an order cancellation request to the store
	 *
	 * @see https://yandex.ru/dev/market/partner-dsbs/doc/dg/reference/post-order-cancellation-notify.html
	 *
	 * @param $response
	 * @return \Yandex\Marketplace\Partner\Models\Order
	 */
	public function cancellationNotify($response)
	{
		$decodedResponseBody = $this->getDecodedBody($response);
		$cancellationOrderResponse = new CancellationOrderResponse($decodedResponseBody);

		return $cancellationOrderResponse->getOrder();
	}

    /**
     * @param $response
     * @return array
     */
    public function getResponse($response)
    {
        $decodedResponseBody = $this->getDecodedBody($response);

        return $decodedResponseBody;
    }
}
