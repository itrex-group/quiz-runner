<?php
declare(strict_types=1);

namespace QuizRunner\Contracts\Answers;

/**
 * Interface TextAnswer
 *
 * @package QuizRunner\Contracts\Answers
 */
interface TextAnswer extends Answer
{
    /**
     * @return string
     */
    public function getValue(): string;
}