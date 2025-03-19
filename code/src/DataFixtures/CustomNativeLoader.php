<?php

namespace App\DataFixtures;

use Nelmio\Alice\Loader\NativeLoader;
use Faker\Generator as FakerGenerator;
use Faker\Factory as FakerGeneratorFactory;
use Nelmio\Alice\Faker\Provider\AliceProvider;
use App\DataFixtures\Provider\SpanishDataProvider;

class CustomNativeLoader extends NativeLoader
{
    protected function createFakerGenerator(): FakerGenerator
    {
        $generator = FakerGeneratorFactory::create('es_ES');
        $generator->addProvider(new AliceProvider());
        $generator->addProvider(new SpanishDataProvider());
        $generator->seed($this->getSeed());
        return $generator;
    }
}
