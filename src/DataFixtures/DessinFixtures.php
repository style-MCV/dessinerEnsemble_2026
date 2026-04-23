<?php

namespace App\DataFixtures;

use App\Entity\Dessin;
use App\Entity\Technique;
use App\Entity\Utilisateur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class DessinFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $dessin1 = new Dessin();
        $dessin1->setTitre('Dessin 1');
        $dessin1->setImage('dessin1.jpg');
        $dessin1->setCommentaire('lorem ipsum');
        $dessin1->setDateCreation(new \DateTimeImmutable());
        $dessin1->setEstValide(true);
        $dessin1->setAuteur($this->getReference('utilisateur2', Utilisateur::class));
        $dessin1->setTechnique($this->getReference('technique1', Technique::class));

        $manager->persist($dessin1);

        $manager->flush();
    }

    public function getDependencies(): array
    {
        // TODO: Implement getDependencies() method.
        return [TechniqueFixtures::class, UtilisateurFixtures::class];
    }
}
