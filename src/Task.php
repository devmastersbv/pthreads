<?php

namespace devmastersbv\pthreads;

abstract class Task extends \Collectable
{

    private $logger;
    private $data;

    public function __construct(\Threaded $data)
    {
        $this->data = $data;
    }

}
