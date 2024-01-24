# Rodber's Wordle-CLI

<a href="https://github.com/rodber/wordle-cli/releases/latest"><img alt="Get it on macOS" src=".github/badge/macos.png" height="50" hspace="2"><img alt="Get it on Linux" src=".github/badge/linux.png" height="50" hspace="2"><img alt="Get it on Windows" src=".github/badge/windows.png" height="50" hspace="2"></a>

https://user-images.githubusercontent.com/20590102/151889072-ff1ef963-e18c-4554-a5f6-edeed50343ec.mp4

This is a Wordle CLI remix game:

* Pick language to answer (En, Pt, Es)
* Choose word length (3, 8)
* Determine number of allowed responses (default 6)

## Run binary

* Get the latest binary from the [releases page](https://github.com/rodber/wordle-cli/releases/)
* Run `wordle-cli` from your terminal

Windows users can run `wsl ./wordle-cli` from the Windows terminal.

## Run using Docker

```sh
docker run -it --rm --init --name rodber-wordle-cli ghcr.io/rodber/wordle-cli ./wordle-cli
```

### Build Docker image

```sh
docker build -t ghcr.io/rodber/wordle-cli:latest .
```

## Run from source

```php
composer install
```

```php
./wordle-cli
```

## License

Copyright [Rodolfo Berrios A.](https://rodolfoberrios.com/)

This project is licensed under the Apache License, Version 2.0. See [LICENSE](LICENSE) for the full license text.

Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing permissions and limitations under the License.
