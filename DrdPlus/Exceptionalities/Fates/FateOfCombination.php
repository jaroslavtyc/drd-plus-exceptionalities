<?php
namespace DrdPlus\Exceptionalities\Fates;

use DrdPlus\Exceptionalities\Templates\Integer1To6;
use Granam\Tools\ValueDescriber;

class FateOfCombination extends ExceptionalityFate
{
    const FATE_OF_COMBINATION = 'fate_of_combination';

    /**
     * @return FateOfCombination
     */
    public static function getIt()
    {
        return parent::getIt();
    }

    /**
     * @return string
     */
    public static function getCode()
    {
        return parent::getCode();
    }

    /**
     * @return int
     */
    public function getPrimaryPropertiesBonusOnChoice()
    {
        return 2;
    }

    /**
     * @return int
     */
    public function getSecondaryPropertiesBonusOnChoice()
    {
        return 4;
    }

    /**
     * @return int
     */
    public function getUpToSingleProperty()
    {
        return 2;
    }

    /**
     * @param Integer1To6 $roll
     * @return int
     * @throws \DrdPlus\Exceptionalities\Fates\Exceptions\UnexpectedRoll
     */
    public function getPrimaryPropertyBonusOnFortune(Integer1To6 $roll)
    {
        switch ($roll->getValue()) {
            case 1:
            case 2:
                return 0;
            case 3:
            case 4:
                return 1;
            case 5:
            case 6:
                return 2;
            default:
                throw new Exceptions\UnexpectedRoll(
                    'Unexpected roll value ' . ValueDescriber::describe($roll->getValue())
                );
        }
    }

    /**
     * @param Integer1To6 $roll
     * @return int
     * @throws \DrdPlus\Exceptionalities\Fates\Exceptions\UnexpectedRoll
     */
    public function getSecondaryPropertyBonusOnFortune(Integer1To6 $roll)
    {
        // combination has same secondary and primary properties bonus
        return $this->getPrimaryPropertyBonusOnFortune($roll);
    }

}
