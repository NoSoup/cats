<?php
declare(strict_types=1);

namespace App\JobBoard\Domain\Model\Listing;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;
use App\JobBoard\Domain\Model\ApplicationType;

/**
 * Class Listing
 * @package App\JobBoard\Domain\Model
 */
#[ORM\Entity]
class Listing
{
    #[ORM\Id]
    #[ORM\Column(type: 'uuid')]
    private Uuid $id;

    #[ORM\Column(type: "string")]
    private string $title;

    #[ORM\Column(type: "text")]
    private string $description;

    #[ORM\ManyToOne(targetEntity: 'App\JobBoard\Domain\Model\ApplicationType')]
    private ApplicationType $applicationType;

    #[ORM\Column(type: 'integer')]
    private int $status;

    #[ORM\Column(type: 'integer')]
    private int $numberOfPositions;

    #[ORM\Column(type: 'boolean')]
    private bool $displayNumberOfPositions;

    #[ORM\Column(type: 'datetime_immutable')]
    private \DateTimeImmutable $createdAt;

    #[ORM\Column(type: 'datetime_immutable', nullable: true)]
    private ?\DateTimeImmutable $updatedAt;

    #[ORM\ManyToOne(targetEntity: 'Category')]
    private Category $category;

    /**
     * Listing constructor.
     * @param string $title
     * @param string $description
     * @param ApplicationType $applicationType
     * @param int $status
     * @param int $numberOfPositions
     * @param bool $displayNumberOfPositions
     * @param \DateTimeImmutable $createdAt
     * @param null|\DateTimeImmutable $updatedAt
     * @param Category $category
     */
    public function __construct(
        string              $title,
        string              $description,
        ApplicationType     $applicationType,
        int                 $status,
        int                 $numberOfPositions,
        bool                $displayNumberOfPositions,
        \DateTimeImmutable  $createdAt,
        ?\DateTimeImmutable $updatedAt,
        Category            $category,
    ) {
        $this->id = Uuid::v4();
        $this->title = $title;
        $this->description = $description;
        $this->applicationType = $applicationType;
        $this->status = $status;
        $this->numberOfPositions = $numberOfPositions;
        $this->displayNumberOfPositions = $displayNumberOfPositions;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->category = $category;
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

    public function changeTitle(string $title): void
    {
        if (strlen($title) === 0) {
            throw new \InvalidArgumentException('The title of the listing cannot be empty');
        }

        if(strlen($title) > 150) {
            throw new \InvalidArgumentException('The title cannot exceed the maximum number of characters: 150');
        }

        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Change the description of the listing.
     *
     * @param string $description
     */
    public function changeDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * Get the type of the application for the given listing.
     *
     * @return ApplicationType
     */
    public function getApplicationType(): ApplicationType
    {
        return $this->applicationType;
    }

    /**
     * Change the application type of the listing.
     *
     * @param ApplicationType $type
     */
    public function changeApplicationType(ApplicationType $type): void
    {
        $this->applicationType = $type;
    }

    /**
     * Check if the listing is active or not based on its status.
     *
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->status === Status::OPEN;
    }

    /**
     * @todo: This will be refactored with Enum after PHP 8.1
     *
     * @param int $statusCode
     */
    public function changeStatus(int $statusCode): void
    {
        if (!in_array($statusCode, [Status::OPEN, Status::CLOSED], true)) {
            throw new \InvalidArgumentException('Invalid listing status given');
        }
    }

    /**
     * @return int
     */
    public function getNumberOfPositions(): int
    {
        return $this->numberOfPositions;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * Change the number of positions.
     *
     * @param int $numberOfPositions
     */
    public function changeNumberOfPositions(int $numberOfPositions): void
    {
        if ($numberOfPositions < 0) {
            throw new \InvalidArgumentException('The number of positions cannot be a negative number');
        }

        $this->numberOfPositions = $numberOfPositions;
    }

    /**
     * Whether or not we should display the number of positions on the front-end.
     *
     * @return bool
     */
    public function isDisplayNumberOfPositions(): bool
    {
        return $this->displayNumberOfPositions;
    }

    /**
     * Change whether to display or not the number of positions in the front-end.
     *
     * @param bool $displayNumberOfPositions
     */
    public function changeIfToDisplayNumberOfPositions(bool $displayNumberOfPositions): void
    {
        $this->displayNumberOfPositions = $displayNumberOfPositions;
    }

    /**
     * Get when the listing was created.
     *
     * @return \DateTimeImmutable
     */
    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }

    /**
     * Get when the listing was last updated.
     *
     * @return null|\DateTimeImmutable
     */
    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    /**
     * Get the category of the listing.
     *
     * @return Category
     */
    public function getCategory(): Category
    {
        return $this->category;
    }

    /**
     * Change the category listing.
     *
     * @param Category $category
     */
    public function changeCategory(Category $category): void
    {
        $this->category = $category;
    }
}
