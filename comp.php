<?php
class Comp {
    function Comp() {
        $this->init();
    }
    function init() {
        echo('Comp Init<br>');
        $fName = new firstName();
        $fName->onError->subscribe('doerror', $this);
        $fName->init();
    }

    function getChildren() {
        echo('Comp: getChildren');
        
    }
    function doError() {
        echo('<strong>Comp::doError fired in class ('.get_class($this).').</strong><br>');
    }
    function __toString() {
        return 'Class: ['.get_class($this).']';
    }
}
class firstName  {
    function firstName() {
        $this->onError = new CustomEvent('onerror', $this);
        echo('TEST: '.$this->onError.'<br>');
    }
    function init() {
        echo('firstName Init<br>');
        $inputFN = new inputFirstName();
        $inputFN->onError->subscribe('doerror', $this);
        $inputFN->test();
    }
    function doError($info1, $info2, $info3, $info4) {
        echo('firstName::doError Fired in class ('.get_class($this).')<br>');
        echo('Args1: '.get_class($info1).'<br>');
        echo('Args2: '.$info2.'<br>');
        echo('Args3: '.$info3.'<br>');
        echo('Args3: '.$info4.'<br>');
        echo('Firing firstName::onError Event<br>');
        $this->onError->fire();
    }
    function __toString() {
        return 'Class: ['.get_class($this).']';
    }
}
class inputFirstName {
    function inputFirstName() {
        $this->onError = new CustomEvent('onerror', $this);
        $this->init();
    }
    function init() {
        echo('inputFirstName Init<br>');
    }
    function test() {
        echo('Firing inputFirstName::onError Event<br>');
        $this->onError->fire('arg1', 'arg2', 'arg3');
    }
    function __toString() {
        return 'Class: ['.get_class($this).']';
    }
}
?>
