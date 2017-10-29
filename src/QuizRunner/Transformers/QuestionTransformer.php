<?php
declare(strict_types=1);

namespace QuizRunner\Transformers;

/**
 * Class QuestionTransformer
 *
 * @package QuizRunner\Transformers
 */
class QuestionTransformer extends Transformer
{
    /**
     * @phpcsSuppress SlevomatCodingStandard.TypeHints.TypeHintDeclaration.MissingParameterTypeHint
     * @param \QuizRunner\Contracts\Questions\Question $item
     * @return array
     */
    public function transform($item): array
    {
        return [
            'id' => $item->getId(),
            'text' => $item->getText(),
            'hint' => $item->getHint(),
            'type' => [
                'id' => $item->getType()->getId(),
                'key' => $item->getType()->getKey(),
            ],
            'feedback' => $item->getFeedback(),
        ];
    }
}