<?php
namespace addstock\V1\Rest\Product;

class ProductResourceFactory
{
    public function __invoke($services)
    {
        return new ProductResource();
    }
}
