<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class ConstValidValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {
        if (empty($value)) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ value }}', 'Valeur Vide')
                ->addViolation();
            return;
        }
       if(strpos($value, 'Z') !== 0 && strpos($value, 'S') !== 0 ){
        $this->context->buildViolation($constraint->message)
        ->setParameter('{{ value }}', $value)
        ->addViolation(); 
       }
    }
}
