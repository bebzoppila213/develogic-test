<?php

class PlaymentCard implements IPlaymentCard
{
    private Counterparty $payer;
    private Counterparty $recipient;
    private string $date;
    private int $sum;
    private string $purposePayment;

    public function getInfo()
    {
    }

    public function setField(string $field, string $value)
    {
        if (in_array($field, ['date', 'sum', 'purposePayment'])) {
            $this->$field = $value;
        }
        return $this;
    }

    public function addPayer(ICounterparty $payer)
    {
        $this->payer = $payer;
        return $this;
    }

    public function addRecipient(ICounterparty $recipient)
    {
        $this->recipient = $recipient;
        return $this;
    }
}
