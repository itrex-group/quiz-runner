<?php
declare(strict_types=1);

namespace QuizRunner\Models;

/**
 * Class QuestionType
 *
 * @package QuizRunner\Models
 */
class QuestionType implements \QuizRunner\Contracts\Questions\QuestionType
{
    const SINGLE_CHOICE = 1;
    const MULTIPLE_CHOICE = 2;
    const DROPDOWN = 3;
    const SINGLE_LINE_INPUT = 4;
    const MULTI_LINE_INPUT = 5;
    const SLIDER = 6;

    const GROUP_FREE_INPUT = 1;
    const GROUP_OPTIONS = 2;


    /**
     * @var array
     */
    public static $listTypes = [
        self::SINGLE_CHOICE,
        self::MULTIPLE_CHOICE,
        self::DROPDOWN,
    ];

    /**
     * @var array
     */
    public static $types = [
        self::SINGLE_CHOICE => [
            'name' => 'Single choice',
            'key' => 'SingleChoice',
            'group' => self::GROUP_OPTIONS
        ],
        self::MULTIPLE_CHOICE => [
            'name' => 'Multiple choice',
            'key' => 'MultipleChoice',
            'group' => self::GROUP_OPTIONS
        ],
        self::MULTI_LINE_INPUT => [
            'name' => 'Open text',
            'key' => 'MultiLine',
            'group' => self::GROUP_FREE_INPUT
        ],
    ];


    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $key;

    /**
     * @var int
     */
    private $group;


    /**
     * @param int $type
     * @return QuestionType
     */
    public static function make(int $type): self
    {
        $data = static::$types[$type];

        return new static($type, $data['name'], $data['key'], $data['group']);
    }

    /**
     * @param int $group
     * @return array
     */
    public static function findByGroup(int $group): array
    {
        return array_filter(static::$types, function ($type) use ($group) {
            return $type['group'] === $group;
        });
    }


    /**
     * QuestionType constructor.
     *
     * @param int $id
     * @param string $name
     * @param string $key
     * @param int $group
     */
    public function __construct(int $id, string $name, string $key, int $group)
    {
        $this->id = $id;
        $this->name = $name;
        $this->key = $key;
        $this->group = $group;
    }


    /*
    |--------------------------------------------------------------------------
    |  QuestionType interface
    |--------------------------------------------------------------------------
    */

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @return int
     */
    public function getGroup(): int
    {
        return $this->group;
    }
}