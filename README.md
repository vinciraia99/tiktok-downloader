<img src="https://i.imgur.com/OyY198O.png" width="200px" align="right">

# TikTok Downloader

Project created form [this](https://github.com/gingteam/tiktok-downloader)

## Installation

```bash
composer require vinciraia99/tiktok:dev-main
```


## Usage

```php
<?php

use TikTok\Driver\SnaptikDriver;
use TikTok\VideoDownloader;

require __DIR__.'/vendor/autoload.php';

$tiktok = new VideoDownloader(new SnaptikDriver());

echo $tiktok->get('https://www.tiktok.com/@philandmore/video/6805867805452324102');
```
