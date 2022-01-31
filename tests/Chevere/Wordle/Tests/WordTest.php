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

namespace Chevere\Wordle\Tests;

use Chevere\Wordle\Word;
use PHPUnit\Framework\TestCase;

final class WordTest extends TestCase
{
    public function testConstruct(): void
    {
        $word = 'palabra';
        $solver = new Word($word);
        $this->assertSame($word, $solver->__toString());
        $this->assertSame(strlen($word), $solver->length());
        $this->assertSame(
            ['p', 'a', 'l', 'a', 'b', 'r', 'a'],
            $solver->split()
        );
    }

    public function testCharMatch(): void
    {
        $word = '01';
        $solver = new Word($word);
        $expected = [
            '0' => Word::CHAR_MATCH_EXACT,
            '1' => Word::CHAR_MATCH_PARTIAL,
            '2' => Word::CHAR_MATCH_NONE,
        ];
        foreach ($expected as $letter => $expected) {
            $this->assertSame($expected, $solver->getPosMatch(0, strval($letter)));
        }
    }
}
