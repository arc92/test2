<?php


use Elasticsearch\ClientBuilder;

if (!function_exists('elasticSearchClient')) {
    function elasticSearchClient()
    {
        return ClientBuilder::create()->setHosts(["localhost:9202"])->build();
    }
}


if (!function_exists('getIndexName')) {
    function getIndexName()
    {
        return "product";
    }
}

if(!function_exists('env')){
    function env($key,$default = null){
        return !empty($_ENV[$key]) ? $_ENV[$key] : $default;
    }
}