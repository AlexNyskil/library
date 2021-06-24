<?php

namespace Library\Contracts;

interface DTOContract
{
    /**
     * DTOContract constructor.
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
}
