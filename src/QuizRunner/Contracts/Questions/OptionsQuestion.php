<?php
declare(strict_types=1);

namespace QuizRunner\Contracts\Questions;

/**
 * Interface OptionsQuestion
 *
 * @package QuizRunner\Contracts\Questions
 */
interface OptionsQuestion extends Question
{
    /**
     * @return iterable|\QuizRunner\Contracts\Options\Option[]
     */
    public function getOptions(): iterable;
}