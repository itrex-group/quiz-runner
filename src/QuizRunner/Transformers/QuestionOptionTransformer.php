<?php
declare(strict_types=1);

namespace QuizRunner\Transformers;

/**
 * Class QuestionOptionTransformer
 *
 * @package QuizRunner\Transformers
 */
class QuestionOptionTransformer extends Transformer
{
    /**
     * @phpcsSuppress SlevomatCodingStandard.TypeHints.TypeHintDeclaration.MissingParameterTypeHint
     * @param \QuizRunner\Contracts\Options\Option $item
     * @return array
     */
    public function transform($item): array
    {
        return [
            'id' => $item->getId(),
            'feedback' => $item->getFeedback(),
            'correctness' => $item->getCorrectness(),
            'score' => $item->getScore(),
        ];
    }
}