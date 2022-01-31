# Rodber's WORDLE-CLI

`🚧 Preview`

```plain
                   ____             _      
   _________  ____/ / /_  ___  ____( )_____
  / ___/ __ \/ __  / __ \/ _ \/ ___/// ___/
 / /  / /_/ / /_/ / /_/ /  __/ /    (__  ) 
/_/   \____/\__,_/_.___/\___/_/    /____/  

██╗    ██╗ ██████╗ ██████╗ ██████╗ ██╗     ███████╗     ██████╗██╗     ██╗
██║    ██║██╔═══██╗██╔══██╗██╔══██╗██║     ██╔════╝    ██╔════╝██║     ██║
██║ █╗ ██║██║   ██║██████╔╝██║  ██║██║     █████╗█████╗██║     ██║     ██║
██║███╗██║██║   ██║██╔══██╗██║  ██║██║     ██╔══╝╚════╝██║     ██║     ██║
╚███╔███╔╝╚██████╔╝██║  ██║██████╔╝███████╗███████╗    ╚██████╗███████╗██║
 ╚══╝╚══╝  ╚═════╝ ╚═╝  ╚═╝╚═════╝ ╚══════╝╚══════╝     ╚═════╝╚══════╝╚═╝

```

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
