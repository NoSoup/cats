<?php
declare(strict_types=1);

namespace App\JobBoard\Infrastructure\Http\FrontEnd\Listing\DataProvider;

use ApiPlatform\Core\DataTransformer\DataTransformerInterface;
use App\JobBoard\Domain\Model\Listing\Listing as DomainListing;
use App\JobBoard\Infrastructure\Http\FrontEnd\Listing\Resource\Listing;

final class ListingDataTransformer implements DataTransformerInterface
{

    public function supportsTransformation($data, string $to, array $context = []): bool
    {
        return $data instanceof DomainListing &&
            $to === Listing::class &&
            ($context['operation_type'] === 'item' || $context['operation_type'] === 'collection');
    }

    public function transform($object, string $to, array $context = []): Listing
    {
        /** @var DomainListing $object */

        return Listing::fromDomainListing($object);
    }
}
