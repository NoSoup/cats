<?php

namespace App\JobBoard\DataFixtures;

use App\JobBoard\Domain\Model\ApplicationType;
use App\JobBoard\Domain\Model\Listing\Listing;
use App\JobBoard\Domain\Model\Listing\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $listingCategory = new Category('DEFAULT_CAT');
        $applicationType = new ApplicationType('foo');
        $listing = new Listing(
            'foo',
            'description',
            $applicationType,
            1,
            4,
            true,
            new \DateTimeImmutable(),
            null,
            $listingCategory,
        );

        $manager->persist($listingCategory);
        $manager->persist($applicationType);
        $manager->persist($listing);
        $manager->flush();

        echo $applicationType->getId()->toRfc4122(); echo PHP_EOL;
    }
}
