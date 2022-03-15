<?php
function debug($data)
{
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}

function layout($layout)
{
    switch ($layout) {
        case 'header' :
            $controller = new \App\Controllers\Layouts\HeaderController();
            break;
        case 'footer' :
            $controller = new \App\Controllers\Layouts\FooterController();
            break;
        default :
            $class = '\App\Controllers\Layouts\\' . ucfirst($layout) . 'Controller';
            $controller = new $class();
    }

    $controller->show();
}