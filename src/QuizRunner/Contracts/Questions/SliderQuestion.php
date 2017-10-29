<?php
declare(strict_types=1);

namespace QuizRunner\Contracts\Questions;

/**
 * Interface SliderQuestion
 *
 * @package QuizRunner\Contracts\Questions
 */
interface SliderQuestion extends OptionsQuestion
{
    /**
     * @return float
     */
    public function getMinValue(): float;

    /**
     * @return float
     */
    public function getMaxValue(): float;

    /**
     * @return float
     */
    public function getDefaultValue(): float;

    /**
     * @return float
     */
    public function getStepValue(): float;
}