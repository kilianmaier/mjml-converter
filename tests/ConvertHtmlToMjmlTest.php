<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Schedulr\SimpleMjml\ConvertHtmlToMjml;

class ConvertHtmlToMjmlTest extends TestCase
{
    public function testConvert()
    {
        $convert = ConvertHtmlToMjml::create();

        $html = "<p>this is content</p>";
        $styles = "p { color: green !important; }";
        $emailHtml = $convert($html, $styles);

        $this->assertStringContainsString('this is content', $emailHtml);
        $this->assertStringContainsString('green !important', $emailHtml);
        $this->assertStringContainsString('doctype', $emailHtml);
    }
}