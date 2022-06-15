<?php

namespace TY\CarChecker;

interface CheckerInterface
{
    public function history(): array;
    public function diagnostic(): array;
    public function restricted(): array;
    public function wanted(): array;
}