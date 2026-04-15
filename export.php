<?php
require_once 'config.php';
require_once 'vendor/autoload.php';
session_start();

if (empty($_SESSION['admin'])) {
    http_response_code(403);
    exit('Akses ditolak.');
}

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;

$type = $_GET['type'] ?? 'kehadiran';
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$headerStyle = [
    'font'      => ['bold' => true, 'color' => ['rgb' => 'FFFFFF'], 'size' => 11],
    'fill'      => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => 'A64786']],
    'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::VERTICAL_CENTER],
    'borders'   => ['allBorders' => ['borderStyle' => Border::BORDER_THIN, 'color' => ['rgb' => 'D0A0C8']]],
];

$rowStyle = [
    'borders'   => ['allBorders' => ['borderStyle' => Border::BORDER_THIN, 'color' => ['rgb' => 'EDD0E8']]],
    'alignment' => ['vertical' => Alignment::VERTICAL_CENTER],
];

// helper: set cell by col index (1-based) and row
function setCell($sheet, $col, $row, $value) {
    $sheet->setCellValue(Coordinate::stringFromColumnIndex($col) . $row, $value);
}

if ($type === 'tamu') {
    $list     = array_reverse(getTamu());
    $filename = 'Tamu-Grand-Opening.xlsx';
    $sheet->setTitle('Tamu Terdaftar');

    $sheet->mergeCells('A1:D1');
    $sheet->setCellValue('A1', 'Data Tamu Terdaftar – Grand Opening Apotek Parahyangan Suite');
    $sheet->getStyle('A1')->applyFromArray([
        'font'      => ['bold' => true, 'size' => 13, 'color' => ['rgb' => 'A64786']],
        'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
    ]);
    $sheet->getRowDimension(1)->setRowHeight(28);

    foreach (['No', 'Nama', 'No. WhatsApp', 'Waktu Daftar'] as $col => $h) {
        setCell($sheet, $col + 1, 2, $h);
    }
    $sheet->getStyle('A2:D2')->applyFromArray($headerStyle);
    $sheet->getRowDimension(2)->setRowHeight(22);

    foreach ($list as $i => $t) {
        $row = $i + 3;
        setCell($sheet, 1, $row, $i + 1);
        setCell($sheet, 2, $row, $t['name']);
        setCell($sheet, 3, $row, $t['phone']);
        setCell($sheet, 4, $row, $t['time']);
        $sheet->getStyle("A{$row}:D{$row}")->applyFromArray($rowStyle);
        if ($i % 2 === 1) {
            $sheet->getStyle("A{$row}:D{$row}")->applyFromArray([
                'fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => 'FDF4FA']],
            ]);
        }
        $sheet->getRowDimension($row)->setRowHeight(20);
    }

    $sheet->getColumnDimension('A')->setWidth(6);
    $sheet->getColumnDimension('B')->setWidth(30);
    $sheet->getColumnDimension('C')->setWidth(22);
    $sheet->getColumnDimension('D')->setWidth(22);

} elseif ($type === 'ucapan') {    $list     = array_reverse(getWishes());
    $filename = 'Ucapan-Grand-Opening.xlsx';
    $sheet->setTitle('Ucapan & Doa');

    $sheet->mergeCells('A1:D1');
    $sheet->setCellValue('A1', 'Data Ucapan & Doa – Grand Opening Apotek Parahyangan Suite');
    $sheet->getStyle('A1')->applyFromArray([
        'font'      => ['bold' => true, 'size' => 13, 'color' => ['rgb' => 'A64786']],
        'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
    ]);
    $sheet->getRowDimension(1)->setRowHeight(28);

    foreach (['No', 'Nama', 'Ucapan / Doa', 'Waktu'] as $col => $h) {
        setCell($sheet, $col + 1, 2, $h);
    }
    $sheet->getStyle('A2:D2')->applyFromArray($headerStyle);
    $sheet->getRowDimension(2)->setRowHeight(22);

    foreach ($list as $i => $w) {
        $row = $i + 3;
        setCell($sheet, 1, $row, $i + 1);
        setCell($sheet, 2, $row, $w['name']);
        setCell($sheet, 3, $row, $w['message']);
        setCell($sheet, 4, $row, $w['time']);
        $sheet->getStyle("A{$row}:D{$row}")->applyFromArray($rowStyle);
        if ($i % 2 === 1) {
            $sheet->getStyle("A{$row}:D{$row}")->applyFromArray([
                'fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => 'FDF4FA']],
            ]);
        }
        $sheet->getRowDimension($row)->setRowHeight(20);
    }

    $sheet->getColumnDimension('A')->setWidth(6);
    $sheet->getColumnDimension('B')->setWidth(28);
    $sheet->getColumnDimension('C')->setWidth(55);
    $sheet->getColumnDimension('D')->setWidth(22);
    $lastRow = count($list) + 2;
    if ($lastRow >= 3) {
        $sheet->getStyle("C3:C{$lastRow}")->getAlignment()->setWrapText(true);
    }

} else {
    $list     = getRsvp();
    $filename = 'Kehadiran-Grand-Opening.xlsx';
    $sheet->setTitle('Konfirmasi Kehadiran');

    $sheet->mergeCells('A1:F1');
    $sheet->setCellValue('A1', 'Data Konfirmasi Kehadiran – Grand Opening Apotek Parahyangan Suite');
    $sheet->getStyle('A1')->applyFromArray([
        'font'      => ['bold' => true, 'size' => 13, 'color' => ['rgb' => 'A64786']],
        'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
    ]);
    $sheet->getRowDimension(1)->setRowHeight(28);

    foreach (['No', 'Nama', 'No. HP', 'Kehadiran', 'Jumlah Tamu', 'Waktu'] as $col => $h) {
        setCell($sheet, $col + 1, 2, $h);
    }
    $sheet->getStyle('A2:F2')->applyFromArray($headerStyle);
    $sheet->getRowDimension(2)->setRowHeight(22);

    $reversed = array_reverse($list);
    foreach ($reversed as $i => $r) {
        $row = $i + 3;
        setCell($sheet, 1, $row, count($list) - $i);
        setCell($sheet, 2, $row, $r['name']);
        setCell($sheet, 3, $row, $r['phone'] ?: '-');
        setCell($sheet, 4, $row, $r['attendance'] === 'hadir' ? 'Hadir' : 'Tidak Hadir');
        setCell($sheet, 5, $row, $r['attendance'] === 'hadir' ? (int)$r['guests'] : '-');
        setCell($sheet, 6, $row, $r['time']);
        $sheet->getStyle("A{$row}:F{$row}")->applyFromArray($rowStyle);
        if ($i % 2 === 1) {
            $sheet->getStyle("A{$row}:F{$row}")->applyFromArray([
                'fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => 'FDF4FA']],
            ]);
        }
        $color    = $r['attendance'] === 'hadir' ? 'E8F5E9' : 'FCE4E4';
        $txtColor = $r['attendance'] === 'hadir' ? '2E7D32' : 'C62828';
        $sheet->getStyle("D{$row}")->applyFromArray([
            'fill'      => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => $color]],
            'font'      => ['color' => ['rgb' => $txtColor], 'bold' => true],
            'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
        ]);
        $sheet->getRowDimension($row)->setRowHeight(20);
    }

    $sheet->getColumnDimension('A')->setWidth(6);
    $sheet->getColumnDimension('B')->setWidth(30);
    $sheet->getColumnDimension('C')->setWidth(20);
    $sheet->getColumnDimension('D')->setWidth(18);
    $sheet->getColumnDimension('E')->setWidth(16);
    $sheet->getColumnDimension('F')->setWidth(22);
}

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="' . $filename . '"');
header('Cache-Control: max-age=0');

(new Xlsx($spreadsheet))->save('php://output');
exit;
