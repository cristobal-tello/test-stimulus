<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\DataFixtures\Provider\SpanishDataProvider;
use Faker\Factory as FakerGeneratorFactory;
use Faker\Generator as FakerGenerator;
use Nelmio\Alice\Faker\Provider\AliceProvider;
use Nelmio\Alice\Loader\NativeLoader;

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
