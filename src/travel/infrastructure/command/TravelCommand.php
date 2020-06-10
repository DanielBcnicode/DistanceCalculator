<?php

declare(strict_types=1);

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
        try {
            $result = $this->useCase->execute("cities.txt");
            foreach ($result as $item) {
                $output->writeln($item);
            }
        } catch (\Exception $e) {
            $output->setDecorated(true);
            $output->writeln($e->getMessage());
            return 1;
        }

        return 0;
    }
}
