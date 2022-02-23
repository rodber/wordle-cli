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

namespace Rodber\Wordle\Tests;

use PHPUnit\Framework\TestCase;
use Rodber\Wordle\Word;

final class WordTest extends TestCase
{
    public function testWord(): void
    {
        $word = 'word';
        $solver = new Word($word);
        $this->assertSame($word, $solver->__toString());
        $this->assertSame(strlen($word), $solver->length());
        $this->assertSame(
            ['w', 'o', 'r', 'd'],
            $solver->split()
        );
    }

    public function testWordUtf8(): void
    {
        $foo = 'piña';
        $word = new Word($foo);
        $this->assertSame($foo, $word->__toString());
        $this->assertSame(mb_strlen($foo), $word->length());
        $this->assertSame(
            ['p', 'i', 'ñ', 'a'],
            $word->split()
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
