<?php
require 'vendor/autoload.php';
$f3 = \Base::instance();


$f3->route('GET /',
    function() {
        echo 'Hello, world!';
    }
);

$f3->route('GET /foo',
    function($f3) {
        $f3->set('name','Earth');
        $view=new View;
        echo $view->render('template.htm');
        // Previous two lines can be shortened to:
        // echo View::instance()->render('template.htm');
    }
);


$f3->run();
?>
