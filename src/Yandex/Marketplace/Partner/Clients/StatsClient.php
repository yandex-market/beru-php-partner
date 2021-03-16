<?php

namespace Yandex\Marketplace\Partner\Clients;

use GuzzleHttp\Exception\GuzzleException;
use Yandex\Common\Exception\ForbiddenException;
use Yandex\Common\Exception\UnauthorizedException;
use Yandex\Marketplace\Partner\Exception\PartnerRequestException;
use Yandex\Marketplace\Partner\Models\Response\GetStatsByOrdersResponse;
use Yandex\Marketplace\Partner\Models\Response\GetStatsBySkusResponse;

class StatsClient extends Client
{
    /**
     * Get stats by orders
     *
     * @see https://yandex.ru/dev/market/partner-marketplace/doc/dg/reference/post-campaigns-id-stats-orders.html
     *
     * @param $campaignId
     * @param array $params
     * @param array $query
     * @param null $dbgKey
     * @return GetStatsByOrdersResponse
     * @throws GuzzleException
     * @throws ForbiddenException
     * @throws UnauthorizedException
     * @throws PartnerRequestException
     */
    public function getStatsByOrders($campaignId, array $params = [], array $query = [], $dbgKey = null)
    {
        $resource = 'campaigns/' . $campaignId . '/stats/orders.json';
        $resource .= '?' . $this->buildQueryString($query, $dbgKey);
        $response = $this->sendRequest(
            'POST',
            $this->getServiceUrl($resource),
            ['json' => $params]
        );


        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        return new GetStatsByOrdersResponse($decodedResponseBody);
    }

    /**
     * Get stats by skus
     *
     * @see https://yandex.ru/dev/market/partner-marketplace/doc/dg/reference/post-campaigns-id-stats-skus.html
     *
     * @param $campaignId
     * @param array $params
     * @param array $query
     * @param null $dbgKey
     * @return GetStatsBySkusResponse
     * @throws GuzzleException
     * @throws ForbiddenException
     * @throws UnauthorizedException
     * @throws PartnerRequestException
     */
    public function getStatsBySkus($campaignId, array $params = [], $dbgKey = null)
    {
        $resource = 'campaigns/' . $campaignId . '/stats/skus.json';
        $resource = $this->addDebugKey($resource, $dbgKey);
        $response = $this->sendRequest(
            'POST',
            $this->getServiceUrl($resource),
            ['json' => $params]
        );

        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        return new GetStatsBySkusResponse($decodedResponseBody);
    }
}
