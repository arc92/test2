<?php


use Elasticsearch\ClientBuilder;

if (!function_exists('elasticSearchClient')) {
    function elasticSearchClient()
    {
        return ClientBuilder::create()->setHosts(["localhost:9200"])->build();
    }
}


if (!function_exists('getIndexName')) {
    function getIndexName()
    {
        return "product";
    }
}