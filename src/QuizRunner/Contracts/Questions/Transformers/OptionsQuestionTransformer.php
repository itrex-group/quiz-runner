<?php
declare(strict_types=1);

namespace QuizRunner\Contracts\Questions\Transformers;

use QuizRunner\Transformers\Transformer;

/**
 * Interface OptionsQuestionTransformer
 */
interface OptionsQuestionTransformer
{
    /**
     * @return Transformer
     */
    public function getOptionTransformer(): Transformer;
}