<?php

namespace Deployer;

task('pm2:restart:laravel-example-echo', fn() => run("pm2 restart laravel-example-echo"));
