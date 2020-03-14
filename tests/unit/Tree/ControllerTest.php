<?php
declare(strict_types=1);

/**
 * Tests the TreeNode controller functionality
 */
class ControllerTest extends TestCase
{
    /**
     * Tests that the GET tree method returns the expected
     *
     * @return void
     */
    public function testGet()
    {
        $this->get('/tree');

        $this->assertEquals(
            json_encode([
                new \App\Tree\TreeNode(1, 'Languages', null, [
                    new \App\Tree\TreeNode(2, 'Indo-European', 1, [
                        new \App\Tree\TreeNode(3, 'European', 2, [
                            new \App\Tree\TreeNode(4, 'Baltic', 3, [
                                new \App\Tree\TreeNode(5, 'Lithuanian', 4),
                                new \App\Tree\TreeNode(6, 'Latvian', 4),
                            ]),
                            new \App\Tree\TreeNode(7, 'Slavic', 3, [
                                new \App\Tree\TreeNode(8, 'Russian', 7)
                            ])
                        ])
                    ]),
                ]),
                new \App\Tree\TreeNode(9, 'Uralic')
            ]),
            $this->response->getContent()
        );
    }
}
