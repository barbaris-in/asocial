<?php

namespace App\Resolver;

use App\Entity\Episode;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\ResolverInterface;

class EpisodeResolver implements ResolverInterface, AliasedInterface
{
    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * EpisodeResolver constructor.
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function get($id)
    {
        return $this->entityManager->getRepository(Episode::class)->find($id);
    }

    /**
     * Returns methods aliases.
     *
     * For instance:
     * array('myMethod' => 'myAlias')
     *
     * @return array
     */
    public static function getAliases()
    {
        return ['get' => 'episode'];
    }
}