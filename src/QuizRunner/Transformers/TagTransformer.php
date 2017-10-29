<?php
declare(strict_types=1);

namespace QuizRunner\Transformers;

/**
 * Class TagTransformer
 *
 * @package QuizRunner\Transformers
 */
class TagTransformer extends Transformer
{
    /**
     * @phpcsSuppress SlevomatCodingStandard.TypeHints.TypeHintDeclaration.MissingParameterTypeHint
     * @param \QuizRunner\Contracts\Surveys\Tag $item
     * @return array
     */
    public function transform($item): array
    {
        return [
            'id' => $item->getId(),
            'name' => $item->getName(),
            'description' => $item->getDescription(),
        ];
    }
}