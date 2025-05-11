<?php
namespace App\Model;

class Product
{
    public string $id;
    public string $name;
    public string $description;
    /** @var string[] */
    public array $specifications;
    public string $additional;
    public string $photo;

    public function __construct(
        string $id,
        string $name,
        string $description,
        array $specifications = [],
        string $additional = '',
        string $photo = ''
    ) {
        $this->id             = $id;
        $this->name           = $name;
        $this->description    = $description;
        $this->specifications = $specifications;
        $this->additional     = $additional;
        $this->photo          = $photo;
    }

    /**
     * Создаёт экземпляр из массива (например, из JSON)
     */
    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'] ?? '',
            $data['name'] ?? '',
            $data['description'] ?? '',
            $data['specifications'] ?? [],
            $data['additional'] ?? ($data['additional_info'] ?? ''),
            $data['photo'] ?? ''
        );
    }

    /**
     * Преобразует объект в массив для сохранения в JSON
     */
    public function toArray(): array
    {
        return [
            'id'             => $this->id,
            'name'           => $this->name,
            'description'    => $this->description,
            'specifications' => $this->specifications,
            'additional'     => $this->additional,
            'photo'          => $this->photo,
        ];
    }
}
