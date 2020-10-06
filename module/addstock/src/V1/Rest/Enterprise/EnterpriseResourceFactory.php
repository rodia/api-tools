<?php
namespace addstock\V1\Rest\Enterprise;

use EnterpriseLib\Mapper;

class EnterpriseResourceFactory
{
    public function __invoke($services)
    {
        return new EnterpriseResource($services->get(Mapper::class));
    }
}
