<?php

namespace Controller;

class Index extends Controller
{
    public function add($req, $resp)
    {
        return $resp->getBody()->write('Hello World! This is the Add Method. Try GET, PUT and DELETE this endpoint.');
    }
    public function get($req, $resp)
    {
        return $resp->getBody()->write('Hello World! This is the Get Method. Try PUT, POST and DELETE this endpoint.');
    }
    public function update($req, $resp)
    {
        return $resp->getBody()->write('Hello World! This is the Update Method. Try GET, POST and DELETE this endpoint.');
    }
    public function delete($req, $resp)
    {
        return $resp->getBody()->write('Hello World! This is the Delete Method. Try GET, PUT and POST this endpoint.');
    }
}