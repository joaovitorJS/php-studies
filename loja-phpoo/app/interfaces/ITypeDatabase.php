<?php

namespace App\Interfaces;

interface ITypeDatabase
{
    public function prepare(string $sql): ITypeDatabase;

    public function bindValue(int|string $key, mixed $value): ITypeDatabase;

    public function execute(): ITypeDatabase;

    public function rowCount(): int;

    public function fetch(): mixed;

    public function fetchAll(): array;
}