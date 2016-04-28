<?php

namespace devmastersbv\pthreads;

class Worker extends \Worker
{

    private $inheritance;
    private $loader;
    protected $logger;

    /**
     * Constructs the worker, sets the autoloader and inheritance
     * @param \devmastersbv\pthreads\SafeLog $logger
     * @param type $inheritance
     * @param type $loader
     */
    public function __construct(SafeLog $logger, $inheritance = PTHREADS_INHERIT_NONE, $loader = null)
    {
        $this->logger = $logger;
        $this->inheritance = $inheritance;
        $this->loader = $loader;
    }

    /**
     * If set, require the autoloader
     */
    public function run()
    {
        if ($this->loader) {
            require_once($this->loader);
        }
    }

    /**
     * Start the worker
     * @param type $options
     * @return type
     */
    public function start($options = null)
    {
        return parent::start($this->inheritance);
    }

    /**
     * Get the logger
     * @return type
     */
    public function getLogger()
    {
        return $this->logger;
    }

}
