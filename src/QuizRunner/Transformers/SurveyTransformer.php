<?php
declare(strict_types=1);

namespace QuizRunner\Transformers;

/**
 * Class SurveyTransformer
 *
 * @package QuizRunner\Transformers
 */
class SurveyTransformer extends Transformer
{
    /**
     * @var Transformer
     */
    protected $questionManager;

    /**
     * @var bool
     */
    protected $withQuestions = false;


    /**
     * @phpcsSuppress SlevomatCodingStandard.TypeHints.TypeHintDeclaration.MissingParameterTypeHint
     * @param \QuizRunner\Contracts\Surveys\Survey $item
     * @return array
     */
    public function transform($item): array
    {
        $result = [
            'id' => $item->getId(),
            'title' => $item->getTitle(),
            'description' => $item->getDescription(),
            'tags' => (new TagTransformer)->transformCollection($item->getTags()),
            'timeLimit' => $item->getTimeLimit(),
        ];

        if ($this->withQuestions) {
            $result['questions'] = $this->questionManager->transformCollection($item->getQuestions());
        }

        return $result;
    }

    /**
     * @param Transformer $manager
     * @return $this
     */
    public function setQuestionManager(Transformer $manager): self
    {
        $this->questionManager = $manager;

        return $this;
    }
}