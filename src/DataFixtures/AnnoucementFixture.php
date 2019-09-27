<?php

namespace App\DataFixtures;

use App\Entity\Annoucement;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AnnoucementFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $a = new Annoucement('Annonce title', 100, "Content content content content");
        $manager->persist($a);

        $a = new Annoucement('Annonce title', 100, "Content content content content");
        $manager->persist($a);

        $a = new Annoucement('Annonce title', 100, "Content content content content");
        $manager->persist($a);

        $a = new Annoucement('Annonce title', 100, "Content content content content");
        $manager->persist($a);

        $manager->flush();
    }
}
