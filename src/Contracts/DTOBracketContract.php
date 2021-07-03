<?php

namespace Library\Contracts;

interface DTOBracketContract
{
    /**
     * DTOBracket constructor.
     *
     * @param string $brackets
     */
    public function __construct(string $brackets);

    /**
     * @param string $brackets
     */
    public function setBrackets(string $brackets);

    /**
     * @return string
     */
    public function getBrackets();

    /**
     * @return string
     */
    public function getFirstChar();

    /**
     * @return string
     */
    public function getLastChar();
}
