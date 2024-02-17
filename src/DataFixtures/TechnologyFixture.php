<?php

namespace App\DataFixtures;

use App\Factory\TechnologyFactory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class TechnologyFixture extends Fixture
{
    private const TECHNOLOGIES = [
        'Python' => '#3843b9',
        'PHP' => '#7a86b8',
        'Symfony' => '#111111',
        'JS' => '#efd81d',
        'React' => '#61dafb',
        'NextJs' => '#ffffff',
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::TECHNOLOGIES as $technology => $tagColor) {
            TechnologyFactory::createOne([
                'label' => $technology,
                'tagColor' => $tagColor,
            ]);
        }
    }
}
