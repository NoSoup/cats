<?php
declare(strict_types=1);

namespace App\Domain\Model;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;

/**
 * Class Candidate
 * @package App\Domain
 *
 */
#[ORM\Entity]
class Candidate
{
    #[ORM\Id]
    #[ORM\Column(type: "uuid")]
    private Uuid $id;

    #[ORM\Embedded(class: "App\Domain\Model\Name")]
    private Name $name;

    #[ORM\Column(type: "string")]
    private string $phoneNumber;

    #[ORM\Column(type: "string")]
    private string $email;

    /**
     * Candidate constructor.
     * @param Uuid $id
     * @param Name $name
     * @param string $phoneNumber
     * @param string $email
     */
    public function __construct(Uuid $id, Name $name, string $phoneNumber, string $email)
    {
        $this->id = $id;
        $this->name = $name;
        $this->phoneNumber = $phoneNumber;
        $this->email = $email;
    }

    /**
     * @return Uuid
     */
    public function getId(): Uuid
    {
        return $this->id;
    }

    /**
     * @return Name
     */
    public function getName(): Name
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }
}
