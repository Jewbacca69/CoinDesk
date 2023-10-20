<?php

namespace CoinDesk;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class Application extends Command
{
    private CoinDesk $coinDesk;

    public function __construct(CoinDesk $coinDesk)
    {
        parent::__construct();

        $this->coinDesk = $coinDesk;
    }

    protected function configure(): void
    {
        $this->setName('crypto:price')->setDescription('Get cryptocurrency prices');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $io->success('Up-to-date Cryptocurrency prices');
        $io->table(['Currency', 'Price'], [
            ['USD', $this->coinDesk->getUSDPrice()],
            ['GBP', $this->coinDesk->getGBPPrice()],
            ['EUR', $this->coinDesk->getEURPrice()],
        ]);

        return Command::SUCCESS;
    }
}