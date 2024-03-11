<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class ConstraintQualityValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {
        /* @var ConstraintQuality $constraint */
        if (empty($value)) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ value }}', 'Valeur Vide')
                ->addViolation();
            return;
        }
        $features = ["Budget","Quality","Premium"];
            if(!in_array($value,$features)){
                $this->context->buildViolation($constraint->message)
                ->setParameter('{{ value }}', $value)
                ->addViolation();
        } 
    }
}
