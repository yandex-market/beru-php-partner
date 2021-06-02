<?php

namespace Yandex\Tests\Marketplace\Partner;

use GuzzleHttp\Psr7\Response;
use Yandex\Tests\TestCase;
use Yandex\Marketplace\Partner\Clients\PriceClient;

class PriceClientTest extends TestCase
{
    protected $fixturesFolder = 'fixtures';

    const CAMPAIGN_ID = 123456;

    public function testGetRecommendedPrices()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/recommendedPrices.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(PriceClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();

        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        /** @var PriceClient $mock */
        $offersResp = $mock->getRecommendedPrices(self::CAMPAIGN_ID);
        $offersResult = $offersResp->getResult();
        $offers = $offersResult->getOffers();
        $offer = $offers->current();

        for ($i = 0; $i < $offers->count(); $i++) {
            $this->assertEquals(
                $jsonObj->result->offers[$i]->marketSku,
                $offer->getMarketSku()
            );
            $pricesSuggestion = $offer->getPriceSuggestion();
            $priceSuggestion = $pricesSuggestion->current();

            for($j = 0; $j < $pricesSuggestion->count(); $j++) {
                $this->assertEquals(
                    $jsonObj->result->offers[$i]->priceSuggestion[$j]->type,
                    $priceSuggestion->getType()
                );
                $this->assertEquals(
                    $jsonObj->result->offers[$i]->priceSuggestion[$j]->price,
                    $priceSuggestion->getPrice()
                );
                $period = $priceSuggestion->getPeriod();

                if($period) {
                    $this->assertEquals(
                        $jsonObj->result->offers[$i]->priceSuggestion[$j]->period->start,
                        $period->getStart()
                    );
                    $this->assertEquals(
                        $jsonObj->result->offers[$i]->priceSuggestion[$j]->period->end,
                        $period->getEnd()
                    );
                }
                $priceSuggestion = $pricesSuggestion->next();
            }
            $offer = $offers->next();
        }
    }

    public function testUpdatePrices()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/postResponse.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(PriceClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();

        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        /** @var PriceClient $mock */
        $priceResponse = $mock->updatePrices(self::CAMPAIGN_ID);
        $status = $priceResponse->getStatus();

        $this->assertEquals($jsonObj->status, $status);
    }

//    public function testDeletePrices()
//    {
//        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/postResponse.json');
//        $jsonObj = json_decode($json);
//        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));
//
//        $mock = $this->getMockBuilder(PriceClient::class)
//            ->setMethods(['sendRequest'])
//            ->getMock();
//
//        $mock->expects($this->any())
//            ->method('sendRequest')
//            ->will($this->returnValue($response));
//
//        /** @var PriceClient $mock */
//        $priceResponse = $mock->deletePrices(self::CAMPAIGN_ID);
//        $status = $priceResponse->getStatus();
//
//        $this->assertEquals($jsonObj->status, $status);
//    }

    public function testGetOffersPrices()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/offersPrices.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(PriceClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();

        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        $priceResult = $mock->getOffersPrices(self::CAMPAIGN_ID);
        $priceResponse = $priceResult->getResult();
        $total = $priceResponse->getTotal();
        $this->assertEquals($jsonObj->result->total, $total);

        $offers = $priceResponse->getOffers();
        $offer = $offers->current();

        for ($i = 0; $i < $offers->count(); $i++) {
            $this->assertEquals(
                $jsonObj->result->offers[$i]->marketSku,
                $offer->getMarketSku()
            );
            $price = $offer->getPrice();

            $this->assertEquals(
                $jsonObj->result->offers[$i]->price->currencyId,
                $price->getCurrencyId()
            );
            if($price->getDiscountBase()) {
                $this->assertEquals(
                    $jsonObj->result->offers[$i]->price->discountBase,
                    $price->getDiscountBase()
                );
            }
            $this->assertEquals(
                $jsonObj->result->offers[$i]->price->value,
                $price->getValue()
            );
            $this->assertEquals(
                $jsonObj->result->offers[$i]->price->vat,
                $price->getVat()
            );

            $this->assertEquals(
                $jsonObj->result->offers[$i]->updatedAt,
                $offer->getUpdatedAt()
            );
            $offer = $offers->next();
        }
    }
}
