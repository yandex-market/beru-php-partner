<?php

namespace Yandex\Marketplace\Partner\Clients;

use Yandex\Marketplace\Partner\Models\Response\PostResponse;
use Yandex\Marketplace\Partner\Models\Response\GetOfferPricesResponse;
use Yandex\Marketplace\Partner\Models\Response\GetRecommendedPricesResponse;

class PriceClient extends Client
{
    /**
     * Returns recommended prices for offers
     *
     * @see https://yandex.ru/dev/market/partner-marketplace-cd/doc/dg/reference/post-campaigns-id-offer-prices-suggestions-docpage/
     *
     * @param $campaignId
     * @param array $params
     * @param null $dbgKey
     * @return GetRecommendedPricesResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Marketplace\Partner\Exception\PartnerRequestException
     */
    public function getRecommendedPrices ($campaignId, array $params = [], $dbgKey = null)
    {
        $resource = 'campaigns/' . $campaignId . '/offer-prices/suggestions.json';
        $resource = $this->addDebugKey($resource, $dbgKey);
        $response = $this->sendRequest(
            'POST',
            $this->getServiceUrl($resource),
            ['json' => $params]
        );
        $decodedResponseBody = $this->getDecodedBody($response->getBody());
        $getRecommendedPricesResponse = new GetRecommendedPricesResponse($decodedResponseBody);

        return $getRecommendedPricesResponse;
    }

    /**
     * Manage the prices of offers
     *
     * @see https://yandex.ru/dev/market/partner-marketplace-cd/doc/dg/reference/post-campaigns-id-offer-prices-updates-docpage/
     *
     * @param $campaignId
     * @param array $params
     * @param null $dbgKey
     * @return PostResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Marketplace\Partner\Exception\PartnerRequestException
     */
    public function updatePrices($campaignId, array $params = [], $dbgKey = null)
    {
        $resource = 'campaigns/' . $campaignId . '/offer-prices/updates.json';
        $resource = $this->addDebugKey($resource, $dbgKey);
        $response = $this->sendRequest(
            'POST',
            $this->getServiceUrl($resource),
            ['json' => $params]
        );
        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        return new PostResponse($decodedResponseBody);
    }

    /**
     * Get all prices set by API
     *
     * @see https://yandex.ru/dev/market/partner-marketplace-cd/doc/dg/reference/get-campaigns-id-offer-prices-docpage/
     *
     * @param $campaignId
     * @param array $params
     * @param null $dbgKey
     * @return GetOfferPricesResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Marketplace\Partner\Exception\PartnerRequestException
     */
    public function getOffersPrices($campaignId, array $params = [], $dbgKey = null)
    {
        $resource = 'campaigns/' . $campaignId . '/offer-prices.json';
        $resource .= '?' . $this->buildQueryString($params, $dbgKey);
        $response = $this->sendRequest('GET', $this->getServiceUrl($resource));
        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        return new GetOfferPricesResponse($decodedResponseBody);
    }
}
