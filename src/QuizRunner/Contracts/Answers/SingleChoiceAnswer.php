<?php
declare(strict_types=1);

namespace QuizRunner\Contracts\Answers;

use QuizRunner\Contracts\Options\Option;

/**
 * Interface SingleChoiceAnswer
 *
 * @package QuizRunner\Contracts\Answers
 */
interface SingleChoiceAnswer extends Answer
{
    /**
     * @return Option
     */
    public function getOption(): Option;
}