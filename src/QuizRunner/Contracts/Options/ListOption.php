<?php
declare(strict_types=1);

namespace QuizRunner\Contracts\Options;

/**
 * Interface Option
 *
 * @package QuizRunner\Contracts\Questions
 */
interface ListOption extends Option
{
    /**
     * @return string
     */
    public function getTitle(): string;

    /**
     * You can sort options using this value.
     *
     * @return int
     */
    public function getOrder(): int;

    /**
     * Determines if this option assumes free text input.
     *
     * @return bool
     */
    public function isInput(): bool;
}