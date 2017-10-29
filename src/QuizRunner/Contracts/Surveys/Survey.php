<?php
declare(strict_types=1);

namespace QuizRunner\Contracts\Surveys;

/**
 * Interface Survey
 *
 * @package QuizRunner\Contracts\Surveys
 */
interface Survey
{
    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @return string
     */
    public function getTitle(): string;

    /**
     * @return string
     */
    public function getDescription(): string;

    /**
     * @return iterable|\QuizRunner\Contracts\Questions\Question[]
     */
    public function getQuestions(): iterable;

    /**
     * @return iterable|Tag[]
     */
    public function getTags(): iterable;

    /**
     * Time limit in seconds (positive integer). If 0, it means that survey does not have a time limit.
     *
     * @return int
     */
    public function getTimeLimit(): int;

    /**
     * @return int
     */
    public function getStatus(): int;
}