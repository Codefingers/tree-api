<?php
declare(strict_types = 1);

namespace App\Tree;

/**
 * Responsible for parsing trees
 */
class TreeParser
{
    /**
     * Builds a tree
     *
     * @param TreeNode[] $tree     Tree to build data from
     * @param int|null   $parentId Parent to build tree for
     *
     * @return array
     */
    public function build(array $tree, ?int $parentId = null): array
    {
        if (!$tree) {
            return [];
        }

        $branch = [];
        foreach ($tree as $node) {
            // skip branch if the nodes parent is not equal to the current parent id
            if ($node->getParent() !== $parentId) {
                continue;
            }

            $children = $this->build($tree, $node->getId());
            $node = $node->withChildren($children);
            $branch[] = $node;
            unset($node);
        }

        return $branch;
    }
}
