<?php

namespace Library\Contracts;

interface DTOLineContract
{
    /**
     * DTOLineContract constructor.
     *
     * @param string $line
     */
    public function __construct(string $line);

    /**
     * @param string $line
     */
    public function setLine(string $line);

    /**
     * @return string
     */
    public function getLine();

    /**
     * @return array
     */
    public function getArrayLine();
}
