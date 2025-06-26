<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Article;
use App\Entity\Category;
use \DateTime;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        //Utilisation de  Faker pour générer des données aléatoires
        $faker = \Faker\Factory::create();

        // Création de quelques catégories
        for ($i = 0; $i < 8; $i++) {
            $category = new Category();
            $category->setName($faker->word());
            $manager->persist($category);
            $categories[] = $category;
        }

        // Création des articles
        for ($i = 0; $i < 50; $i++) {
            $article = new Article();
            $article->setTitle($faker->realText(50))
                ->setCreatedAt($faker->dateTimeBetween('-2 years'))
                ->setContent($faker->realTextBetween(250, 500))
                ->setVisible($faker->boolean(80)); // 80% de chance d'être visible
 
        // Associer une catégorie aléatoire à l'article
        $randomCategory = $categories[array_rand($categories)];
        $article->setCategory($randomCategory);

        $manager->persist($article);
        }

        $manager->flush();
    }
}

