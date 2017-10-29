<?php
declare(strict_types=1);

namespace QuizRunner\Contracts\Options;

/**
 * Interface IntervalOption
 *
 * @package QuizRunner\Contracts\Options
 */
interface IntervalOption extends Option
{
    /**
     * @return int
     */
    public function getMinValue(): int;

    /**
     * @return int
     */
    public function getMaxValue(): int;
}