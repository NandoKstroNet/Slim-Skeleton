<?php

namespace Controller;

class Manual extends Controller
{
    public function show($req, $resp)
    {
    	$template = 'templates/manual.phtml';
        if (file_exists('README.html'))
        	$template = 'README.html';

        $manual = new \Service\Manual($template);
        $resp->getBody()->write($manual->parse('README.md'));

        return $resp;
    }
}