<?php

class Counterparty implements ICounterparty
{
    private string $score;
    private string $inn;
    private string $name;
    private string $bic;
    private string $corScore;

    public function setField(string $field, string $value)
    {
        if (in_array($field, ['score', 'inn', 'name', 'bic', 'corScore'])) {
            $this->$field = $value;
        }
        return $this;
    }
}
