<?php

namespace devmastersbv\pthreads;

class Data extends \Threaded
{

    /**
     * Increments a counter set on this object
     * @param type $variable
     * @param type $value
     */
    public function storeCounter($variable, $value)
    {
        $this->synchronized(function($variable, $value) {
            $this->{$variable} += $value;
        }, $variable, $value);
    }

}
