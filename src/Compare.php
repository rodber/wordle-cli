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

use Chevere\Throwable\Exceptions\LengthException;

final class Compare
{
    private array $computed;

    private bool $match;

    private float $percent;

    private string $percentFormat;

    private string $fraction;

    public function __construct(
        private Word $word,
        private Word $against
    ) {
        $this->assertLength($against);
        $matches = 0;
        $partial = [];
        $values = $this->word->countValues();
        foreach ($against->split() as $pos => $letter) {
            $match = $this->word->getPosMatch($pos, $letter);
            if ($match === Word::CHAR_MATCH_EXACT) {
                $values[$letter]--;
                $matches++;
            }
            if ($match === Word::CHAR_MATCH_PARTIAL) {
                $partial[$pos] = $letter;
            }
            $this->computed[] = [
                $letter => $match,
            ];
        }
        foreach ($partial as $pos => $letter) {
            if ($values[$letter] === 0) {
                $this->computed[$pos] = [
                    $letter => Word::CHAR_MATCH_NONE,
                ];
            }
        }
        $this->match = $matches === $this->word->length();
        $this->percent = $matches / $this->word->length();
        $this->percentFormat = number_format(100 * $this->percent, 0) . '%';
        $this->fraction = strval($matches)
            . '/'
            . strval($this->word->length());
    }

    public function computed(): array
    {
        return $this->computed;
    }

    public function match(): bool
    {
        return $this->match;
    }

    public function percent(): float
    {
        return $this->percent;
    }

    public function percentFormat(): string
    {
        return $this->percentFormat;
    }

    public function fraction(): string
    {
        return $this->fraction;
    }

    private function assertLength(Word $against): void
    {
        if ($this->word->length() !== $against->length()) {
            throw new LengthException();
        }
    }
}
