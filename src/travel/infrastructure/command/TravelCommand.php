<?php

namespace Console\travel\infrastructure\command;

use Console\travel\application\CalculateTravel;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TravelCommand extends Command
{
    /** @var CalculateTravel */
    private $useCase;

    public function __construct(CalculateTravel $useCase)
    {
        parent::__construct(null);

        $this->useCase = $useCase;
    }

    protected function configure()
    {
        $this->setName('travel')
            ->setDescription('Calculate the shortest travel between the cities hosted in cities.txt');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln(implode("\n", $this->useCase->execute("cities.txt")));
        return 0;
    }
}