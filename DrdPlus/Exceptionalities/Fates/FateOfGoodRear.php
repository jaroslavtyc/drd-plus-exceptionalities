<?php
namespace DrdPlus\Exceptionalities\Fates;

use DrdPlus\Exceptionalities\Templates\Integer1To6;
use Granam\Tools\ValueDescriber;

class FateOfGoodRear extends ExceptionalityFate
{
    const FATE_OF_GOOD_REAR = 'fate_of_good_rear';

    /**
     * @return int
     */
    public function getPrimaryPropertiesBonusOnChoice()
    {
        return 1;
    }

    /**
     * @return int
     */
    public function getSecondaryPropertiesBonusOnChoice()
    {
        return 2;
    }

    /**
     * @return int
     */
    public function getUpToSingleProperty()
    {
        return 1;
    }

    /**
     * @param Integer1to6 $roll
     *
     * @return int
     */
    public function getPrimaryPropertyBonusOnFortune(Integer1To6 $roll)
    {
        switch ($roll->getValue()) {
            case 1:
            case 2:
            case 3:
                return 0;
            case 4:
            case 5:
            case 6:
                return 1;
            default:
                throw new Exceptions\UnexpectedRoll(
                    'Unexpected roll value ' . ValueDescriber::describe($roll->getValue())
                );
        }
    }

    /**
     * @param Integer1to6 $roll
     *
     * @return int
     */
    public function getSecondaryPropertyBonusOnFortune(Integer1to6 $roll)
    {
        // secondary and primary properties got same bonus
        return $this->getPrimaryPropertyBonusOnFortune($roll);
    }

}
