<?php

namespace Schedulr\SimpleMjml;

use Symfony\Component\Process\Process;

class YarnInstall
{
	public function run()
	{
        (new Process(['yarn'], __DIR__ . '/..'))->mustRun();
	}
}
