<?php
declare(strict_types=1);

namespace QuizRunner\Transformers;

use ReflectionClass;
use UnexpectedValueException;

/**
 * Class Transformer
 *
 * @package App\Transformers
 */
abstract class Transformer
{
    /**
     * @var ReflectionClass
     */
    private $reflection;


    /**
     * @param iterable $items
     * @return array
     */
    public function transformCollection(iterable $items): array
    {
        $result = [];
        foreach ($items as $item) {
            $result[] = $this->transform($item);
        }

        return $result;
    }

    /**
     * @param array $sections
     * @return Transformer|$this
     */
    public function with(array $sections): self
    {
        $this->switchSections($sections, true);

        return $this;
    }

    /**
     * @param array $sections
     * @return Transformer|$this
     */
    public function without(array $sections): self
    {
        $this->switchSections($sections, false);

        return $this;
    }

    /**
     * @param mixed $item
     * @return array
     */
    abstract public function transform($item): array;

    /**
     * @return ReflectionClass
     */
    private function getReflection(): ReflectionClass
    {
        if ($this->reflection !== null) {
            return $this->reflection;
        }

        $this->reflection = new ReflectionClass($this);

        return $this->reflection;
    }

    /**
     * @param array $sections
     * @param bool $value
     * @throws \UnexpectedValueException
     * @return void
     */
    private function switchSections(array $sections, bool $value): void
    {
        foreach ($sections as $section) {
            $property = 'with' . ucfirst($section);
            if (!$this->getReflection()->hasProperty($property)) {
                throw new UnexpectedValueException('Wrong section name: ' . $section);
            }

            $this->$property = $value;
        }
    }
}