<?php
declare(strict_types=1);

namespace App\JobBoard\Domain\Model\Listing;

use Doctrine\ORM\Mapping as ORM;
use \Symfony\Component\Uid\Uuid;

/**
 * Class ListingCategory
 * @package App\Domain\Model
 *
 * @ORM\Entity
 */
#[ORM\Entity]
class Category
{
    #[ORM\Id]
    #[ORM\Column(type: "uuid")]
    private Uuid $id;

    #[ORM\Column(type: "string")]
    private string $name;

    #[ORM\ManyToOne(targetEntity: "Category")]
    #[ORM\JoinColumn(name: "parent_category", referencedColumnName: "id", nullable: true)]
    private ?Category $parentCategory;

    /**
     * @param string $name
     * @param Category|null $parentCategory
     */
    public function __construct(string $name, ?Category $parentCategory = null)
    {
        $this->id = Uuid::v4();
        $this->name = $name;
        $this->parentCategory = $parentCategory;
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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return Category|null
     */
    public function getParentCategory(): ?Category
    {
        return $this->parentCategory;
    }
}
