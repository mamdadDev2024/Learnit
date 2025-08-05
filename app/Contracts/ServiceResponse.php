<?php

namespace App\Contracts;

class ServiceResponse
{
    public function __construct(public ?bool $success = null , public mixed $data = null){}
}
