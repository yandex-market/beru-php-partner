<?php

namespace Yandex\Marketplace\Partner\Clients;

use Yandex\Marketplace\Partner\Models\Response\GetRecommendedRelationshipResponse;
use Yandex\Marketplace\Partner\Models\Response\PostResponse;
use Yandex\Marketplace\Partner\Models\Response\GetActiveRelationshipResponse;

class RelationshipClient extends Client
{
    /**
     * Returns recommended relationship between products on the marketplace and products from catalog
     *
     * @see https://yandex.ru/dev/market/partner-marketplace-cd/doc/dg/reference/post-campaigns-id-offer-mapping-entries-suggestions-docpage/
     *
     * @param $campaignId
     * @param array $params
     * @param null $dbgKey
     * @return GetRecommendedRelationshipResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Marketplace\Partner\Exception\PartnerRequestException
     */
    public function getRecommendedRelationship($campaignId, array $params = [], $dbgKey = null)
    {
        $resource = 'campaigns/' . $campaignId . '/offer-mapping-entries/suggestions.json';
        $resource = $this->addDebugKey($resource, $dbgKey);
        $response = $this->sendRequest(
            'POST',
            $this->getServiceUrl($resource),
            ['json' => $params]
        );
        $decodedResponseBody = $this->getDecodedBody($response->getBody());
        $getRecommendedRelationshipResponse = new GetRecommendedRelationshipResponse($decodedResponseBody);

        return $getRecommendedRelationshipResponse;
    }

    /**
     * Creates relations between products on the marketplace and products from catalog
     *
     * @see https://yandex.ru/dev/market/partner-marketplace-cd/doc/dg/reference/post-campaigns-id-offer-mapping-entries-updates-docpage/
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
    public function updateRelationship($campaignId, array $params = [], $dbgKey = null)
    {
        $resource = 'campaigns/' . $campaignId . '/offer-mapping-entries/updates.json';
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
     * Returns a list of links between products on the  marketplace and products from catalog
     *
     * @see https://yandex.ru/dev/market/partner-marketplace/doc/dg/reference/get-campaigns-id-offer-mapping-entries-docpage/
     *
     * @param $campaignId
     * @param array $params
     * @param null $dbgKey
     * @return GetActiveRelationshipResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Marketplace\Partner\Exception\PartnerRequestException
     */
    public function getActiveRelationship($campaignId, array $params = [], $dbgKey = null)
    {
        $resource = 'campaigns/' . $campaignId . '/offer-mapping-entries.json';
        $resource .= '?' . $this->buildQueryString($params, $dbgKey);
        $response = $this->sendRequest('GET', $this->getServiceUrl($resource));
        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        return new GetActiveRelationshipResponse($decodedResponseBody);
    }
}
