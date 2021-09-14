<?php

namespace Examples;

use Zuwinda\Services\Instances;

class Examples {
    public function sendMessage(Instances $instances) {
        // new Zuwinda('token');
        $instances->setTo('081515292117')->setContent('Hello world')->send();
    }
}