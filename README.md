pthreads
=========================

Classes to make working with ```krakjoe/pthreads``` easier.

Installation
------------
```
"devmastersbv/pthreads": "*"
```

to the require section of your `composer.json` file.

Usage
------------
```php
class Task extends \devmastersbv\pthreads\Task {
    public function run(){
        $this->logger = $this->worker->getLogger();
        $this->logger->log("Message",["This will be var_dumped"]);
        $this->logger->log(function($var){
            //do whatever you like with var, synchronized.
        },$var);

        //Increment data by 1
        $this->data->storeCounter("total",1);
    }
}

$pool = new \devmastersbv\pthreads\SafeLog;
$pool = new \Pool(4, "devmastersbv\\pthreads\\Worker", [$this->logger, PTHREADS_INHERIT_NONE, "vendor/autoload.php"]);
$data = new \devmastersbv\pthreads\Data;
$pool->submit(new Task($data));
$pool->shutdown();
var_dump($data->total);
//Will display int(4)
```
