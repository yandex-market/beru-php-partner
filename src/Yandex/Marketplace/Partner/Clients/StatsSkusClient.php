<?php

namespace Yandex\Marketplace\Partner\Clients;

use Yandex\Marketplace\Partner\Models\Response\GetStatsSkusResponse;

class StatsSkusClient extends Client {

    /**
     * Stats skus list
     *
     * @see https://yandex.ru/dev/market/partner-marketplace-cd/doc/dg/reference/post-campaigns-id-stats-skus-docpage/
     *
     * @param $campaignId
     * @param array $params
     * @return GetStatsSkusResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Marketplace\Partner\Exception\PartnerRequestException
     */
    public function getSkus($campaignId, array $params = [])
    {
        $resource = 'campaigns/' . $campaignId . '/stats/skus.json';
        $response = $this->sendRequest(
            'POST',
            $this->getServiceUrl($resource),
            ['json' => $params]
        );
        return new GetStatsSkusResponse($this->getDecodedBody($response->getBody()));
    }

}