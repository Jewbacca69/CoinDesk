<?php

namespace CoinDesk;

use Symfony\Component\PropertyAccess\PropertyAccess;

class CoinDesk
{
    private object $cryptoData;

    public function __construct()
    {
        $this->cryptoData = (new CoinDeskAPI())->fetchData();
    }

    public function getPrice(string $currency): string
    {
        $accessor = PropertyAccess::createPropertyAccessor();
        return $accessor->getValue($this->cryptoData, "bpi.$currency.rate");
    }
}
