<?php

namespace Deployer;

task('chown:www-data', function () {
    run("chown -R www-data:www-data {{deploy_path}}");
});
