<?php

namespace Yandex\Tests\Beru\Partner;

use GuzzleHttp\Psr7\Response;
use Yandex\Marketplace\Partner\Clients\StatsClient;
use Yandex\Marketplace\Partner\Models\StatsOrders;
use Yandex\Tests\TestCase;

class StatsClientTest extends TestCase
{
    protected $fixturesFolder = 'fixtures';

    const CAMPAIGN_ID = 123456;
    const REQUEST_ID = 789456;

    public function testGetStatsBySkus()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/skus.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));


        $mock = $this->getMockBuilder(StatsClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();

        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        /** @var StatsClient $mock */
        $skusResponse = $mock->getStatsBySkus(self::CAMPAIGN_ID);
        $this->assertEquals($jsonObj->status, $skusResponse->getStatus());

        $shopSkuses = $skusResponse->getResult();
        $current = $shopSkuses->current();

        for ($i = 0; $i < $shopSkuses->count(); $i++) {
            $this->assertEquals($jsonObj->result->shopSkus[$i]->shopSku, $current->getShopSku());
            $this->assertEquals($jsonObj->result->shopSkus[$i]->marketSku, $current->getMarketSku());
            $this->assertEquals($jsonObj->result->shopSkus[$i]->price, $current->getPrice());
            $this->assertEquals($jsonObj->result->shopSkus[$i]->categoryId, $current->getCategoryId());
            $this->assertEquals($jsonObj->result->shopSkus[$i]->categoryName, $current->getCategoryName());

            $this->assertEquals($jsonObj->result->shopSkus[$i]->weightDimensions->length, $current->getWeightDimensions()->getLength());
            $this->assertEquals($jsonObj->result->shopSkus[$i]->weightDimensions->width, $current->getWeightDimensions()->getWidth());
            $this->assertEquals($jsonObj->result->shopSkus[$i]->weightDimensions->height, $current->getWeightDimensions()->getHeight());
            $this->assertEquals($jsonObj->result->shopSkus[$i]->weightDimensions->weight, $current->getWeightDimensions()->getWeight());

            $this->assertEquals($jsonObj->result->shopSkus[$i]->hidings[0]->type, $current->getHidings()->current()->getType());
            $this->assertEquals($jsonObj->result->shopSkus[$i]->hidings[0]->code, $current->getHidings()->current()->getCode());
            $this->assertEquals($jsonObj->result->shopSkus[$i]->hidings[0]->message, $current->getHidings()->current()->getMessage());
            $this->assertEquals($jsonObj->result->shopSkus[$i]->hidings[0]->comment, $current->getHidings()->current()->getComment());

            $this->assertEquals($jsonObj->result->shopSkus[$i]->warehouses[0]->name, $current->getWarehouses()->current()->getName());
            $this->assertEquals($jsonObj->result->shopSkus[$i]->warehouses[0]->id, $current->getWarehouses()->current()->getId());
            $this->assertEquals($jsonObj->result->shopSkus[$i]->warehouses[0]->stocks[0]->type, $current->getWarehouses()->current()->getStocks()->current()->getType());
            $this->assertEquals($jsonObj->result->shopSkus[$i]->warehouses[0]->stocks[0]->count, $current->getWarehouses()->current()->getStocks()->current()->getCount());

            $this->assertEquals($jsonObj->result->shopSkus[$i]->storage[0]->type, $current->getStorage()->current()->getType());
            $this->assertEquals($jsonObj->result->shopSkus[$i]->storage[0]->count, $current->getStorage()->current()->getCount());
            $this->assertEquals($jsonObj->result->shopSkus[$i]->storage[0]->inclusions[0]->count, $current->getStorage()->current()->getInclusions()->current()->getCount());
            $this->assertEquals($jsonObj->result->shopSkus[$i]->storage[0]->inclusions[0]->type, $current->getStorage()->current()->getInclusions()->current()->getType());

            $this->assertEquals($jsonObj->result->shopSkus[$i]->tariffs[0]->type, $current->getTariffs()->current()->getType());
            $this->assertEquals($jsonObj->result->shopSkus[$i]->tariffs[0]->percent, $current->getTariffs()->current()->getPercent());
            $this->assertEquals($jsonObj->result->shopSkus[$i]->tariffs[0]->amount, $current->getTariffs()->current()->getAmount());

            $current = $shopSkuses->next();
        }
    }

    public function testGetStatsByOrders()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/orders.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));


        $mock = $this->getMockBuilder(StatsClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();

        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        /** @var StatsClient $mock */
        $ordersResponse = $mock->getStatsByOrders(self::CAMPAIGN_ID);
        $this->assertEquals($jsonObj->status, $ordersResponse->getStatus());
        $result = $ordersResponse->getResult();
        $this->assertEquals($jsonObj->result->paging->nextPageToken, $result->getNextPageToken());
        /**@var StatsOrders $orders**/
        $orders = $result->getOrders();
        $current = $orders->current();
        for ($i = 0; $i < $orders->count(); $i++) {
            $this->assertEquals($jsonObj->result->orders[$i]->id, $current->getId());
            $this->assertEquals($jsonObj->result->orders[$i]->creationDate, $current->getCreationDate());
            $this->assertEquals($jsonObj->result->orders[$i]->statusUpdateDate, $current->getStatusUpdateDate());
            $this->assertEquals($jsonObj->result->orders[$i]->status, $current->getStatus());
            $this->assertEquals($jsonObj->result->orders[$i]->paymentType, $current->getPaymentType());

            $this->assertEquals($jsonObj->result->orders[$i]->deliveryRegion->id, $current->getDeliveryRegion()->getId());
            $this->assertEquals($jsonObj->result->orders[$i]->deliveryRegion->name, $current->getDeliveryRegion()->getName());

            $this->assertEquals($jsonObj->result->orders[$i]->items[0]->offerName, $current->getItems()->current()->getOfferName());
            $this->assertEquals($jsonObj->result->orders[$i]->items[0]->marketSku, $current->getItems()->current()->getMarketSku());
            $this->assertEquals($jsonObj->result->orders[$i]->items[0]->shopSku, $current->getItems()->current()->getShopSku());
            $this->assertEquals($jsonObj->result->orders[$i]->items[0]->count, $current->getItems()->current()->getCount());

            $this->assertEquals($jsonObj->result->orders[$i]->items[0]->prices[0]->costPerItem,
                $current->getItems()->current()->getPrices()->current()->getCostPerItem());
            $this->assertEquals($jsonObj->result->orders[$i]->items[0]->prices[0]->type,
                $current->getItems()->current()->getPrices()->current()->getType());
            $this->assertEquals($jsonObj->result->orders[$i]->items[0]->prices[0]->total,
                $current->getItems()->current()->getPrices()->current()->getTotal());

            $this->assertEquals($jsonObj->result->orders[$i]->items[0]->warehouse->id,
                $current->getItems()->current()->getWarehouse()->getId());
            $this->assertEquals($jsonObj->result->orders[$i]->items[0]->warehouse->name,
                $current->getItems()->current()->getWarehouse()->getName());

            $this->assertEquals($jsonObj->result->orders[$i]->items[0]->details[0]->itemStatus,
                $current->getItems()->current()->getDetails()->current()->getItemStatus());
            $this->assertEquals($jsonObj->result->orders[$i]->items[0]->details[0]->itemCount,
                $current->getItems()->current()->getDetails()->current()->getItemCount());
            $this->assertEquals($jsonObj->result->orders[$i]->items[0]->details[0]->updateDate,
                $current->getItems()->current()->getDetails()->current()->getUpdateDate());
            $this->assertEquals($jsonObj->result->orders[$i]->items[0]->details[0]->stockType,
                $current->getItems()->current()->getDetails()->current()->getStockType());

            $this->assertEquals($jsonObj->result->orders[$i]->initialItems[0]->offerName,
                $current->getInitialItems()->current()->getOfferName());
            $this->assertEquals($jsonObj->result->orders[$i]->initialItems[0]->marketSku,
                $current->getInitialItems()->current()->getMarketSku());
            $this->assertEquals($jsonObj->result->orders[$i]->initialItems[0]->shopSku,
                $current->getInitialItems()->current()->getShopSku());

            $this->assertEquals($jsonObj->result->orders[$i]->payments[0]->id,
                $current->getPayments()->current()->getId());
            $this->assertEquals($jsonObj->result->orders[$i]->payments[0]->date,
                $current->getPayments()->current()->getDate());
            $this->assertEquals($jsonObj->result->orders[$i]->payments[0]->type,
                $current->getPayments()->current()->getType());
            $this->assertEquals($jsonObj->result->orders[$i]->payments[0]->source,
                $current->getPayments()->current()->getSource());
            $this->assertEquals($jsonObj->result->orders[$i]->payments[0]->total,
                $current->getPayments()->current()->getTotal());
            $this->assertEquals($jsonObj->result->orders[$i]->payments[0]->paymentOrder->id,
                $current->getPayments()->current()->getPaymentOrder()->getId());
            $this->assertEquals($jsonObj->result->orders[$i]->payments[0]->paymentOrder->date,
                $current->getPayments()->current()->getPaymentOrder()->getDate());

            $this->assertEquals($jsonObj->result->orders[$i]->commissions[0]->type,
                $current->getCommissions()->current()->getType());
            $this->assertEquals($jsonObj->result->orders[$i]->commissions[0]->actual,
                $current->getCommissions()->current()->getActual());
            $this->assertEquals($jsonObj->result->orders[$i]->commissions[0]->predicted,
                $current->getCommissions()->current()->getPredicted());

            $current = $orders->next();
        }
    }
}
