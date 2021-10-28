<?php
declare(strict_types=1);

namespace App\JobBoard\Domain\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Name
 * @package App\Domain
 *
 */
#[ORM\Embeddable]
class Name
{
    #[ORM\Column(type: "string")]
    private string $firstName;

    #[ORM\Column(type: "string")]
    private string $middleName;

    #[ORM\Column(type: "string")]
    private string $lastName;

    /**
     * Name constructor.
     * @param string $firstName
     * @param string $middleName
     * @param string $lastName
     */
    private function __construct(string $firstName, string $middleName, string $lastName)
    {
        $this->firstName = $firstName;
        $this->middleName = $middleName;
        $this->lastName = $lastName;
    }

    /**
     * Create a name object from primitive values.
     *
     * @param string $firstName
     * @param string $middleName
     * @param string $lastName
     * @return static
     */
    public static function fromString(string $firstName, string $middleName, string $lastName): self
    {
        return new self($firstName, $middleName, $lastName);
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getMiddleName(): string
    {
        return $this->middleName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }
}
