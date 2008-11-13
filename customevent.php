<?php
class CustomEvent {
    private $subscribers = Array();
    private $name;
    private $scope;

    public function __construct($name, $scope=false) {
        $this->name = $name;
        $this->scope = $scope;
        echo('<em>New Event Created ('.$name.') in scope ('.get_class($this->scope).')</em><br>');
    }

    public function subscribe($func, $scope='') {
        $scope = ((is_object($scope)) ? $scope : $this->scope);
        echo('$scope: '.get_class($scope).'<br>');
        $this->subscribers[$func] =  array('function' => $func, 'scope' => $scope);
        echo('<em>Added Event to: '.$this->name.' ('.$func.')</em><br>');
    }

    public function fire() {
        $passArgs = array($this->scope);
        $numArgs = func_num_args();
        echo('Number of arguments: '.$numArgs.'<br>');
        if ($numArgs) {
            $args = func_get_args();
            $passArgs = array_merge($passArgs, $args);
            for ($i = 0; $i <= $numArgs; $i++) {
                echo "Argument $i is: " . $passArgs[$i] . "<br />\n";
            }
        }
 
        reset($this->subscribers);
        //echo('<pre>'.print_r($this, 1).'</pre>');
        foreach ($this->subscribers as $event) {
            echo('<em>Checking Fire Event: '.$event['function'].' in scope ('.get_class($event['scope']).')</em><br>');
            if (is_object($event['scope'])) {
                if (is_callable(array($event['scope'], $event['function']))) {
                    echo('<em>Fire Event: '.$event['function'].' in scope ('.get_class($event['scope']).')</em><br>');
                    call_user_func_array(array($event['scope'], $event['function']), $passArgs);
                }
            } else {
                if (is_callable($event['function'])) {
                    echo('<em>Fire Event: '.$event['function'].'</em><br>');
                    call_user_func_array($event['function'], $passArgs);
                }
            }
        }
    }

    public function unsubscribe($func) {
        echo('<em>Event Removed: '.$func.'</em><br>');
        unset($this->subscribers[$func]);
    }
    
    public function unsubscribeAll() {
        reset($this->subscribers);
        foreach ($this->subscribers as $event) {
            echo('<em>Event Removed: '.$event['function'].'</em><br>');
            unset($this->subscribers[$event['function']]);
        }
    }
    
    public function __toString() {
        return 'Custom Event ['.$this->name.'] (subscribers: '.count($this->subscribers).')';
    }
}

?>
