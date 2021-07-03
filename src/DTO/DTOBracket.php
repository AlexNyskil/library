<?php

namespace Library\DTO;

use Library\Contracts\DTOBracketContract;

/**
 * Class DTOBracket
 * @package Library\DTO
 */
class DTOBracket implements DTOBracketContract
{
    private $brackets;
    private $chars;

    /**
     * DTOBracket constructor.
     *
     * @param string $brackets
     */
    public function __construct(string $brackets)
    {
        $this->brackets = $brackets;
        $this->chars = preg_split('//', $this->brackets, -1, PREG_SPLIT_NO_EMPTY);
    }

    /**
     * @param string $brackets
     */
    public function setBrackets(string $brackets)
    {
        $this->brackets = $brackets;
        $this->chars = preg_split('//', $this->brackets, -1, PREG_SPLIT_NO_EMPTY);
    }

    /**
     * @return string
     */
    public function getBrackets(): string
    {
        return $this->brackets;
    }

    /**
     * @return string
     */
    public function getFirstChar(): string
    {
        $chars = $this->chars;

        return array_shift($chars);
    }

    /**
     * @return string
     */
    public function getLastChar(): string
    {
        $chars = $this->chars;

        return array_pop($chars);
    }
}
