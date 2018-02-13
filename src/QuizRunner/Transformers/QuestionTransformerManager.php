<?php
declare(strict_types=1);

namespace QuizRunner\Transformers;

use QuizRunner\Contracts\Questions\Transformers\OptionsQuestionTransformer;
use ReflectionClass;

/**
 * Class QuestionTransformerManager
 *
 * @package QuizRunner\Transformers
 */
class QuestionTransformerManager extends Transformer
{
    /**
     * @var Transformer[]
     */
    protected $transformers = [];

    /**
     * @var Transformer
     */
    protected $optionTransformer;

    /**
     * @var array
     */
    protected $transformersNamespaces = [];


    /**
     * @phpcsSuppress SlevomatCodingStandard.TypeHints.TypeHintDeclaration.MissingParameterTypeHint
     * @param \QuizRunner\Contracts\Questions\Question $item
     * @return array
     */
    public function transform($item): array
    {
        $name = $item->getType()->getKey();
        $transformer = $this->transformers[$name] ?? null;

        if ($transformer === null) {
            $class = $this->findCustomTransformer($name);
            $classReflection = new ReflectionClass($class);

            $params = [];
            if ($classReflection->hasMethod('__construct')) {
                foreach ($classReflection->getMethod('__construct')->getParameters() as $index => $parameter) {
                    $typeHintedClass = $parameter->getClass();

                    if ($typeHintedClass !== null) {
                        if (
                            $classReflection->implementsInterface(OptionsQuestionTransformer::class)
                            && $typeHintedClass->getName() === Transformer::class // TODO: refactor this
                        ) {
                            $params[$index] = $this->optionTransformer;
                        } else {
                            $injectedClass = $this->findCustomTransformer(preg_replace('#Transformer$#', '',
                                $typeHintedClass->getShortName()));
                            $params[$index] = new $injectedClass;
                        }
                    }
                }
            }

            $transformer = new $class(... $params);

            $this->transformers[$name] = $transformer;
        }

        return $transformer->transform($item);
    }

    /**
     * @param Transformer $transformer
     * @return $this
     */
    public function setOptionTransformer(Transformer $transformer): self
    {
        $this->optionTransformer = $transformer;

        return $this;
    }

    /**
     * @param array $namespaces
     * @return $this
     */
    public function setTransformersNamespaces(array $namespaces)
    {
        $this->transformersNamespaces = $namespaces;

        return $this;
    }

    /**
     * @param string $name
     * @return null|string
     */
    protected function findCustomTransformer(string $name): ?string
    {
        foreach ($this->transformersNamespaces as $path) {
            $class = rtrim($path, '\\') . '\\' . $name . 'Transformer';

            if (class_exists($class)) {
                return $class;
            }
        }

        return '\QuizRunner\Transformers\\' . $name . 'Transformer';
    }
}