<?php

namespace App\Factory;

use App\Entity\Technology;
use App\Repository\TechnologyRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Technology>
 *
 * @method        Technology|Proxy                     create(array|callable $attributes = [])
 * @method static Technology|Proxy                     createOne(array $attributes = [])
 * @method static Technology|Proxy                     find(object|array|mixed $criteria)
 * @method static Technology|Proxy                     findOrCreate(array $attributes)
 * @method static Technology|Proxy                     first(string $sortedField = 'id')
 * @method static Technology|Proxy                     last(string $sortedField = 'id')
 * @method static Technology|Proxy                     random(array $attributes = [])
 * @method static Technology|Proxy                     randomOrCreate(array $attributes = [])
 * @method static TechnologyRepository|RepositoryProxy repository()
 * @method static Technology[]|Proxy[]                 all()
 * @method static Technology[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static Technology[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static Technology[]|Proxy[]                 findBy(array $attributes)
 * @method static Technology[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static Technology[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class TechnologyFactory extends ModelFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function getDefaults(): array
    {
        return [
            'label' => self::faker()->word(),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Technology $technology): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Technology::class;
    }
}
