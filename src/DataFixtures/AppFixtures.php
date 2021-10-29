<?php

namespace App\DataFixtures;

use App\Entity\Ville;
use App\Entity\Restaurant;
use App\Entity\Proprietaire;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $faker = Faker\Factory::create('fr_FR');
        for ($i = 0; $i < 15; $i++) {

            $ville = new Ville();
            $ville->setName($faker->city);
            $manager->persist($ville);



            $proprietaire = new Proprietaire();
            $proprietaire->setName($faker->firstName)->setPrenom($faker->lastName)->setDateNaissance($faker->dateTime());
            $manager->persist($proprietaire);
        

       
            $restaurant = new Restaurant();
            $restaurant->setName($faker->company)->setAdresse($faker->address)->setImage($faker->imageUrl(400, 400, "food"))->setVille($ville)->setProprietaire($proprietaire);
            $manager->persist($restaurant);
        }


        $manager->flush();
    }
}
