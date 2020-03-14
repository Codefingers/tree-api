<?php
declare(strict_types=1);

use App\Tree;

/**
 * Tests Tree parsing  functionality
 */
class TreeParserTest extends TestCase
{
    /**
     * Tests that the build method returns the expected
     *
     * @param Tree\TreeNode[] $tree Tree to parse
     * @param Tree\TreeNode[] $expected Expected parsed tree
     *
     * @return void
     * @dataProvider dataBuild
     */
    public function testBuild(array $tree, array $expected)
    {
        $treeParser = new Tree\TreeParser();

        $this->assertEquals(
            $expected,
            $treeParser->build($tree)
        );
    }

    /**
     * Dataprovider for testBuild
     *
     * @return array
     */
    public function dataBuild(): array
    {
        return [
            'Empty tree' => [
                'tree' => [],
                'expected' => [],
            ],
            'Single parent' => [
                'tree' => [
                    new Tree\TreeNode(1, 'Lonely')
                ],
                'expected' => [
                    new Tree\TreeNode(1, 'Lonely')
                ],
            ],
            'Multiple childless parents' => [
                'tree' => [
                    new Tree\TreeNode(1, 'Lonely Dad'),
                    new Tree\TreeNode(2, 'Lonely Mum')
                ],
                'expected' => [
                    new Tree\TreeNode(1, 'Lonely Dad'),
                    new Tree\TreeNode(2, 'Lonely Mum'),
                ],
            ],
            'One long branch' => [
                'tree' => [
                    new Tree\TreeNode(1, 'Great Grand Mother'),
                    new Tree\TreeNode(2, 'Grand Mother', 1),
                    new Tree\TreeNode(3, 'Mother', 2),
                    new Tree\TreeNode(4, 'Daughter', 3),
                    new Tree\TreeNode(5, 'Grand Daughter', 4),
                    new Tree\TreeNode(6, 'Great Grand Daughter', 5),
                ],
                'expected' => [
                    new Tree\TreeNode(1, 'Great Grand Mother', null, [
                        new Tree\TreeNode(2, 'Grand Mother', 1, [
                            new Tree\TreeNode(3, 'Mother', 2, [
                                new Tree\TreeNode(4, 'Daughter', 3, [
                                    new Tree\TreeNode(5, 'Grand Daughter', 4, [
                                        new Tree\TreeNode(6, 'Great Grand Daughter', 5)
                                    ])
                                ])
                            ])
                        ])
                    ]),
                ],
            ],
            'One long branch and a 1 child parent' => [
                'tree' => [
                    new Tree\TreeNode(1, 'Great Grand Mother'),
                    new Tree\TreeNode(2, 'Grand Mother', 1),
                    new Tree\TreeNode(3, 'Mother', 2),
                    new Tree\TreeNode(4, 'Daughter', 3),
                    new Tree\TreeNode(5, 'Grand Daughter', 4),
                    new Tree\TreeNode(6, 'Great Grand Daughter', 5),
                    new Tree\TreeNode(7, 'Uncle'),
                ],
                'expected' => [
                    new Tree\TreeNode(1, 'Great Grand Mother', null, [
                        new Tree\TreeNode(2, 'Grand Mother', 1, [
                            new Tree\TreeNode(3, 'Mother', 2, [
                                new Tree\TreeNode(4, 'Daughter', 3, [
                                    new Tree\TreeNode(5, 'Grand Daughter', 4, [
                                        new Tree\TreeNode(6, 'Great Grand Daughter', 5)
                                    ])
                                ])
                            ])
                        ])
                    ]),
                    new Tree\TreeNode(7, 'Uncle'),
                ],
            ],
        ];
    }
}
