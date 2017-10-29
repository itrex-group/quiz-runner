<?php
declare(strict_types=1);

namespace QuizRunner\Contracts\Answers;

/**
 * Interface MultipleChoiceAnswer
 *
 * @package QuizRunner\Contracts\Answers
 */
interface MultipleChoiceAnswer extends Answer
{
    /**
     * @return iterable|\QuizRunner\Contracts\Options\Option[]
     */
    public function getOptions(): iterable;
}