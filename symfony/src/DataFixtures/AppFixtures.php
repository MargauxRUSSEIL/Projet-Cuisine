<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;

class AppFixtures extends Fixture
{
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setFirstname('Admin');
        $user->setLastname('Administrateur');
        $user->setUsername('admin');
        $user->setBirthdate(new \DateTime('1999-09-19'));
        $user->setGender('Autre');
        $user->setRoles(['ROLE_ADMIN']);
        $user->setEmail('recettes.to.cook@gmail.com');

        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            'CookRecette9319152509'
        ));

        $manager->persist($user);
        $manager->flush();
    }
}
