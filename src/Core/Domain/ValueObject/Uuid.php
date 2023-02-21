<?php

namespace Core\Domain\ValueObject;

use Doctrine\Instantiator\Exception\InvalidArgumentException;
use Ramsey\Uuid\Uuid as RamseyUuid;

class uuid
{
    public function __construct(
        protected string $value
    )
    {
        $this->ensureIsValidate($value);
    }   

    public static function random(): self
    {
        return new self(RamseyUuid::uuid4()->toString());
    }

    public function __toString(): string
    {
        return $this->value;   
    }

    private function ensureIsValidate(string $id)
    {
        if (!RamseyUuid::isValid($id)){
            throw new InvalidArgumentException(sprintf('<%s> does not allow the value <%s>.', static::class, $id));
        } 
        
    }
    
}