<?php

namespace Library\DTO;

use Library\Contracts\DTOLineContract;
use Library\Exceptions\InvalidArgumentException;

/**
 * Class DTOLine
 * @package Library
 */
class DTOLine implements DTOLineContract
{
    private $line;

    /**
     * DTOLine constructor.
     *
     * @param string $line
     */
    public function __construct(string $line)
    {
        $this->line = $this->checkLine($line);
    }

    /**
     * @param string $line
     */
    public function setLine(string $line)
    {
        $this->line = $this->checkLine($line);
    }

    /**
     * @return string
     */
    public function getLine(): string
    {
        return $this->line;
    }

    /**
     * @param string $line
     *
     * @return string|string[]|null
     */
    public function checkLine(string $line): string
    {
        if ($result = preg_match('[^(), \n\t\r]', $line)) {
            throw new InvalidArgumentException('invalid argument line');
        }

        $line = preg_replace('[, \n\t\r]', '', $line);

        return $line;
    }

    /**
     * @return array
     */
    public function getArrayLine(): array
    {
        return preg_split('//', $this->line, -1, PREG_SPLIT_NO_EMPTY);
    }
}