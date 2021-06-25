<?php

namespace Library\DTO;

use Library\Contracts\DTOContract;

/**
 * Class DTOLine
 * @package Library
 */
class DTOLine implements DTOContract
{
    private $line;

    /**
     * DTOLine constructor.
     *
     * @param string $line
     */
    public function __construct(string $line)
    {
        $this->line = $line;
    }

    /**
     * @param string $line
     */
    public function setLine(string $line)
    {
        $this->line = $line;
    }

    /**
     * @return string
     */
    public function getLine(): string
    {
        return $this->line;
    }
}