<?php

namespace App\DataFixtures;

use App\Entity\Utilisateur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\PasswordHasherInterface;

class UtilisateurFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $utilisateur1 = new Utilisateur();
        $utilisateur1->setEmail('pierre@gmail.com');
        $utilisateur1->setPseudo('pierre');
        //pierregastonvogt
        $utilisateur1->setPassword('$2y$13$7wTj/e9EBcKP7W4ud4pRb.s0F774EugVqbNM/mRG4h2gx.emrcYu6');

        $utilisateur1->setRoles(['ROLE_ADMIN']);
        $this->addReference('utilisateur1', $utilisateur1);

        $manager->persist($utilisateur1);

        $utilisateur2 = new Utilisateur();
        $utilisateur2->setEmail('benoit@gmail.com');
        $utilisateur2->setPseudo('benoit');
        //benoitjacquesvogt
        $utilisateur2->setPassword('$2y$13$Zu3EKRoKkt2RejBOgoyYV.qRFMNrNiKwzVLEd1AUtt8kiHi..vMry');
        $utilisateur2->setRoles(['ROLE_USER']);
        $this->addReference('utilisateur2', $utilisateur2);
        $manager->persist($utilisateur2);

        $manager->flush();
    }
}
