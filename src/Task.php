<?php

namespace devmastersbv\pthreads;

abstract class Task extends \Collectable
{

    private $data;

    /**
     * Takes a \Threaded data object for storing data between tasks
     * @param \Threaded $data
     */
    
    public function __construct(\Threaded $data)
    {
        $this->data = $data;
    }

}
