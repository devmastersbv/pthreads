pthreads
=========================

Classes to make working with ```krakjoe/pthreads``` easier.

Installation
------------
```
"devmastersbv/pthreads": "~1.0"
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
        $this->setGarbage();
    }
}

$logger = new \devmastersbv\pthreads\SafeLog;
$pool = new \Pool(4, "devmastersbv\\pthreads\\Worker", [$logger, PTHREADS_INHERIT_NONE, "vendor/autoload.php"]);
$data = new \devmastersbv\pthreads\Data;
$pool->submit(new Task($data));
while($pool->collect(function(\Collectable $task){
    return $task->isGarbage();
})){
    continue;
}
$pool->shutdown();
var_dump($data->total);
//Will display int(4)
```
