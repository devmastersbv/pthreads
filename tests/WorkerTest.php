<?php

namespace devmastersbv\pthreads\tests;

use devmastersbv\pthreads\SafeLog;
use devmastersbv\pthreads\Data;

class WorkerTest extends \PHPUnit_Framework_TestCase
{

    private $logger;

    protected function setUp()
    {
        $this->logger = new SafeLog;
        $this->pool = new \Pool(4, "devmastersbv\\pthreads\\Worker", [$this->logger, PTHREADS_INHERIT_NONE, "vendor/autoload.php"]);
    }

    /**
     * @dataProvider getStrings
     */
    public function testTask($string)
    {
        $data = new Data;
        /* submit a task to the pool */
        $this->pool->submit(new Task($data));
    }

    /**
     * @dataProvider getStrings
     */
    public function testLogger($string, $dump)
    {
        $this->logger->log($string, $dump);
    }

    public function tearDown()
    {
        /* in the real world, do some ::collect somewhere */
        /* shutdown, because explicit is good */
        $this->pool->shutdown();
    }

    public function getStrings()
    {
        return [
            ['Hello world', ['dump']],
        ];
    }

}
