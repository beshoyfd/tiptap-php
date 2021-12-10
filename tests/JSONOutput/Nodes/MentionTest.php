<?php

namespace Tiptap\Tests\JSONOutput\Nodes;

use Tiptap\Editor;
use Tiptap\Tests\JSONOutput\TestCase;

class MentionTest extends TestCase
{
    /** @test */
    public function user_mention_gets_rendered_correctly()
    {
        $html = '<p>Hey <span data-type="mention" data-id="123"></span>, was geht?</p>';

        $json = [
            'type' => 'doc',
            'content' => [
                [
                    'type' => 'paragraph',
                    'content' => [
                        [
                            'type' => 'text',
                            'text' => 'Hey ',
                        ],
                        [
                            'type' => 'user',
                            'attrs' => [
                                'id' => 123,
                            ],
                        ],
                        [
                            'type' => 'text',
                            'text' => ', was geht?',
                        ],
                    ],
                ],
            ],
        ];

        $this->assertEquals($json, (new Editor)->setContent($html)->getDocument());
    }
}