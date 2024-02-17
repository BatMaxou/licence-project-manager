<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Factory\CategoryFactory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class CategoryFixture extends Fixture
{
    private const CATEGORIES = [
        'Projet personnel',
        'E-Commerce',
        'Application mobile',
        'Veille technique',
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::CATEGORIES as $category) {
            CategoryFactory::createOne([
                'label' => $category,
            ]);
        }
    }
}
