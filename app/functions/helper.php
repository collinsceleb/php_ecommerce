<?php
use Philo\Blade\Blade;

function view($path, array $data = []) 
{
    $view = __DIR__ . '/../../resources/views';
    $cache = __DIR__ . '/../../bootstrap/cache';
    $blade = new Blade($view, $cache);

    echo $blade->view()->make($path, $data)->render();
}
function make($filename, $data)
{
    // $data = [
    //     'to' => 'test@example.com',
    //     'subject' => 'Welcome to Celeb Store',
    //     'view' => 'welcome',
    //     'name' => 'John Doe',
    //     'body' => 'Testing email template'
    // ];
    extract($data);

    // Turn on output buffering
    ob_start();

    // Include Template
    include(__DIR__.'/../../resources/views/emails' . $filename . '.php');

    // Get Content of the file
    $content = ob_get_contents();

    // Erase the output and turn off output buffering
    ob_end_clean();

    return $content;
}
