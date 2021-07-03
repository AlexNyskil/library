<?php

namespace Library\Service;

use Library\Contracts\DTOBracketContract;
use Library\Contracts\DTOLineContract;
use Library\Exceptions\InvalidArgumentException;

/**
 * Class CheckCorrectLineService
 * @package Library\Service
 */
class CheckCorrectLineService
{
    private $dto;
    private $brackets;

    /**
     * CheckCorrectLineService constructor.
     *
     * @param DTOLineContract $dto
     * @param DTOBracketContract $brackets
     */
    public function __construct(DTOLineContract $dto, DTOBracketContract $brackets)
    {
        $this->dto = $dto;
        $this->brackets = $brackets;
    }

    /**
     * @return bool
     */
    public function handle(): bool
    {
        return $this->checkBrackets($this->dto, $this->brackets);
    }

    /**
     * @param DTOLineContract $line
     * @param DTOBracketContract $brackets
     *
     * @return bool
     */
    private function checkBrackets(DTOLineContract $line, DTOBracketContract $brackets)
    {
        $firstChar = $brackets->getFirstChar();
        $lastChar = $brackets->getLastChar();
        $line = $line->getArrayLine();
        $stack = [];
        $success = false;

        for ($i = 0; $i < count($line); $i++ ) {
            if ($line[$i] === $firstChar) {
                $stack[] = $line[$i];
            } elseif($line[$i] === $lastChar) {
                if (empty($stack)) {
                    break;
                }

                array_pop($stack);

                if ($i + 1 === count($line) && empty($stack)) {
                    $success = true;
                }
            }
        }

        return $success;
    }
}