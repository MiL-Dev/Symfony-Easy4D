<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class DesignationValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {
        /* @var Designation $constraint */

        if (empty($value)) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ value }}', 'Valeur Vide')
                ->addViolation();
            return;
        }
        $regexPattern = "/\d{3}\/\d{2}\s(R|ZR)\s\d{2}/"; //regex 000/00 (R|ZR) 00
        if(!preg_match($regexPattern, $value)){
            
            // TODO: implement the validation here
            $this->context->buildViolation($constraint->message)
            ->setParameter('{{ value }}', $value)
            ->addViolation();
        }
        
    }
}
