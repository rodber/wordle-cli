<?php

/*
 * This file is part of Chevere.
 *
 * (c) Rodolfo Berrios <rodolfo@chevere.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Rodber\Wordle;

use Stringable;
use function Chevere\Parameter\string;

final class Word implements Stringable
{
    public const CHAR_MATCH_NONE = -1;

    public const CHAR_MATCH_PARTIAL = 0;

    public const CHAR_MATCH_EXACT = 1;

    private int $length;

    private array $split;

    private array $countValues;

    public function __construct(
        private string $string
    ) {
        string('/^(?!\s*$).+/')($string);
        $this->length = mb_strlen($string);
        $this->split = mb_str_split($string, 1);
        $this->countValues = array_count_values($this->split);
    }

    public function __toString(): string
    {
        return $this->string;
    }

    public function length(): int
    {
        return $this->length;
    }

    public function split(): array
    {
        return $this->split;
    }

    public function countValues(): array
    {
        return $this->countValues;
    }

    public function getPosMatch(int $pos, string $letter): int
    {
        switch (true) {
            case $this->split[$pos] === $letter:
                return self::CHAR_MATCH_EXACT;

                break;
            case str_contains($this->string, $letter):
                return self::CHAR_MATCH_PARTIAL;

                break;
            default:
                return self::CHAR_MATCH_NONE;

                break;
        }
    }
}
