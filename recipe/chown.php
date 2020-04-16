<?php

namespace Deployer;

task('chown:www-data', fn() => run("chown -R www-data:www-data {{deploy_path}}"));

