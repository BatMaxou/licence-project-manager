<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class UserFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $user = new User(
            'admin',
            '$2y$13$eSKiO2tcVECfCeFk/3ZYWehYMy/B52Gvu9Zn/jQ9WpT7pdpZNbOmC',
            ['ROLE_USER', 'ROLE_ADMIN']
        );

        $manager->persist($user);
        $manager->flush();
    }
}
