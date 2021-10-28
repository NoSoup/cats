<?php
declare(strict_types=1);

namespace App\JobBoard\Domain\Model;

class ApplicationField
{
    private string $type;
    private string $name;
    private string $description;
    private bool $required;

    public function __construct(string $type, string $name, string $description, bool $required)
    {

        $this->type = $type;
        $this->name = $name;
        $this->description = $description;
        $this->required = $required;
    }
}
