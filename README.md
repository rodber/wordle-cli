# Rodber's WORDLE-CLI

`🚧 Preview`

https://user-images.githubusercontent.com/20590102/151889072-ff1ef963-e18c-4554-a5f6-edeed50343ec.mp4

This is a Wordle CLI game (remix). Currently it only works in Spanish.

## ✨ Run with Docker

```sh
docker run -it --rm --init --name rodber-wordle-cli ghcr.io/rodber/wordle-cli ./play
```

## Remove

```sh
docker container rm rodber-wordle-cli -f
```

## Build

```sh
docker build -t ghcr.io/rodber/wordle-cli:latest .
```

## 🐘 Run with php

```php
composer install
```

```php
php play
```

## License

Copyright 2022 [Rodolfo Berrios A.](https://rodolfoberrios.com/)

XR is licensed under the Apache License, Version 2.0. See [LICENSE](LICENSE) for the full license text.

Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing permissions and limitations under the License.
