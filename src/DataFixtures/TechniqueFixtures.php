<?php

namespace App\DataFixtures;

use App\Entity\Technique;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TechniqueFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        //je crée une instance de technique
        $technique1 = new Technique();
        //je l'hydrate
        $technique1->setTitre('Aquarelle');
        $technique1->setSousTitre('Technique de transparence');
        $technique1->setImage('technique1.jpg');
        $technique1->setDescription('lorem ipsum');
        $manager->persist($technique1);
        $this->addReference('technique1', $technique1);

        $technique2 = new Technique();
        $technique2->setTitre('Acrylique');
        $technique2->setSousTitre('Polyvalence et vivacité');
        $technique2->setImage('technique2.jpg');
        $technique2->setDescription('lorem ipsum');
        $manager->persist($technique2);
        $this->addReference('technique2', $technique2);

        $technique3 = new Technique();
        $technique3->setTitre('Encre');
        $technique3->setSousTitre('Précision et expressivité');
        $technique3->setImage('technique3.jpg');
        $technique3->setDescription('lorem ipsum');
        $manager->persist($technique3);
        $this->addReference('technique3', $technique3);

        $technique4 = new Technique();
        $technique4->setTitre('Pastel');
        $technique4->setSousTitre('Couleurs douces et lumineuses');
        $technique4->setImage('technique4.jpg');
        $technique4->setDescription('lorem ipsum');
        $manager->persist($technique4);
        $this->addReference('technique4', $technique4);

        $technique5 = new Technique();
        $technique5->setTitre('Crayon');
        $technique5->setSousTitre('Formes, ombres et lumières');
        $technique5->setImage('technique5.jpg');
        $technique5->setDescription('lorem ipsum');
        $manager->persist($technique5);
        $this->addReference('technique5', $technique5);

        $technique6 = new Technique();
        $technique6->setTitre('Sanguine');
        $technique6->setSousTitre('Chaleur et douceur');
        $technique6->setImage('technique6.jpg');
        $technique6->setDescription('lorem ipsum');
        $manager->persist($technique6);
        $this->addReference('technique6', $technique6);

        $manager->flush();
    }
}
