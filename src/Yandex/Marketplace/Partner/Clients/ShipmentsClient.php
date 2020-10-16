<?php

namespace Yandex\Marketplace\Partner\Clients;

use Yandex\Marketplace\Partner\Models\Response\ShipmentsResponse;
use Yandex\Marketplace\Partner\Models\Response\GetShipmentsResponse;
use Yandex\Marketplace\Partner\Models\Response\GetShipmentResponse;
use Yandex\Marketplace\Partner\Models\Response\GetShipmentItemsResponse;

class ShipmentsClient extends Client
{
    /**
     * Creates a request
     *
     * @see https://yandex.ru/dev/market/partner-marketplace/doc/dg/reference/post-campaigns-id-shipments-requests-docpage/
     *
     * @param $campaignId
     * @param array $params
     * @param null $dbgKey
     * @return ShipmentsResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Marketplace\Partner\Exception\PartnerRequestException
     */
    public function createShipment($campaignId, array $params = [], $dbgKey = null)
    {
        $resource = 'campaigns/' . $campaignId . '/shipments/requests.json';
        $resource = $this->addDebugKey($resource, $dbgKey);
        $response = $this->sendRequest(
            'POST',
            $this->getServiceUrl($resource),
            ['json' => $params]
        );
        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        return new ShipmentsResponse($decodedResponseBody);
    }

    /**
     * Returns basic information about the shipments
     *
     * @see https://yandex.ru/dev/market/partner-marketplace/doc/dg/reference/get-campaigns-id-shipments-requests-docpage/
     *
     * @param $campaignId
     * @param array $params
     * @param null $dbgKey
     * @return GetShipmentsResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Marketplace\Partner\Exception\PartnerRequestException
     */
    public function getShipments($campaignId, array $params = [], $dbgKey = null)
    {
        $resource = 'campaigns/' . $campaignId . '/shipments/requests.json';
        $resource .= '?' . $this->buildQueryString($params, $dbgKey);
        $response = $this->sendRequest('GET', $this->getServiceUrl($resource));
        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        return new GetShipmentsResponse($decodedResponseBody);
    }

    /**
     * Returns detailed information about the shipment
     *
     * @see https://yandex.ru/dev/market/partner-marketplace/doc/dg/reference/get-campaigns-id-shipments-requests-id-docpage/
     *
     * @param $campaignId
     * @param $requestId
     * @param array $params
     * @param null $dbgKey
     * @return GetShipmentResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Marketplace\Partner\Exception\PartnerRequestException
     */
    public function getShipment($campaignId, $requestId, array $params = [], $dbgKey = null)
    {
        $resource = 'campaigns/' . $campaignId . '/shipments/requests/'.$requestId.'.json';
        $resource .= '?' . $this->buildQueryString($params, $dbgKey);
        $response = $this->sendRequest('GET', $this->getServiceUrl($resource));
        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        return new GetShipmentResponse($decodedResponseBody);
    }

    /**
     * Returns the list of goods in the shipment
     *
     * @see https://yandex.ru/dev/market/partner-marketplace/doc/dg/reference/get-campaigns-id-shipments-requests-id-items-docpage/
     *
     * @param $campaignId
     * @param $requestId
     * @param array $params
     * @param null $dbgKey
     * @return GetShipmentItemsResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Marketplace\Partner\Exception\PartnerRequestException
     */
    public function getShipmentItems($campaignId, $requestId, array $params = [], $dbgKey = null)
    {
        $resource = 'campaigns/' . $campaignId . '/shipments/requests/'.$requestId.'/items.json';
        $resource .= '?' . $this->buildQueryString($params, $dbgKey);
        $response = $this->sendRequest('GET', $this->getServiceUrl($resource));
        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        return new GetShipmentItemsResponse($decodedResponseBody);
    }

    /**
     * Returns file
     *
     * @see https://yandex.ru/dev/market/partner-marketplace/doc/dg/reference/get-campaigns-id-shipments-requests-id-documents-id-docpage/
     *
     * @param $campaignId
     * @param $requestId
     * @param $documentId
     * @param null $dbgKey
     * @return mixed|\SimpleXMLElement
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Marketplace\Partner\Exception\PartnerRequestException
     */
    public function downloadDocument($campaignId, $requestId, $documentId, $dbgKey = null)
    {
        $resource = 'campaigns/' . $campaignId . '/shipments/requests/'.$requestId.'/documents/'.$documentId;
        $resource = $this->addDebugKey($resource, $dbgKey);
        $response = $this->sendRequest('GET', $this->getServiceUrl($resource));
        $decodedResponseBody = $this->getDecodedBody($response->getBody()->getContents());

        return $decodedResponseBody;
    }
}
