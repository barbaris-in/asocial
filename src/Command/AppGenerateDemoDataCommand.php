<?php

namespace App\Command;

use App\Entity\Episode;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class AppGenerateDemoDataCommand extends Command
{
    protected static $defaultName = 'app:generate-data';

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
            ->addArgument('nbUsers', InputArgument::OPTIONAL, 'Number of users to be created. Default value is 10')
            ->addArgument('nbEpisodes', InputArgument::OPTIONAL, 'Number of episodes to be created. Default value is 100');
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        $nbUsers = $input->getArgument('nbUsers');
        if ($nbUsers) {
            $nbUsers = (int) $nbUsers;
            if (!$nbUsers) {
                $io->error('Count argument should me a valid integer number. Pass --help to see your options.');
            }
        }
        if (!$nbUsers) {
            $nbUsers = 10;
        }
        $nbEpisodes = $input->getArgument('nbEpisodes');
        if ($nbEpisodes) {
            $nbEpisodes = (int) $nbEpisodes;
            if (!$nbEpisodes) {
                $io->error('Count argument should me a valid integer number. Pass --help to see your options.');
            }
        }
        if (!$nbEpisodes) {
            $nbEpisodes = 100;
        }

        $generator = \Faker\Factory::create();
        $populator = new \Faker\ORM\Doctrine\Populator($generator, $this->entityManager);
        $populator->addEntity(User::class, $nbUsers);
        $populator->addEntity(Episode::class, $nbEpisodes);
        $populator->execute();

        $io->success(sprintf('%s episodes have been created!', $nbEpisodes));
    }
}
