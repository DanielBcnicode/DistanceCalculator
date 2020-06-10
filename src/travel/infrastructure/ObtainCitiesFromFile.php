<?php

declare(strict_types=1);

namespace Console\travel\infrastructure;

use Console\travel\domain\CitiesSourceNotFound;
use Console\travel\domain\ObtainCities;
use Console\travel\domain\ParseFileError;

class ObtainCitiesFromFile implements ObtainCities
{
    /**
     * @throws CitiesSourceNotFound
     * @throws ParseFileError
     */
    public function run(string $source): array
    {
        if (!file_exists($source)) {
            throw new CitiesSourceNotFound("File $source not found");
        }
        $contentString = file_get_contents($source);

        return $this->parseString($contentString);
    }

    /**
     * @throws ParseFileError
     */
    private function parseString(string $contentString)
    {
        $values = [];
        $lines = explode("\n", $contentString);
        foreach ($lines as $line) {
            if (trim($line) > "") {
                $values[] = $this->ParseLine($line);
            }
        }
        return $values;
    }

    /**
     * @throws ParseFileError
     */
    private function ParseLine($line): array
    {
        $items = explode("\t", $line);
        if (count($items) != 3) {
            throw new ParseFileError(count($items) . "- $line");
        }
        return ['Name' => $items[0], 'Lat' => $items[1], 'Lon' => $items[2]];
    }

}
