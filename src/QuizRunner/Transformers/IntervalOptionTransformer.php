<?php
declare(strict_types=1);

namespace QuizRunner\Transformers;

/**
 * Class IntervalOptionTransformer
 *
 * @package QuizRunner\Transformers
 */
class IntervalOptionTransformer extends QuestionOptionTransformer
{
    /**
     * @phpcsSuppress SlevomatCodingStandard.TypeHints.TypeHintDeclaration.MissingParameterTypeHint
     * @param \QuizRunner\Contracts\Options\IntervalOption $item
     * @return array
     */
    public function transform($item): array
    {
        $result = [
            'minValue' => $item->getMinValue(),
            'maxValue' => $item->getMaxValue(),
        ];

        return array_merge($result, parent::transform($item));
    }
}