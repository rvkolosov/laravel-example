<?php

namespace Deployer;

task('artisan:migrate:relations', artisan('migrate --path=database/migrations/relations'));
