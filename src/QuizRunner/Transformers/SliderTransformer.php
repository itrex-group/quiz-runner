<?php
declare(strict_types=1);

namespace QuizRunner\Transformers;

/**
 * Class SliderTransformer
 *
 * @package QuizRunner\Transformers
 */
class SliderTransformer extends SingleChoiceTransformer
{
    /**
     * @phpcsSuppress SlevomatCodingStandard.TypeHints.TypeHintDeclaration.MissingParameterTypeHint
     * @param \QuizRunner\Contracts\Questions\SliderQuestion $item
     * @return array
     */
    public function transform($item): array
    {
        $result = [
            'minValue' => $item->getMinValue(),
            'maxValue' => $item->getMaxValue(),
            'defaultValue' => $item->getDefaultValue(),
            'stepValue' => $item->getStepValue(),
        ];

        return array_merge($result, parent::transform($item));
    }
}