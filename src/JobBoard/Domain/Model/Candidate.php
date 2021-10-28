<?php
declare(strict_types=1);

namespace App\JobBoard\Domain\Model;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;

/**
 * Class Candidate
 * @package App\Domain
 *
 */
#[ORM\Embeddable]
class Candidate
{
    #[ORM\Embedded(class: "Name")]
    private Name $name;

    #[ORM\Column(type: "string")]
    private string $phoneNumber;

    #[ORM\Column(type: "string")]
    private string $email;

    /**
     * Candidate constructor.
     * @param Name $name
     * @param string $phoneNumber
     * @param string $email
     */
    public function __construct(Name $name, string $phoneNumber, string $email)
    {
        $this->name = $name;
        $this->phoneNumber = $phoneNumber;
        $this->email = $email;
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
