<?php
declare(strict_types=1);

namespace QuizRunner\Contracts\Surveys;

/**
 * Interface Tag
 *
 * @package QuizRunner\Contracts\Surveys
 */
interface Tag
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
    public function getDescription(): string;

    /**
     * @return iterable|Survey[]
     */
    public function getSurveys(): iterable;
}