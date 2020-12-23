Ниже представлено описание и примеры запросов к API и методов, которыми они реализованы. В примерах указаны только некоторые аргументы методов. Остальные аргументы описаны в статьях о соответствующих запросах 
[технической документации API](https://yandex.ru/dev/market/partner-marketplace-cd/doc/dg/reference/all-methods-docpage/). Ссылки на статьи приведены в описаниях методов.

# Управление показом товаров

Методы клиента `HiddenOffersClient` позволяют управлять показом товаров: скрывать и возобновлять их показ на маркетплейсе Яндекс.Маркета.

```php
$hiddenOffersClient = new \Yandex\Marketplace\Partner\Clients\HiddenOffersClient($clientId, $token);
```

## Информация о скрытых товарах

Метод `getInfo` возвращает список скрытых товаров магазина: 

```php
// Получаем объект со скрытыми товарами
$hiddenOffersObject = $hiddenOffersClient->getInfo($campaignId);
$result = $hiddenOffersObject->getResult();
// Получаем итератор по скрытым товарам
$hiddenOffers = $result->getHiddenOffers();
// Печатаем информацию о скрытиях
foreach ($hiddenOffers as $hiddenOffer) {
    echo "Comment: " . $hiddenOffer->getComment();
    echo "MarketSku: " . $hiddenOffer->getMarkerSku();
    echo "TtlInHours: " . $hiddenOffer->getTtlInHours();
}
```

Товары отсортированы в лексикографическом порядке по возрастанию SKU на Яндексе.

Метод возвращает результаты [постранично](Основные-понятия#Постраничный-возврат).

Подробнее см. в [документации API](https://yandex.ru/dev/market/partner-marketplace-cd/doc/dg/reference/get-campaigns-id-hidden-offers-docpage/).

## Скрытие товаров и настройки скрытия

Метод `hideOffers` позволяет:

* Скрыть товары магазина на маркетплейсе Яндекс.Маркета на указанное время.

  ```php
  // Скрываем товар
  $hideOffersResponse = $hiddenOffersClient->hideOffers($campaignId, [
      'hiddenOffers' => [
          [
              // SKU на Яндексе, обязательный параметр
              'marketSku' => 345723894,
          ],
      ],
  ]);
  ```

* Изменить время скрытия товаров и комментарии. Чтобы внести изменения, передайте в теле запроса SKU на Яндексе уже скрытого товара и новые значения параметров `comment` и `ttlInHours`. При этом предыдущие значения этих параметров будут удалены.  

  ```php
  // Изменяем время скрытия товара
  $hideOffersResponse = $hiddenOffersClient->hideOffers($campaignId, [
      'hiddenOffers' => [
          [
              // SKU на Яндексе, обязательный параметр
              'marketSku' => 345723894,
              // Количество часов до возобновления показа товара,
              // необязательный параметр              
              'ttlInHours' => 1,
          ],
      ],
  ]);
  ```

Подробнее см. в [документации API](https://yandex.ru/dev/market/partner-marketplace-cd/doc/dg/reference/post-campaigns-id-hidden-offers-docpage/).

## Возобновление показа товаров

Метод `showOffers` возобновляет показ скрытых товаров магазина на маркетплейсе Яндекс.Маркета.

```php
// Возобновляем показ товара
$showOffersResponse = $hiddenOffersClient->showOffers($campaignId, [
    'hiddenOffers' => [
        [
            // SKU на Яндексе, обязательный параметр
            'marketSku' => 345723894,
        ],
    ],
]);
```

Подробнее см. в [документации API](https://yandex.ru/dev/market/partner-marketplace-cd/doc/dg/reference/delete-campaigns-id-hidden-offers-docpage/).

# Управление ценами

Методы клиента `PriceClient` позволяют магазину работать с ценами товаров, размещенных на маркетплейсе Яндекс.Маркета.

```php
$priceClient = new \Yandex\Marketplace\Partner\Clients\PriceClient($clientId, $token);
```

## Рекомендованные цены

Метод `getRecommendedPrices` возвращает рекомендованные цены на товары, которые размещаются на маркетплейсе Яндекс.Маркета.

```php
// Получаем итератор по рекомендованным ценам
$offersResponse = $priceClient->getRecommendedPrices($campaignId, [
    'offers' => [
        [
            // SKU на Яндексе, обязательный параметр        
            'marketSku' => 3457345293,
        ],
        [
            'marketSku' => 1475857459,
        ],
    ],
]);
$result = $offersResponse->getResult();
$recommendedPrices = $result->getOffers();
// Печатаем рекомендованные цены
foreach ($recommendedPrices as $recommendedPrice) {
    echo 'MarketSku: ' . $recommendedPrice->getMarketSku();
    // Получаем рекомендованные цены на товар
    $pricesSuggestion = $recommendedPrice->getPriceSuggestion();
    foreach ($pricesSuggestion as $priceSuggestion) {
        echo 'Type: ' . $priceSuggestion->getType();
        echo 'Price: ' . $priceSuggestion->getPrice();
        echo 'Start of promotion ' . $priceSuggestion->getPeriod()->getStart();
        echo 'End of promotion ' . $priceSuggestion->getPeriod()->getEnd();
    }
}
```

Рекомендации зависят от цен, установленных на товары другими партнерами. Если один товар поставляют несколько партнеров, на маркетплейсе Яндекс.Маркета сначала продается товар с более низкой ценой. Когда закончится товар по низкой цене, начнет продаваться товар по более высокой цене. Подробнее см. в разделе [Цены и рекомендации](https://yandex.ru/support/marketplace/catalog/prices.html) Справки Маркета для моделей FBY и FBS.

Выходные данные содержат для каждого товара несколько рекомендованных цен, соответствующих разной частоте показов. Если на маркетплейсе Яндекс.Маркета проходит или будет проходить акция, в которой может участвовать товар, то выходные данные также содержат рекомендованную цену для участия в акции.

Метод возвращает [итератор](Основные-понятия#Итераторы).

Подробнее см. в [документации API](https://yandex.ru/dev/market/partner-marketplace-cd/doc/dg/reference/post-campaigns-id-offer-prices-suggestions-docpage/).

## Установка цен

Метод `updatePrices` устанавливает цены на товары: 

* Чтобы установить новую цену вместо указанной в каталоге, укажите параметр `price`. Цена устанавливается на 30 дней с последнего обновления, после этого снова начнет действовать цена из каталога.

  ```php
  // Устанавливаем цены товаров
  $updatePricesResponse = $priceClient->updatePrices($campaignId, [
      'offers' => [
          [
              // SKU на Яндексе, обязательный параметр        
              'marketSku' => 3457345293,
              // Информация о новой цене, обязательный параметр
              // (если нет параметра delete)            
              'price' => [
                  // Новая цена, обязательный параметр            
                  'value' => 1500.00, 
                  // Валюта цены, обязательный параметр                
                  'currencyId' => 'RUR',
              ],
          ],
          [
              'marketSku' => 5490875940,
              'price' => [
                  'value' => 800.00,
                  // Цена товара без скидки, необязательный параметр.
                  // Если параметр указан, параметр value означает цену со скидкой
                  'discountBase' => 950.00,
                  'currencyId' => 'RUR',
              ],
          ],            
  ]]);
  ```

* Чтобы удалить цену товара, установленную через API, укажите параметр `'delete' => true`. После удаления начнет действовать цена из каталога.

  ```php
  // Удаляем цену товара, установленную через API
  $updatePricesResponse = $priceClient->updatePrices($campaignId, [
      'offers' => [
          [  
              'marketSku' => 1475857459,
              // Удалять ли цену, установленную через API.
              // Обязательный параметр (если нет параметра price)            
              'delete' => true,
          ],
  ]]);
  ```  
  
Подробнее см. в [документации API](https://yandex.ru/dev/market/partner-marketplace-cd/doc/dg/reference/post-campaigns-id-offer-prices-updates-docpage/).

## Список цен, установленных через API

Метод `getOfferPrices` возвращает список цен на товары, установленных через партнерский API.

```php
// Получаем список цен
$offerPrices = $priceClient->getOfferPrices($campaignId);
$result = $offerPrices->getResult();
$offers = $result->getOffers();
// Печатаем информацию о товаре и его цене
foreach ($offerPrices as $offerPrice) {
    echo "MarketSku " . $offerPrice->getMarketSku();
    echo "UpdateAt " . $offerPrice->getUpdatedAt();
    // Информация о цене на товар, установленной через API
    $price = $offerPrice->getPrice();
    echo 'CurrencyId ' . $price->getCurrencyId();
    echo 'DiscountBase ' . $price->getDiscountBase();
    echo 'Value ' . $price->getValue();
    echo 'Vat ' . $price->getVat();
}
```

Метод возвращает результаты [постранично](Основные-понятия#Постраничный-возврат).

Подробнее см. в [документации API](https://yandex.ru/dev/market/partner-marketplace-cd/doc/dg/reference/get-campaigns-id-offer-prices-docpage/).

# Управление связями между товарами на маркетплейсе Яндекс.Маркета и вашими

Ассортимент маркетплейса Маркета может отличаться от вашего. Поэтому каждому товару, который вы размещаете, должен соответствовать товар на маркетплейсе со своим идентификатором на Яндексе (SKU). Это соответствие называется связью.

Методы клиента `RelationshipClient` создают и удаляют связи между товарами на маркетплейсе Яндекс.Маркета и товарами из вашего каталога, а также возвращают рекомендации по ним.

```php
$relationshipClient = new \Yandex\Marketplace\Partner\Clients\RelationshipClient($clientId, $token);
```

## Рекомендованные связи

Метод `getRecommendedRelationship` возвращает рекомендованные связи между товарами на маркетплейсе Яндекс.Маркета и товарами из вашего каталога.

```php
// Получаем итератор по рекомендованным связям
$offersResponse = $relationshipClient->getRecommendedRelationship($campaignId, [
    'offers' => [
        [
            // Название товара, необязательный параметр        
            'name' => 'Apple IPhone SE 128 GB rose gold',
            // Категория товара, необязательный параметр            
            'category' => 'смартфоны',
            // Бренд товара, необязательный параметр            
            'vendor' => 'Apple',
            // Цена товара в рублях, необязательный параметр            
            'price' => 24000,
        ],
]);
$result =  $offersResponse->getResult();
$recommendedRelationships = $result->getOffers();
// Печатаем информацию о рекомендованных ценах
foreach ($recommendedRelationships as $recommendedRelationship) {
    echo "Category: " . $recommendedRelationship->getCategory();
    echo "MarketCategoryName: " . $recommendedRelationship->getMarketCategoryName();
    echo "MarketSkuName: " . $recommendedRelationship->getMarketSkuName();
    echo "Name: " . $recommendedRelationship->getName();
}
```

Метод возвращает [итератор](Основные-понятия#Итераторы).

Подробнее см. в [документации API](https://yandex.ru/dev/market/partner-marketplace-cd/doc/dg/reference/post-campaigns-id-offer-mapping-entries-suggestions-docpage/).

## Создание связей

Метод `updateRelationship` создает связи между товарами на маркетплейсе Яндекс.Маркета и товарами из вашего каталога. В аргументах метода передаются идентификаторы товара (SKU), которые нужно связать: ваш SKU и SKU на Яндексе, а также информация о товаре. 

```php
// Создаем связи
$updateRelationshipResponse = $relationshipClient->updateRelationship($campaignId, [
    'offerMappingEntries' => [
        [
            'offer' => [
                // Ваш SKU, обязательный параметр. 
                // Максимальная длина — 80 символов            
                'shopSku' => 'Vendor002.26194',            
                // Название товара, обязательный параметр        
                'name' => 'Сумка поясная красная (размер S)',
                // Категория товара, обязательный параметр            
                'category' => 'Сувениры',
                // Производитель товара и его юридический адрес, 
                // обязательный параметр            
                'manufacturer' => 'ООО «Яндекс», Россия, Москва, ул. Льва Толстого, 16',
                // Страны производства товара, обязательный параметр            
                'manufacturerCountries' => ['Россия',],
                // URL изображений или страниц с описаниями товара,
                // обязательный параметр
                'urls' => ['https://pokupki.market.yandex.ru/product/100345202774',],                
            ],
            'mapping' => [
                // SKU на Яндексе, обязательный параметр            
                'marketSku' => 100345202774,
            ],
        ],            
    ],
]);
```

Перед публикацией связи проходят модерацию. Если в одной из отправленных связей найдена ошибка, ответ на запрос будет иметь HTTP-код `400 Bad Request`, и ни одна из связей не отправится на модерацию.

Подробнее см. в [документации API](https://yandex.ru/dev/market/partner-marketplace-cd/doc/dg/reference/post-campaigns-id-offer-mapping-entries-updates-docpage/).

## Список связей

Метод `getActiveRelationship` возвращает список связей между товарами на маркетплейсе Яндекс.Маркета и товарами из вашего каталога.

```php
// Получаем объект со связями
$activeRelationshipsObject = $relationshipClient->getActiveRelationship($campaignId, []);
$result = $activeRelationshipsObject->getResult();
// Получаем итератор по связям на текущей странице
$activeRelationships = $result->getOfferMappingEntries();
// Печатаем информацию о связях
foreach ($activeRelationships as $activeRelationship) {
    $offer = $activeRelationship->getOffer();
    echo 'Name: ' . $offer->getName();
    echo 'ShopSku: ' . $offer->getShopSku();
    echo 'Category: ' . $offer->getCategory();
    echo 'Urls: ';
    print_r($offer->getUrls());
    echo 'Barcodes: ';
    print_r($offer->getBarcodes());
    
    // Печатаем информацию о статусе связи с товаром на маркетплейсе Яндекс.Маркета
    $processingState = $offer->getProcessingState();
    echo 'Status: ' . $processingState->getStatus();
    
    // Печатаем информацию о действующей связи с товаром на маркетплейсе Яндекс.Маркета
    $mapping = $activeRelationship->getMapping();
    echo 'MarketSku: ' . $mapping->getMarketSku();
    echo 'CategoryId: ' . $mapping->getCategoryId();
    
    // Печатаем информацию о связи с товаром 
    // на маркетплейсе Яндекс.Маркета, проходящей модерацию
    $awaitingModerationMapping = $activeRelationship->getAwaitingModerationMapping();
    // Печатаем информацию о последней связи с товаром 
    // на маркетплейсе Яндекс.Маркета, отклоненной на модерации
    $rejectedMapping = $activeRelationship->getRejectedMapping();
}
```

Метод возвращает результаты [постранично](Основные-понятия#Постраничный-возврат).

Подробнее см. в [документации API](https://yandex.ru/dev/market/partner-marketplace-cd/doc/dg/reference/get-campaigns-id-offer-mapping-entries-docpage/).

## Обработка заказов

Для обработки заказов в библиотеке реализовано два клиента: для запросов от Яндекс.Маркета к магазину и для запросов от магазина к Яндекс.Маркету.

### Запросы от Яндекс.Маркета к магазину

Клиент `OrderProcessingMarketplaceClient` позволяет магазину обрабатывать запросы информации о заказе от Яндекс.Маркета.

```php
$OrderProcessingMarketplaceClient = new \Yandex\Marketplace\Partner\Clients\OrderProcessingMarketplaceClient();
```

#### Запрос информации о товарах

**Внимание!** Запрос отправляет Яндекс.Маркет.

Метод `getCart` декодирует запрос Яндекс.Маркета об актуальных ценах и наличии товаров из корзины пользователя.

```php
// Получаем список товаров в корзине
$cart = $OrderProcessingMarketplaceClient->getCart($request);

// Печатаем информацию о товарах в корзине
$items = $cart->getItems();
foreach ($items as $item) {
    print_r($item->getCount());
    print_r($item->getOfferId());
}
```

Подробнее см. в [документации API](https://yandex.ru/dev/market/partner-marketplace-cd/doc/dg/reference/post-cart-docpage/).

#### Передача заказа и запрос на принятие заказа

**Внимание!** Запрос отправляет Яндекс.Маркет.

Метод `acceptOrder` декодирует запрос Яндекс.Маркета на подтверждение или отказ от заказа.

```php
// Получаем заказ
$order = $OrderProcessingMarketplaceClient->acceptOrder($request);

// Печатаем информацию о товарах в корзине
$items = $order->getItems();
foreach ($items as $item) {
   print_r($item);
}
```

Подробнее см. в [документации API](https://yandex.ru/dev/market/partner-marketplace-cd/doc/dg/reference/post-order-accept-docpage/).

#### Уведомление о смене статуса заказа

**Внимание!** Запрос отправляет Яндекс.Маркет.

Метод `orderStatus` декодирует запрос Яндекс.Маркета о смене статуса заказа.

```php
// Получаем заказ
$order = $OrderProcessingMarketplaceClient->orderStatus($request);

// Получаем новый статус заказа
$orderStatus = $order->getStatus();
```

Подробнее см. в [документации API](https://yandex.ru/dev/market/partner-marketplace-cd/doc/dg/reference/post-order-status-docpage/).

### Запросы от магазина к Яндекс.Маркету

Клиент `OrderProcessingClient` позволяет магазину получать и изменять информацию о заказах.

```php
$orderProcessingClient = new \Yandex\Marketplace\Partner\Clients\OrderProcessingClient();
```

#### Изменение статуса заказа

Метод `updateOrderStatus` изменяет статус заказа.

```php
// Отменяем заказ
$updateOrderStatusResponse = $orderProcessingClient->updateOrderStatus($campaignId,
    // Идентификатор заказа, обязательный параметр
    $orderId, 
    // Информация о заказе, обязательный параметр   
    ["order" =>
        [
            // Новый статус заказа, обязательный параметр  
            "status" => "CANCELLED",
            // Причина отмены заказа (для нового статуса CANCELLED),
            // обязательный параметр      
            "substatus" => "SHOP_FAILED"
        ]
]);

// Проверяем, что запрос на отмену заказа принят
if ($updateOrderStatusResponse->getCancelRequested()) {
    echo "Cancel requested";
} else {
    echo "Cancel NOT requested";
}    
```

Подробнее см. в [документации API](https://yandex.ru/dev/market/partner-marketplace-cd/doc/dg/reference/put-campaigns-id-orders-id-status-docpage/).

#### Передача информации о коробках в заказе

Метод `putInfoOrderBoxes` передает Яндекс.Маркету информацию о распределении товаров, входящих в заказ, по коробкам.

```php
// Отправляем информацию о коробках
$putInfoOrderBoxesResponse = $orderProcessingClient->putInfoOrderBoxes($campaignId,
    // Идентификатор заказа, обязательный параметр    
    $orderid,
    // Идентификатор посылки, обязательный параметр    
    $shipmentId,
    // Информация о новых и обновленных коробках в заказе, 
    //обязательный параметр
    ["boxes" => [
        [
            // Идентификатор коробки в информационной системе магазина,
            // обязательный параметр            
            'fulfilmentId' => '8152422-1',
            // Масса брутто коробки в граммах. Обязательный параметр,
            // если создается новая коробка            
            'weight' => 1000,
            // Ширина коробки в сантиметрах. Обязательный параметр,
            // если создается новая коробка            
            'width' => 12,
            // Высота коробки в сантиметрах. Обязательный параметр,
            // если создается новая коробка            
            'height' => 22,
            // Глубина коробки в сантиметрах. Обязательный параметр,
            // если создается новая коробка            
            'depth' => 23,
            // Список товаров в коробке. Если нужно создать новую коробку, 
            // параметр обязателен и должен содержать информацию 
            // хотя бы об одном товаре             
            'items' => [
                [
                    // Идентификатор товара в рамках заказа,
                    // обязательный параметр                    
                    'id' => 13456974,
                    // Количество единиц товара в коробке,
                    // обязательный параметр                    
                    'count' => 1,
                ]
            ]
        ]
    ],
]);
$boxes = $putInfoOrderBoxesResponse->getBoxes();
// Печатаем информацию о коробках
foreach ($boxes as $box) {
    echo "Id: " . $box->getId();
    echo "Weight: " . $box->getWeight();
    echo "Depth: " . $box->getDepth();
    // Печатаем список товаров в коробке
    $items = $box->getItems();
    foreach ($items as $item) {
        echo "Id: " . $item->getId();
        echo "Count: " . $item->getCount();
    }
}
```

#### Информация о заказах

Метод `getOrders` возвращает информацию о заказах.

```php
// Получаем информацию о запрашиваемых заказах
$ordersObject = $orderProcessingClient->getOrders($campaignId);
// Получаем итератор по заказам

```

#### Информация о заказе

Метод `getOrder` возвращает информацию о заказе.

```php
// Получаем информацию о запрашиваемом заказе
$ordersObject = $orderProcessingClient->getOrder($campaignId);

```

#### Справочник служб доставки

Метод `getDeliveryService` возвращает справочник служб доставки.

```php
// Получаем список служб доставки
$ordersObject = $orderProcessingClient->getDeliveryService($campaignId);
// Получаем итератор по службам
```

## Остатки товаров

Клиент `StocksClient` позволяет магазину работать с запросами информации об остатках товаров, которые присылает Яндекс.Маркет.

```php
$stocksClient = new \Yandex\Marketplace\Partner\Clients\StocksClient($clientId, $token);
```

### Запрос информации об остатках

**Внимание!** Запрос отправляет Яндекс.Маркет.

Метод `getStocks` декодирует запрос актуальной информации об остатках товаров, отправленный Яндекс.Маркетом.

```php
// Декодируем запрос информации об остатках
$stocks = $stocksClient->getStocks($request);
// Печатаем список ваших SKU товаров
print_r($stocks->getSkus());
// Печатаем идентификатор склада
print_r($stocks->getWarehouseId());
```

Подробнее см. в [документации API](https://yandex.ru/dev/market/partner-marketplace-cd/doc/dg/reference/post-stocks-docpage/).