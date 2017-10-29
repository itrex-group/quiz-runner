<?php
declare(strict_types=1);

namespace QuizRunner\Contracts\Answers;

use DateTime;
use QuizRunner\Contracts\Questions\Question;
use QuizRunner\Contracts\Sessions\Session;

/**
 * Interface Answer
 *
 * @package QuizRunner\Contracts\Answers
 */
interface Answer
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
     * @return Question
     */
    public function getQuestion(): Question;

    /**
     * @return Session
     */
    public function getSession(): Session;
}