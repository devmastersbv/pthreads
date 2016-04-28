<?php

namespace devmastersbv\pthreads;

class Worker extends \Worker
{

    private $inheritance;
    private $loader;
    protected $logger;

    public function __construct(SafeLog $logger, $inheritance = PTHREADS_INHERIT_NONE, $loader = null)
    {
        $this->logger = $logger;
        $this->inheritance = $inheritance;
        $this->loader = $loader;
    }

    /* include autoloader for Tasks */

    public function run()
    {
        if ($this->loader) {
            require_once($this->loader);
        }
    }

    /* override default inheritance behaviour for the new threaded context */

    public function start($options = null)
    {
        return parent::start($this->inheritance);
    }

    public function getLogger()
    {
        return $this->logger;
    }

}
