<?php
declare(strict_types=1);

namespace App\Tree;

/**
 * Representation of a tree
 */
class TreeNode implements \JsonSerializable
{
    /** @var int Unique identifier */
    private int $id;

    /** @var string Name of tree */
    private string $name;

    /** @var int|null Parent id (Optional) */
    private ?int $parentId;

    /** @var TreeNode[] Children */
    private array $children;

    /**
     * Constructor.
     *
     * @param int        $id       Unique identifier
     * @param string     $name     Name of tree
     * @param int|null   $parentId Parent if applicable
     * @param TreeNode[] $children Children of tree
     */
    public function __construct(int $id, string $name, ?int $parentId = null, array $children = [])
    {
        $this->id = $id;
        $this->name = $name;
        $this->parentId = $parentId;
        $this->children = $children;
    }

    /**
     * Returns the tree id
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Returns the tree name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Returns parent of the node
     *
     * @return int | null
     */
    public function getParent(): ?int
    {
        return $this->parentId;
    }

    /**
     * Returns children of the node
     *
     * @return TreeNode[]
     */
    public function getChildren(): array
    {
        return $this->children;
    }

    /**
     * Returns a new instance of TreeNode with children
     *
     * @param TreeNode[] $children Children to create a new tree node with
     *
     * @return TreeNode
     */
    public function withChildren(array $children): self {
        return new self(
            $this->id,
            $this->name,
            $this->parentId,
            $children
        );
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'parentId' => $this->parentId,
            'children' => $this->children,
        ];
    }
}
