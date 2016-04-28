<?php

namespace devmastersbv\pthreads;

class SafeLog extends \Threaded
{
    /*
     * If logging were allowed to occur without synchronizing
     * 	the output would be illegible. Removed ... syntax because we are using this on 5.4 aswel
     */

    public function log($message, $args)
    {
        $this->synchronized(function($message, $args) {
            if (is_callable($message)) {
                $message($args);
            } else {
                echo $message . "\n";
                var_dump($args);
            }
        }, $message, $args);
    }

}
