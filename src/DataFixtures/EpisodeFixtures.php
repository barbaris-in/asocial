<?php

namespace App\DataFixtures;

use App\Entity\Episode;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class EpisodeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $episode = new Episode();
        $episode
            ->setTitle('Latin episode')
            ->setBody('Vae, brevis historia! Nunquam dignus domina. Luras sunt liberis de varius adiurator.');
        $manager->persist($episode);

        $episode = new Episode();
        $episode
            ->setTitle('Esoteric episode')
            ->setBody('Reincarnation is not soft in earth, the monastery, or space, but everywhere. Samadhi, peace and a unveiled heavens of enlightenment.');
        $manager->persist($episode);

        $episode = new Episode();
        $episode
            ->setTitle('Culinary episode')
            ->setBody('Enamel eleven pounds of bagel in one quarter cup of vinegar. ');
        $manager->persist($episode);

        $episode = new Episode();
        $episode
            ->setTitle('Pirate episode')
            ->setBody('Ahoy, oh. Aww, ye heavy-hearted wave- set sails for strength! Aww, yer not drinking me without a fortune!');
        $manager->persist($episode);

        $episode = new Episode();
        $episode
            ->setTitle('Science episode')
            ->setBody('Girls yell with history at the devastated ready room! The sensor is finally chemical.');
        $manager->persist($episode);

        $manager->flush();
    }
}
