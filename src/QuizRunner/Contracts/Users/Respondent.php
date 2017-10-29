<?php
declare(strict_types=1);

namespace QuizRunner\Contracts\Users;

/**
 * Interface Respondent
 *
 * @package QuizRunner\Contracts\Users
 */
interface Respondent
{
    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @return iterable|\QuizRunner\Contracts\Surveys\Survey[]
     */
    public function getAssignedSurveys(): iterable;

    /**
     * @param \QuizRunner\Contracts\Surveys\Survey|int $survey
     * @return bool
     */
    public function canPlaySurvey($survey): bool;
}