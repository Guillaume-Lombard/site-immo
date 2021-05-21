<?php

namespace App\DataFixtures;

use App\Entity\Property;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $generator = Faker\Factory::create('fr-FR');

       for ($i=0; $i<30; $i++){
           $property = new Property();
           $property -> setArea($generator ->randomFloat(2,9, 1000));
           $property -> setRoom($generator ->numberBetween(1,15));
           $property -> setType("maison");
           $property -> setAddress($generator ->address);
           $property -> setSwimmingPool($generator ->boolean(25));
           $property -> setOutside($generator ->randomFloat(2,0,10000));
           $property -> setGarage($generator ->boolean(60));
           $property -> setBuyingOrLeasing("buying");
           $property -> setPrice($generator ->randomFloat(1, 100000));
           $property -> setDatePublication($generator->dateTimeBetween('-2 years', 'now'));

           $manager->persist($property);
       }

        $manager->flush();
    }
}
