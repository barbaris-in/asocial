<?php

namespace App\Command;

use App\Entity\Episode;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class AppGenerateEpisodesCommand extends Command
{
    protected static $defaultName = 'app:generate-episodes';

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct();
        $this->entityManager = $entityManager;
    }

    protected function configure()
    {
        $this
            ->setDescription('This command generate 15 episodes')
            ->addArgument('count', InputArgument::OPTIONAL, 'Number of episodes to be created');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        $count = $input->getArgument('count');
        if ($count) {
            $count = (int) $count;
            if (!$count) {
                $io->error('Count argument should me a valid integer number. Pass --help to see your options.');
            }
        }

        if (!$count) {
            $count = 15;
        }

        $generator = \Faker\Factory::create();
        $populator = new \Faker\ORM\Doctrine\Populator($generator, $this->entityManager);
        $populator->addEntity(Episode::class, $count);
        $populator->execute();

        $io->success(sprintf('%s episodes have been created!', $count));
    }
}
