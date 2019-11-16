<?php

class Write implements WriteInterface
{
    private $_csv_file = null;

    /**
     * @param string $csv_file  - путь до csv-файла
     */
    public function __construct($csv_file)
    {
        if (file_exists($csv_file)) {
            $this->_csv_file = $csv_file;
        } else {
            die("Файл  не найден");
        }

        $info = new SplFileInfo($this->_csv_file);
        $fileInfo = $info->getExtension();

        if ($fileInfo != 'csv') {
            die("Не верный формат файла,файл должен быть формата .csv!");
        }
    }

    public function setCSV($csv) {
        $handle = fopen($this->_csv_file, "a+");

        foreach ($csv as $value) {
            fputcsv($handle, $value,';');
        }
        fclose($handle);
    }
}
