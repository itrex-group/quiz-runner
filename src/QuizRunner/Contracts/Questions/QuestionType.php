<?php
declare(strict_types=1);

namespace QuizRunner\Contracts\Questions;

/**
 * Interface QuestionType
 *
 * @package QuizRunner\Contracts\Questions
 */
interface QuestionType
{
    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return string
     */
    public function getKey(): string;

    /**
     * @return int
     */
    public function getGroup(): int;
}