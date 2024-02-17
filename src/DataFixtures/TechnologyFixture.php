<?php

namespace App\DataFixtures;

use App\Factory\TechnologyFactory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class TechnologyFixture extends Fixture
{
    private const TECHNOLOGIES = [
        'Python',
        'PHP',
        'Symfony',
        'JS',
        'React',
        'NextJs',
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::TECHNOLOGIES as $technology) {
            TechnologyFactory::createOne([
                'label' => $technology,
            ]);
        }
    }
}
