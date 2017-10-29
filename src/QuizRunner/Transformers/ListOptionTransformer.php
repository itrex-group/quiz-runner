<?php
declare(strict_types=1);

namespace QuizRunner\Transformers;

/**
 * Class ListOptionTransformer
 *
 * @package QuizRunner\Transformers
 */
class ListOptionTransformer extends QuestionOptionTransformer
{
    /**
     * @phpcsSuppress SlevomatCodingStandard.TypeHints.TypeHintDeclaration.MissingParameterTypeHint
     * @param \QuizRunner\Contracts\Options\ListOption $item
     * @return array
     */
    public function transform($item): array
    {
        $result = [
            'title' => $item->getTitle(),
            'order' => $item->getOrder(),
            'isInput' => $item->isInput(),
        ];

        return array_merge($result, parent::transform($item));
    }
}