<?php

namespace App\DataFixtures;

use App\Factory\ProjectFactory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ProjectFixture extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        ProjectFactory::createMany(5);
    }

    public function getDependencies(): array
    {
        return [
            CategoryFixture::class,
            TechnologyFixture::class
        ];
    }
}
