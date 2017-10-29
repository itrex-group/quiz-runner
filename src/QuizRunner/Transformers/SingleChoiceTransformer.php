<?php
declare(strict_types=1);

namespace QuizRunner\Transformers;

use QuizRunner\Contracts\Questions\Transformers\OptionsQuestionTransformer;

/**
 * Class SingleChoiceTransformer
 *
 * @package QuizRunner\Transformers
 */
class SingleChoiceTransformer extends Transformer implements OptionsQuestionTransformer
{
    /**
     * @var ListOptionTransformer|Transformer
     */
    private $optionTransformer;

    /**
     * @var QuestionTransformer
     */
    private $questionTransformer;


    /**
     * SingleChoiceTransformer constructor.
     *
     * @param QuestionTransformer $questionTransformer
     * @param Transformer|null $optionTransformer
     */
    public function __construct(QuestionTransformer $questionTransformer, ?Transformer $optionTransformer = null)
    {
        $this->optionTransformer = $optionTransformer ?? new ListOptionTransformer();
        $this->questionTransformer = $questionTransformer ?? new QuestionTransformer();
    }

    /**
     * @phpcsSuppress SlevomatCodingStandard.TypeHints.TypeHintDeclaration.MissingParameterTypeHint
     * @param \QuizRunner\Contracts\Questions\OptionsQuestion $item
     * @return array
     */
    public function transform($item): array
    {
        $result = [
            'options' => $this->getOptionTransformer()->transformCollection($item->getOptions()),
        ];

        return array_merge($result, $this->questionTransformer->transform($item));
    }

    /**
     * @return Transformer
     */
    public function getOptionTransformer(): Transformer
    {
        return $this->optionTransformer;
    }
}