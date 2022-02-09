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

use Chevere\Filesystem\File;
use Chevere\Filesystem\Interfaces\DirInterface;
use Chevere\Filesystem\Interfaces\FileInterface;
use function Chevere\Message\message;
use Chevere\Throwable\Exceptions\RuntimeException;
use function Chevere\Writer\streamFor;

final class Wordlist
{
    private $fopen;

    private string $lang;
    
    public function __construct(private FileInterface $file)
    {
        $this->openFile();
        $this->lang = basename($file->path()->__toString());
    }

    public function split(
        DirInterface $dir,
        int $min = 3,
        int $max = 8
    ): void {
        $countWords = 0;
        $collect = range($min, $max);
        $writers = [];
        foreach ($collect as $size) {
            $file = new File($dir->path()->getChild("$size.php"));
            $file->removeIfExists();
            $file->create();
            $writer = streamFor($file->path()->__toString(), 'w');
            $writer->write('<?php return [' . PHP_EOL);
            $writers[$size] = $writer;
        }
        $this->openFile();
        while (($line = fgets($this->fopen)) !== false) {
            $line = trim($line);
            $length = mb_strlen($line);
            if (in_array($length, $collect)) {
                $writers[$length]->write("'" . $line . "',");
                $countWords++;
            }
        }
        foreach ($collect as $size) {
            $writers[$size]->write('];');
        }
        $countedWords = number_format($countWords);
        echo " ✅ $countedWords words\n";

        fclose($this->fopen);
    }

    private function openFile(): void
    {
        $this->fopen = fopen($this->file->path()->__toString(), "r");
        if (!$this->fopen) {
            throw new RuntimeException(
                message: message('Could not open file %file%', ['%file%' => $this->file->path()->__toString()])
            );
        }
    }
}
