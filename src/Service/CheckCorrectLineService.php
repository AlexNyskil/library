<?php

namespace Library\Service;

use Library\Contracts\DTOContract;
use Library\Exceptions\InvalidArgumentException;

/**
 * Class CheckCorrectLineService
 * @package Library\Service
 */
class CheckCorrectLineService
{
    private $dto;

    /**
     * CheckCorrectLineService constructor.
     *
     * @param DTOContract $dto
     */
    public function __construct(DTOContract $dto)
    {
        $this->dto = $dto;
    }

    /**
     * @return bool
     */
    public function handle(): bool
    {
        $line = $this->dto->getLine();

        if ($result = preg_match('[^(), \n\t\r]', $line)) {
            throw new InvalidArgumentException('invalid argument line');
        }

        $line = preg_replace('[, \n\t\r]', '', $line);
        $result = $this->deleteBrackets($line);

        return !$result;
    }

    /**
     * @param string $line
     *
     * @return int
     */
    private function deleteBrackets(string $line)
    {
        $chars = preg_split('//', $line, -1, PREG_SPLIT_NO_EMPTY);
        $stop = false;

        while (count($chars) && !$stop) {
            $stop = true;
            for ($i = 0; $i < count($chars) - 1; $i++) {
                if ($chars[$i] === '(' && $chars[$i+1] === ')') {
                    unset($chars[$i], $chars[$i+1]);
                    $i++;
                    $stop = false;
                }
            }
            $chars = array_values($chars);
        }

        return count($chars);
    }
}