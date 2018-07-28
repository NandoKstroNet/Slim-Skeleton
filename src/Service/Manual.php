<?php

namespace Service;

use Michelf\Markdown;
use Michelf\MarkdownExtra;

class Manual {
    protected $templateFile;

    public function __construct($templateFile)
    {
        $this->templateFile = $templateFile;
    }
    public function parse($contentFile)
    {
        $template = file_get_contents($this->templateFile);
        $content = file_get_contents($contentFile);
        $timestamp = filemtime($contentFile);
        $content = str_replace(
            '{{rev}}',
            date('Y-m-d H:i:s', $timestamp),
            $content
        );
        $html_content = MarkdownExtra::defaultTransform($content);
        $manual = str_replace('{{content}}', $html_content, $template);

        return $manual;
    }
}
