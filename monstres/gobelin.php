<?php

include_once('monstre.php');

class Gobelin extends Monstre
{

    /**
     * Gobelin constructor.
     * @param int $level
     */
    public function __construct(int $level)
    {
        parent::__construct($level, 100, 65, 0.33, 3.33, 3.35, 0.15, 1.5);
    }
}
