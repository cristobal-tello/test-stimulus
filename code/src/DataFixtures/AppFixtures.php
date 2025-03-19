<?php

namespace App\DataFixtures;

use Faker\Generator;
use Nelmio\Alice\Loader\NativeLoader;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use App\DataFixtures\Provider\SpanishDataProvider;


class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {


        // This way it works, but I lost the localization 
        // then I need to use es_ES in each function on .yml file
        // $loader = new NativeLoader();
        // $f = $loader->getFakerGenerator();
        // $f->addProvider(new SpanishDataProvider());

        // This way it works and at the same time I customize locatization
        // Then I don't need to type es_ES in each function on .yml file
        $loader = new CustomNativeLoader();
        $objectSet = $loader->loadFile(__DIR__ . '/fixtures.yml');

        foreach ($objectSet->getObjects() as $object) {
            $manager->persist($object);
        }

        $manager->flush();
    }
}
