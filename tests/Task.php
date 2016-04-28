<?php

namespace devmastersbv\pthreads\tests;

class Task extends \devmastersbv\pthreads\Task
{
    
    public function run()
    {
        $this->data->storeCounter("total", 1);
        $this->setGarbage();
    }

}
