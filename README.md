# PHP-библиотека партнерского API Яндекс.Маркета для моделей FBY и FBS

Магазинам, работающим с Яндекс.Маркетом по моделям FBY (*Fulfillment by Yandex*, продажи с фулфилментом Яндекса) и FBS (*Fulfillment by Seller*, продажи с фулфилментом магазина), Маркет предоставляет партнерский API.

* Для модели [FBY](https://yandex.ru/dev/market/partner-marketplace/doc/dg/concepts/about.html) API позволяет управлять ассортиментом и ценами на товары.
* Для модели [FBS](https://yandex.ru/dev/market/partner-marketplace-cd/doc/dg/concepts/about.html) API позволяет управлять ассортиментом, ценами на товары и заказами, а также передавать Маркету информацию об остатках на складе.

Библиотека написана на языке PHP и содержит методы для работы с партнерским API. 

* [Требования](#Требования)
* [Лицензия и условия использования](#Лицензия-и-условия-использования)
* [Установка](#Установка)
* [Пример использования](#Пример-использования)

## Требования

* PHP 5.6 или выше.
* Зарегистрированный магазин на Маркете. 
* Зарегистрированное приложение с авторизационным токеном. 
  
Подробнее см. раздел [С чего начать](https://github.com/yandex-market/marketplace-php-partner/wiki/С-чего-начать) в Wiki.

## Лицензия и условия использования

Библиотека распространяется по [лицензии MIT](LICENSE.txt).

Использование партнерского API регулируется [пользовательским соглашением](https://yandex.ru/legal/market_api_partner/).

## Установка

Библиотека устанавливается с помощью пакетного менеджера [Composer](https://getcomposer.org).

1. Добавьте библиотеку в файл `composer.json` вашего проекта:

   ```json
   {
       "require": {
           "yandex-market/marketplace-php-partner": "*"
       }
   }
   ```

2. Включите автозагрузчик Composer в код проекта:

   ```php
   require __DIR__ . '/vendor/autoload.php';
   ```   

## Пример использования

Выведем на экран список всех скрытых товаров магазина:

```php
// Указываем авторизационные данные
$clientId = '9876543210fedcbaabcdef0123456789';
$token = '01234567-89ab-cdef-fedc-ba9876543210';

// Создаем экземпляр клиента с методами управления скрытыми товарами
$hiddenOffersClient = new \Yandex\Marketplace\Partner\Clients\HiddenOffersClient($clientId, $token);

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
Подробнее см. [Wiki](https://github.com/yandex-market/marketplace-php-partner/wiki) и документацию партнерского API для моделей работы [FBY](https://yandex.ru/dev/market/partner-marketplace/doc/dg/concepts/about.html) и [FBS](https://yandex.ru/dev/market/partner-marketplace/doc/dg/concepts/about.html).   
