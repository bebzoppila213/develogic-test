<?php

class Parser implements IParser
{

    private array $playmentCards = [];
    private array $allPlaymentData = [];
    const PLAYMENT_CARD_FIELDS = ["Дата" => 'date', "Сумма" => 'sum', "ПлательщикСчет" => 'purposePayment'];
    const COUNTERPARTY_FIELDS = ["Счет" => "score", "ИНН" => "inn", "КПП" => "name", "БИК" => "bic", "Корсчет" => "corScore"];
    const COUNTERPARTY_NAMES = ['payer' => "Плательщик", 'recipient' => "Получатель",];

    public function __construct(private string $filePath)
    {
    }

    public function parseFile()
    {
        $this->loadDataFormFile();
        $this->addDataPlaymentCard();
        return $this->playmentCards;
    }

    private function loadDataFormFile()
    {
        $lines = @file($this->filePath);
        $flag = false;
        $allItems = [];
        $indexItem = 0;
        foreach ($lines as $line) {

            if (str_contains($line, 'Платежное поручение')) {
                $flag = true;
            }

            if (str_contains($line, 'КонецДокумента')) {
                $flag = false;
                $indexItem += 1;
            }

            if ($flag) {
                $result = explode('=', $line);
                $allItems[$indexItem][$result[0]] = $result[1];
            }
        }
        $this->allPlaymentData = $allItems;
    }

    private function addDataPlaymentCard()
    {
        $playmentCard = new PlaymentCard();
        foreach ($this->allPlaymentData as $playmentItem) {
            foreach (self::PLAYMENT_CARD_FIELDS as $playmentvalue => $playmentKey) {
                $playmentCard->setField($playmentKey, $playmentItem[$playmentvalue]);
            }
            $playmentCard->addPayer($this->createCounterparty($playmentItem, self::COUNTERPARTY_NAMES['payer']));
            $playmentCard->addRecipient($this->createCounterparty($playmentItem, self::COUNTERPARTY_NAMES['recipient']));
            array_push($this->playmentCards, $playmentCard);
        }
    }

    private function createCounterparty($playmentItem, $cunterpartyName)
    {
        $counterparty = new Counterparty();
        foreach (self::COUNTERPARTY_FIELDS as $cunterpartyValue => $cunterpartyKey) {
            $playmentKey = $cunterpartyName . $cunterpartyValue;
            $counterparty->setField($cunterpartyKey, $playmentItem[$playmentKey]);
        }
        return $counterparty;
    }
}
