#!/usr/bin/env bash

set -e

mkdir -p bin/macos/{arm64,x86_64}
mkdir -p bin/linux/{aarch64,x86_64}

cat micro/micro-macos-arm64.sfx wordle-cli.phar >bin/macos/arm64/wordle-cli
cat micro/micro-macos-x86_64.sfx wordle-cli.phar >bin/macos/x86_64/wordle-cli
cat micro/micro-linux-aarch64.sfx wordle-cli.phar >bin/linux/aarch64/wordle-cli
cat micro/micro-linux-x86_64.sfx wordle-cli.phar >bin/linux/x86_64/wordle-cli

chmod +x bin/macos/*/wordle-cli
chmod +x bin/linux/*/wordle-cli
