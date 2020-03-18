<?php


use Elasticsearch\ClientBuilder;

if (!function_exists('elasticSearchClient')) {
    function elasticSearchClient()
    {
        return ClientBuilder::create()->setHosts(["elasticsearch:9200"])->build();
    }
}


if (!function_exists('getIndexName')) {
    function getIndexName()
    {
        return "product";
    }
}