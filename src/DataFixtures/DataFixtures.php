<?php

namespace App\DataFixtures;

use App\Entity\Episode;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class DataFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $generator = \Faker\Factory::create();
        $generator->seed(1);
        $populator = new \Faker\ORM\Doctrine\Populator($generator, $manager);
        $populator->addEntity(User::class, 5);
        $populator->addEntity(Episode::class, 15);
        $populator->execute();
    }
}
