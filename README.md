# Saturn Parser
Web Crawler

Saturn Parser is a composer package that extracts the bits that humans care about from any URL you give it.
like article content, titles, authors, published dates, excerpts, lead images, and more.

![Image description](https://jinas.me/images/saturnparser-01.jpg)

Demo Application [Saturn Demo](http://saturn.jinas.me/)

## Installation

- Command:

```bash/shell
composer require jinas/saturn
```

## Usage

- Code sample:

```php

<?php

namespace Jinas\Saturn;

require '../vendor/autoload.php';

$rp = new Saturn;

echo $rp->parse('https://www.cnet.com/reviews/google-nest-mini-review/');

```

```json
{
    "success": true,
    "data": {
        "title": "Google Nest Mini review: Google's smallest smart speaker keeps getting better - CNET",
        "un_title": "Google Nest Mini review:\u00a0Google's smallest smart speaker keeps getting better",
        "lead_image": "https://cnet3.cbsistatic.com/img/BSH2-_S4lmkYNase8GgaOJvCkaY=/2019/10/09/c07227f1-9255-48db-8bee-1a4851ee5fcf/google-home-nest-mini-1529.jpg",
        "date_published": "2019-10-17T05:00:00-0700",
        "description": "Better sound, better listening and better controls pack a punch in Google's pint-size smart speaker. Oh, and it comes in blue now.",
        "keywords": null,
        "url": "https://www.cnet.com/reviews/google-nest-mini-review/",
        "word_count": 22,
        "domain": "www.cnet.com",
        "site_name": "CNET"
    },
    "message": "Data extracted successfuly :)"
}

```

### Source codes

- [Github](https://github.com/jinas123/saturn)
- [Packagist](https://packagist.org/packages/jinas/saturn)
