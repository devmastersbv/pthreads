<?php

namespace devmastersbv\pthreads;

class Data extends \Threaded
{

    public function storeCounter($variable, $value)
    {
        $this->synchronized(function($variable, $value) {
            $this->{$variable} += $value;
        }, $variable, $value);
    }

}
