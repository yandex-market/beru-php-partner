<?php

namespace Yandex\Marketplace\Partner\Clients;

use Yandex\Marketplace\Partner\Models\Response\StocksResponse;

class StocksClient extends Client
{
    /**
     * Requests information stocks
     *
     * @see https://yandex.ru/dev/market/partner-marketplace-cd/doc/dg/reference/post-stocks-docpage/
     *
     * @param $response
     * @return StocksResponse
     */
    public function getStocks($response)
    {
        $decodedResponseBody = $this->getDecodedBody($response);

        return new StocksResponse($decodedResponseBody);
    }
}
