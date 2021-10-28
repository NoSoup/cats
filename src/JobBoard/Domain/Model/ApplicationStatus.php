<?php
declare(strict_types=1);

namespace App\JobBoard\Domain\Model;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;


/**
 * Class ApplicationStatus
 *
 * @package App\Domain
 * @ORM\Entity
 * @ORM\Table(name="application_status")
 */
#[ORM\Entity]
class ApplicationStatus
{
    #[ORM\Id]
    #[ORM\Column(type: "uuid")]
    private Uuid $id;

    #[ORM\Column(type: "string")]
    private string $name;

    /**
     * ApplicationStatus constructor.
     * @param Uuid $id
     * @param string $name
     */
    public function __construct(Uuid $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    /**
     *
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
