<?php
declare(strict_types=1);

namespace App\Domain\Model;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;

/**
 * Class Application
 * @package App\Domain
 *
 */
class Application
{
    #[ORM\Id]
    #[ORM\Column(type: "uuid")]
    private Uuid $id;

    #[ORM\ManyToOne(targetEntity: "ApplicationType")]
    private ApplicationType $type;

    #[ORM\ManyToOne(targetEntity: "Candidate")]
    private Candidate $applicant;

    #[ORM\Column(type: "datetime_immutable")]
    private \DateTimeImmutable $created;

    #[ORM\Column(type: "datetime_immutable", nullable: true)]
    private ?\DateTimeImmutable $updated;

    #[ORM\ManyToOne(targetEntity: "Listing")]
    private Listing $listing;

    #[ORM\ManyToOne(targetEntity: "ApplicationStatus")]
    private ApplicationStatus $status;

    /**
     * Application constructor.
     * @param Uuid $id
     * @param Listing $listing
     * @param ApplicationType $type
     * @param Candidate $applicant
     * @param ApplicationStatus $status
     * @param \DateTimeImmutable $created
     * @param \DateTimeImmutable|null $updated
     */
    private function __construct(Uuid $id, Listing $listing, ApplicationType $type, Candidate $applicant, ApplicationStatus $status, \DateTimeImmutable $created, ?\DateTimeImmutable $updated)
    {
        $this->id = $id;
        $this->type = $type;
        $this->applicant = $applicant;

        $this->created = $created;
        $this->updated = $updated;
        $this->listing = $listing;
        $this->status = $status;
    }

    /**
     * @return Uuid
     */
    public function getId(): Uuid
    {
        return $this->id;
    }

    /**
     * @return ApplicationType
     */
    public function getType(): ApplicationType
    {
        return $this->type;
    }

    /**
     * @return Candidate
     */
    public function getApplicant(): Candidate
    {
        return $this->applicant;
    }

    /**
     * @return Listing
     */
    public function getListing(): Listing
    {
        return $this->listing;
    }

    /**
     * @return ApplicationStatus
     */
    public function getStatus(): ApplicationStatus
    {
        return $this->status;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getCreated(): \DateTimeImmutable
    {
        return $this->created;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getUpdated(): ?\DateTimeImmutable
    {
        return $this->updated;
    }
}
