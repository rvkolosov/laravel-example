<?php

namespace App\Reports;

use koolreport\KoolReport;
use koolreport\laravel\Friendship;

class TmpReport extends KoolReport
{
    use Friendship;

    /**
     * @return null|void
     * @throws \Exception
     */
    function setup()
    {
        $this->src('mysql')
            ->query("SELECT * FROM todos")
            ->pipe($this->dataStore('todos'));
    }
}
