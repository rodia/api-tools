<?php
namespace addstock\V1\Rest\Enterprise;

class EnterpriseResourceFactory
{
    public function __invoke($services)
    {
        return new EnterpriseResource();
    }
}
