<?php

namespace Yandex\Beru\Partner\Clients;

use Yandex\Beru\Partner\Models\Response\GetDeliveryLabelsDataResponse;
use Yandex\Beru\Partner\Models\Response\GetUpdateOrderResponse;
use Yandex\Beru\Partner\Models\Response\GetInfoOrderBoxesResponse;
use Yandex\Beru\Partner\Models\Response\GetOrdersResponse;
use Yandex\Beru\Partner\Models\Response\GetOrderResponse;
use Yandex\Beru\Partner\Models\Response\GetDeliveryServiceResponse;
use Yandex\Beru\Partner\Models\Response\PostResponse;
use Yandex\Beru\Partner\Models\Response\UpdateOrdersStatusesResponse;

class OrderProcessingClient extends Client
{
    /**
     * Changes order status
     *
     * @https://yandex.ru/dev/market/partner-marketplace-cd/doc/dg/reference/put-campaigns-id-orders-id-status-docpage/
     *
     * @param $campaignId
     * @param $orderId
     * @param array $params
     * @return \Yandex\Beru\Partner\Models\Order
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Beru\Partner\Exception\PartnerRequestException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     */
    public function updateOrderStatus($campaignId, $orderId, array $params = [])
    {
        $resource = 'campaigns/' . $campaignId . '/orders/' . $orderId . '/status.json';

        $response = $this->sendRequest(
            'PUT',
            $this->getServiceUrl($resource),
            ['json' => $params]
        );
        $decodedResponseBody = $this->getDecodedBody($response->getBody());
        $getUpdateOrderResponse = new GetUpdateOrderResponse($decodedResponseBody);

        return $getUpdateOrderResponse->getOrder();
    }

    /**
     * Sends Beru information about the distribution of goods included in the order, by boxes.
     *
     * @see https://yandex.ru/dev/market/partner-marketplace-cd/doc/dg/reference/put-campaigns-id-orders-id-delivery-shipments-id-boxes-docpage/
     *
     * @param $campaignId
     * @param $orderId
     * @param $shipmentId
     * @param array $params
     * @return GetInfoOrderBoxesResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Beru\Partner\Exception\PartnerRequestException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     */
    public function putInfoOrderBoxes($campaignId, $orderId, $shipmentId, array $params = [])
    {
        $resource = 'campaigns/' . $campaignId . '/orders/' . $orderId . '/delivery/shipments/' . $shipmentId . '/boxes.json';

        $response = $this->sendRequest(
            'PUT',
            $this->getServiceUrl($resource),
            ['json' => $params]
        );
        $decodedResponseBody = $this->getDecodedBody($response->getBody());
        $getInfoOrderBoxesResponse = new GetInfoOrderBoxesResponse($decodedResponseBody);

        return $getInfoOrderBoxesResponse;
    }

    /**
     * Returns information about orders.
     *
     * @see https://yandex.ru/dev/market/partner-marketplace-cd/doc/dg/reference/get-campaigns-id-orders-docpage/
     *
     * @param $campaignId
     * @param array $params
     * @return GetOrdersResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Beru\Partner\Exception\PartnerRequestException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     */
    public function getOrders($campaignId, array $params = [])
    {
        $resource = 'campaigns/' . $campaignId . '/orders.json';
        $resource .= '?' . $this->buildQueryString($params);
        $response = $this->sendRequest('GET', $this->getServiceUrl($resource));
        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        return new GetOrdersResponse($decodedResponseBody);
    }

    /**
     * Returns information about order.
     *
     * @see https://yandex.ru/dev/market/partner-marketplace-cd/doc/dg/reference/get-campaigns-id-orders-id-docpage/
     *
     * @param $campaignId
     * @param $orderId
     * @param array $params
     * @return \Yandex\Beru\Partner\Models\Order
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Beru\Partner\Exception\PartnerRequestException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     */
    public function getOrder($campaignId, $orderId, array $params = [])
    {
        $resource = 'campaigns/' . $campaignId . '/orders/' . $orderId . '.json';
        $resource .= '?' . $this->buildQueryString($params);
        $response = $this->sendRequest('GET', $this->getServiceUrl($resource));
        $decodedResponseBody = $this->getDecodedBody($response->getBody());
        $getOrderResponse = new GetOrderResponse($decodedResponseBody);

        return $getOrderResponse->getOrder();
    }

    /**
     * Return delivery services
     *
     * @see https://yandex.ru/dev/market/partner-marketplace-cd/doc/dg/reference/get-delivery-services-docpage/
     *
     * @return \Yandex\Beru\Partner\Models\DeliveryServices
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Beru\Partner\Exception\PartnerRequestException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     */
    public function getDeliveryService()
    {
        $resource = 'delivery/services.json';
        $response = $this->sendRequest('GET', $this->getServiceUrl($resource));
        $decodedResponseBody = $this->getDecodedBody($response->getBody());
        $getDeliveryServiceResponse = new GetDeliveryServiceResponse($decodedResponseBody['result']);

        return $getDeliveryServiceResponse->getDeliveryService();
    }

    /**
     * Changes orders statuses
     *
     * @see https://yandex.ru/dev/market/partner-marketplace-cd/doc/dg/reference/post-campaigns-id-orders-status-update-docpage/
     *
     * @param $campaignId
     * @param array $params
     * @return UpdateOrdersStatusesResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Beru\Partner\Exception\PartnerRequestException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     */
    public function updateOrdersStatuses($campaignId, array $params = [])
    {
        $resource = 'campaigns/' . $campaignId . '/orders/status-update.json';

        $response = $this->sendRequest(
            'POST',
            $this->getServiceUrl($resource),
            ['json' => $params]
        );
        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        return new UpdateOrdersStatusesResponse($decodedResponseBody);
    }

    /**
     * Return delivery labels
     *
     * @see https://yandex.ru/dev/market/partner-marketplace-cd/doc/dg/reference/get-campaigns-id-orders-id-delivery-labels-docpage/
     *
     * @param $campaignId
     * @param $orderId
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Beru\Partner\Exception\PartnerRequestException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     */
    public function getDeliveryLabels($campaignId, $orderId)
    {
        $resource = 'campaigns/' . $campaignId . '/orders/' . $orderId . '/delivery/labels.json';
        $response = $this->sendRequest('GET', $this->getServiceUrl($resource));
        $header = $response->getHeader("Content-Type");
        if ($header[0] == "application/pdf") {
            return $response->getBody()->getContents();
        }

        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        return new PostResponse($decodedResponseBody);
    }

    /**
     * Return delivery label for boxes
     *
     * @see https://yandex.ru/dev/market/partner-marketplace-cd/doc/dg/reference/get-campaigns-id-orders-id-delivery-shipments-id-boxes-id-label-docpage/
     *
     * @param $campaignId
     * @param $orderId
     * @param $shipmentId
     * @param $boxId
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Beru\Partner\Exception\PartnerRequestException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     */
    public function getDeliveryLabelForBoxes($campaignId, $orderId, $shipmentId, $boxId)
    {
        $resource = 'campaigns/' . $campaignId . '/orders/' . $orderId . '/delivery/shipments/' . $shipmentId . '/boxes/' . $boxId . 'label.json';
        $response = $this->sendRequest('GET', $this->getServiceUrl($resource));
        $header = $response->getHeader("Content-Type");
        if ($header[0] == "application/pdf") {
            return $response->getBody()->getContents();
        }

        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        return new PostResponse($decodedResponseBody);
    }

    /**
     * Return delivery labels data
     *
     * @see https://yandex.ru/dev/market/partner-marketplace-cd/doc/dg/reference/get-campaigns-id-orders-id-delivery-labels-data-docpage/#get-campaigns-id-orders-id-delivery-labels-data
     *
     * @param $campaignId
     * @param $orderId
     * @return GetDeliveryLabelsDataResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Beru\Partner\Exception\PartnerRequestException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     */
    public function getDeliveryLabelsData($campaignId, $orderId)
    {
        $resource = 'campaigns/' . $campaignId . '/orders/' . $orderId . '/delivery/labels/data.json';
        $response = $this->sendRequest('GET', $this->getServiceUrl($resource));
        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        return new GetDeliveryLabelsDataResponse($decodedResponseBody);
    }
}
