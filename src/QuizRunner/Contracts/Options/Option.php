<?php
declare(strict_types=1);

namespace QuizRunner\Contracts\Options;

use QuizRunner\Contracts\Questions\Question;

/**
 * Interface Option
 *
 * @package QuizRunner\Contracts\Questions
 */
interface Option
{
    /**
     * Returns an unique identifier
     *
     * @return int
     */
    public function getId(): int;

    /**
     * @return string
     */
    public function getFeedback(): string;

    /**
     * @return int
     */
    public function getCorrectness(): int;

    /**
     * @return int
     */
    public function getScore(): int;

    /**
     * @return Question
     */
    public function getQuestion(): Question;
}