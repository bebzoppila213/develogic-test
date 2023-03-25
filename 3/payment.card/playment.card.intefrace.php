<?php

interface IPlaymentCard
{
    public function getInfo();

    public function setField(string $field, string $value);

    public function addPayer(ICounterparty $payer);

    public function addRecipient(ICounterparty $payer);
}
