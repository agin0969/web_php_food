<?
class Product {
    private int $id;
    private string $name;
    private int $category_id;
    private float $price;
    private string $image;

    private string  $description;

    public function __construct(int $id, string $name, int $category_id, float $price, string $image,  string $description) {
        $this->id = $id;
        $this->name = $name;
        $this->category_id = $category_id;
        $this->price = $price;
        $this->image = $image;
        $this->description=$description;
    }

    public function getId(): int {
        return $this->id;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function setName(string $name): void {
        $this->name = $name;
    }

    public function getCategoryId(): int {
        return $this->category_id;
    }

    public function setCategoryId(int $category_id): void {
        $this->category_id = $category_id;
    }

    public function getPrice(): float {
        return $this->price;
    }

    public function setPrice(float $price): void {
        $this->price = $price;
    }

    public function getImage(): ?string {
        return $this->image;
    }

    public function setImage(?string $image): void {
        $this->image = $image;
    }

    public function getDescription(): string {
    return $this->name;
}

    public function setDescription(string $name): void {
    $this->name = $name;
}
}