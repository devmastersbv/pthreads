<?php

namespace devmastersbv\pthreads\tests;

class Task extends \devmastersbv\pthreads\Task
{

    public function run()
    {
        parent::run();
        $this->logger->log("Worker test", $this->worker->getThreadId());
        $this->data->storeCounter("testCount", 1);
    }

}
