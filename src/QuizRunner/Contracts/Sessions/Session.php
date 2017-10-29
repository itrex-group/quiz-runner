<?php
declare(strict_types=1);

namespace QuizRunner\Contracts\Sessions;

use DateTime;
use QuizRunner\Contracts\Surveys\Survey;
use QuizRunner\Contracts\Users\Respondent;

/**
 * Interface Session
 *
 * @package QuizRunner\Contracts\Sessions
 */
interface Session
{
    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @return DateTime
     */
    public function getCreatedAt(): DateTime;

    /**
     * @return DateTime
     */
    public function getEndedAt(): DateTime;

    /**
     * @return Respondent
     */
    public function getRespondent(): Respondent;

    /**
     * @return Survey
     */
    public function getSurvey(): Survey;

    /**
     * @return iterable
     */
    public function getAnswers(): iterable;
}