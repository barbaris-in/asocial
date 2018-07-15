<?php

namespace App\DataFixtures;

use App\Entity\Episode;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class EpisodeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $generator = \Faker\Factory::create();
        $generator->seed(1);
        $populator = new \Faker\ORM\Doctrine\Populator($generator, $manager);
        $populator->addEntity(Episode::class, 5);
        $populator->execute();
    }
}
