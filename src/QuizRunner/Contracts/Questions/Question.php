<?php
declare(strict_types=1);

namespace QuizRunner\Contracts\Questions;

/**
 * Interface Question
 *
 * @package QuizRunner\Question
 */
interface Question
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
    public function getText(): string;

    /**
     * @return QuestionType
     */
    public function getType(): QuestionType;

    /**
     * @return string
     */
    public function getHint(): string;

    /**
     * @return string
     */
    public function getFeedback(): string;

    /**
     * @return iterable|\QuizRunner\Contracts\Surveys\Survey[]
     */
    public function getSurveys(): iterable;
}