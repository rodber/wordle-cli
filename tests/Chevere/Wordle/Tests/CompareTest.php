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

use Chevere\Throwable\Exceptions\LengthException;
use Chevere\Wordle\Compare;
use Chevere\Wordle\Word;
use PHPUnit\Framework\TestCase;

final class CompareTest extends TestCase
{
    public function testMatch(): void
    {
        $foo = 'word';
        $word = new Word($foo);
        $against = new Word($foo);
        $compare = new Compare($word, $against);
        $this->assertSame(
            [
                ['w' => Word::CHAR_MATCH_EXACT],
                ['o' => Word::CHAR_MATCH_EXACT],
                ['r' => Word::CHAR_MATCH_EXACT],
                ['d' => Word::CHAR_MATCH_EXACT],
            ],
            $compare->computed()
        );
        $this->assertTrue($compare->match());
        $against = new Word(strrev($foo));
        $compare = new Compare($word, $against);
        $this->assertSame(
            [
                ['d' => Word::CHAR_MATCH_PARTIAL],
                ['r' => Word::CHAR_MATCH_PARTIAL],
                ['o' => Word::CHAR_MATCH_PARTIAL],
                ['w' => Word::CHAR_MATCH_PARTIAL],
            ],
            $compare->computed()
        );
        $this->assertFalse($compare->match());
    }

    public function testPartialMatch(): void
    {
        $foo = 'word';
        $bar = 'wdrd';
        $word = new Word($foo);
        $against = new Word($bar);
        $compare = new Compare($word, $against);
        $this->assertSame(
            [
                ['w' => Word::CHAR_MATCH_EXACT],
                ['d' => Word::CHAR_MATCH_NONE],
                ['r' => Word::CHAR_MATCH_EXACT],
                ['d' => Word::CHAR_MATCH_EXACT],
            ],
            $compare->computed()
        );
    }

    public function testLengthException(): void
    {
        $foo = 'word';
        $word = new Word($foo);
        $this->expectException(LengthException::class);
        (new Compare($word, new Word($foo . $foo)));
    }
}
