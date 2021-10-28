<?php
declare(strict_types=1);

namespace App\JobBoard\Domain\Model;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;

/**
 * Class ApplicationType
 * @package App\Domain\Model
 */
#[ORM\Entity]
class ApplicationType
{
    #[ORM\Id]
    #[ORM\Column(type: "uuid", unique: true)]
    private Uuid $id;

    #[ORM\Column(type: "string")]
    private string $name;

    /**
     * ApplicationType constructor.

     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->id = Uuid::v4();
        $this->name = $name;
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
}
