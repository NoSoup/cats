<?php
declare(strict_types=1);

namespace App\JobBoard\Infrastructure\Http\FrontEnd\Listing\Resource;

use App\JobBoard\Domain\Model\ApplicationType;
use App\JobBoard\Domain\Model\Listing\Category;
use JetBrains\PhpStorm\Pure;
use Symfony\Component\Uid\Uuid;
use App\JobBoard\Domain\Model\Listing\Listing as DomainListing;

class Listing
{
    private function __construct(
        private Uuid $id,
        private string $title,
        private string $description,
        private ApplicationType $applicationType,
        private int $status,
        private ?int $numberOfPositions,
        private \DateTimeImmutable $createdAt,
        private ?\DateTimeImmutable $updatedAt,
        private Category $category
    )
    {
    }

    /**
     * Get an instance based on the domain listing.
     *
     * @param DomainListing $domainListing
     * @return static
     */
    #[Pure] public static function fromDomainListing(DomainListing $domainListing): self
    {
        return new self(
            $domainListing->getId(),
            $domainListing->getTitle(),
            $domainListing->getDescription(),
            $domainListing->getApplicationType(),
            $domainListing->getStatus(),
            $domainListing->isDisplayNumberOfPositions() ? $domainListing->getNumberOfPositions() : null,
            $domainListing->getCreatedAt(),
            $domainListing->getUpdatedAt(),
            $domainListing->getCategory(),
        );
    }

    /**
     * @return Uuid
     */
    public function getId(): Uuid
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return ApplicationType
     */
    public function getApplicationType(): ApplicationType
    {
        return $this->applicationType;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @return ?int
     */
    public function getNumberOfPositions(): ?int
    {
        return $this->numberOfPositions;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    /**
     * @return Category
     */
    public function getCategory(): Category
    {
        return $this->category;
    }
}
