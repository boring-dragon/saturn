<?php

namespace Jinas\Saturn;

require '../vendor/autoload.php';

$rp = new Saturn;

echo $rp->parse('https://www.cnet.com/reviews/google-nest-mini-review/');
