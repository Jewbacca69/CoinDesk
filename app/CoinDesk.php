<?php

namespace CoinDesk;

class CoinDesk
{
    private array $cryptoData;

    public function __construct(CoinDeskAPI $cryptoData)
    {
        $this->cryptoData = $cryptoData->fetchData();
    }

    public function getUSDPrice(): string
    {
        return $this->cryptoData['bpi']['USD']['rate'];
    }

    public function getGBPPrice(): string
    {
        return $this->cryptoData['bpi']['GBP']['rate'];
    }

    public function getEURPrice(): string
    {
        return $this->cryptoData['bpi']['EUR']['rate'];
    }
}