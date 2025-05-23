<?php

namespace App\Factory;

use App\Entity\Filiere;
use App\Entity\Module;
use App\Entity\Semestre;
use App\Repository\ModuleRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<Module>
 *
 * @method static Module|Proxy createOne(array $attributes = [])
 * @method static Module[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Module[]|Proxy[] createSequence(array|callable $sequence)
 * @method static Module|Proxy find(object|array|mixed $criteria)
 * @method static Module|Proxy findOrCreate(array $attributes)
 * @method static Module|Proxy first(string $sortedField = 'id')
 * @method static Module|Proxy last(string $sortedField = 'id')
 * @method static Module|Proxy random(array $attributes = [])
 * @method static Module|Proxy randomOrCreate(array $attributes = [])
 * @method static Module[]|Proxy[] all()
 * @method static Module[]|Proxy[] findBy(array $attributes)
 * @method static Module[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Module[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static ModuleRepository|RepositoryProxy repository()
 * @method Module|Proxy create(array|callable $attributes = [])
 */
final class ModuleFactory extends ModelFactory
{
    public function __construct()
    {
        parent::__construct();

        // TODO inject services if required (https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services)
    }

    protected function getDefaults(): array
    {
        return [
            // TODO add your default values here (https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories)
            'nom' => self::faker()->realText(30),
            'filiere' => FiliereFactory:: randomOrCreate(),
            'enseignant' => EnseignantFactory::randomOrCreate(),
            'semestre' => SemestreFactory :: randomOrCreate(),
        ];
    }

    protected function initialize(): self
    {
        // see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
        return $this
            // ->afterInstantiate(function(Module $module): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Module::class;
    }
}
