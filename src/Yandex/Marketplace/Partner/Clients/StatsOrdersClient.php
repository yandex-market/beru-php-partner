<?php

namespace Yandex\Marketplace\Partner\Clients;

use Yandex\Marketplace\Partner\Models\Response\GetStatsOrdersResponse;

class StatsOrdersClient extends Client {

    /**
     * Stats orders list
     *
     * @see https://yandex.ru/dev/market/partner-marketplace-cd/doc/dg/reference/post-campaigns-id-stats-orders-docpage/
     *
     * @param $campaignId
     * @param array $params
     * @param array $query
     * @return GetStatsOrdersResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Marketplace\Partner\Exception\PartnerRequestException
     */
    public function getOrders($campaignId, array $params = [], array $query = [])
    {
        $resource = 'campaigns/' . $campaignId . '/stats/orders.json';
        $resource .= '?' . $this->buildQueryString($query);
        $response = $this->sendRequest(
            'POST',
            $this->getServiceUrl($resource),
            ['json' => $params]
        );
        return new GetStatsOrdersResponse($this->getDecodedBody($response->getBody()));
    }

}