<?php

namespace Patterns\Observers;

interface Observer
{
    public function update(Subject $subject);
}
