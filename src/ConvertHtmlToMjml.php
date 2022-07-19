<?php

namespace Schedulr\SimpleMjml;

use Symfony\Component\Process\Process;

class ConvertHtmlToMjml
{
    private string $mjmlBinPath;

    public static function create(): self
    {
        return new static(__DIR__ . '/../node_modules/.bin/mjml');
    }

    public function __construct(string $mjmlBinPath)
    {
        $this->mjmlBinPath = $mjmlBinPath;
    }

    public function __invoke(string $html, string $styles = ""): string
    {
        $process = new Process([
            $this->mjmlBinPath, // most probably = ./node_modules/.bin/mjml
            '-i', // read data from stdin
            '-s', // output result to stdout
        ]);

        $process->setInput($this->wrapWithMjmlTags($html, $styles));
        $process->mustRun();

        return $process->getOutput();
    }

    private function wrapWithMjmlTags(string $html, string $styles = ""): string
    {
        return "<mjml><mj-head><mj-style>{$styles}</mj-style></mj-head><mj-body><mj-raw>{$html}</mj-raw></mj-body></mjml>";
    }
}