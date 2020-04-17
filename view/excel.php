<?php
     require '../model/PHPExcel/Classes/PHPExcel.php';
     require '../model/conexion.php';
     session_start();
     error_reporting(E_ALL);
     ini_set('display_errors', TRUE);
     ini_set('display_startup_errors', TRUE);
     date_default_timezone_set('Europe/London');
     define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
     date_default_timezone_set('America/Bogota');
     $t = time(); $h = date("H:i:s",$t); $f= date('Y-m-d');

     $fila=3;

     $objPHPExcel = new PHPExcel();
     $objPHPExcel->getProperties()->setCreator("Hogar Día")->setDescription("Reporte de Ingresos");

      $objPHPExcel->getActiveSheet()->getStyle('A2:K2')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK);
      $objPHPExcel->getActiveSheet()->getStyle('A2:K2')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
      $objPHPExcel->getActiveSheet()->getStyle('A2:K2')->getFill()->getStartColor()->setARGB('edeb2d');
      $objPHPExcel->getActiveSheet()->getStyle('M3:M7')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
      $objPHPExcel->getActiveSheet()->getStyle('M3:M7')->getFill()->getStartColor()->setARGB('35b142');
      $objPHPExcel->getActiveSheet()->getStyle('N2')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
      $objPHPExcel->getActiveSheet()->getStyle('N2')->getFill()->getStartColor()->setARGB('6401e2');
      $objPHPExcel->getActiveSheet()->getStyle('N9')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
      $objPHPExcel->getActiveSheet()->getStyle('N9')->getFill()->getStartColor()->setARGB('6401e2');
      $objPHPExcel->getActiveSheet()->getStyle('N13')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
      $objPHPExcel->getActiveSheet()->getStyle('N13')->getFill()->getStartColor()->setARGB('6401e2');
      $objPHPExcel->getActiveSheet()->getStyle('N19')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
      $objPHPExcel->getActiveSheet()->getStyle('N19')->getFill()->getStartColor()->setARGB('6401e2');
      $objPHPExcel->getActiveSheet()->getStyle('N26')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
      $objPHPExcel->getActiveSheet()->getStyle('N26')->getFill()->getStartColor()->setARGB('6401e2');
      $objPHPExcel->getActiveSheet()->getStyle('M10:M11')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
      $objPHPExcel->getActiveSheet()->getStyle('M10:M11')->getFill()->getStartColor()->setARGB('35b142');
      $objPHPExcel->getActiveSheet()->getStyle('M14:M17')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
      $objPHPExcel->getActiveSheet()->getStyle('M14:M17')->getFill()->getStartColor()->setARGB('35b142');
      $objPHPExcel->getActiveSheet()->getStyle('M20:M24')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
      $objPHPExcel->getActiveSheet()->getStyle('M20:M24')->getFill()->getStartColor()->setARGB('35b142');
      $objPHPExcel->getActiveSheet()->getStyle('M27:M31')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
      $objPHPExcel->getActiveSheet()->getStyle('M27:M31')->getFill()->getStartColor()->setARGB('35b142');
      $objPHPExcel->getActiveSheet()->getStyle('M33')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
      $objPHPExcel->getActiveSheet()->getStyle('M33')->getFill()->getStartColor()->setARGB('eea830');
      $objPHPExcel->getActiveSheet()->getStyle('M35:M36')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
      $objPHPExcel->getActiveSheet()->getStyle('M35:M36')->getFill()->getStartColor()->setARGB('eea830');
      $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(40);//TAMAÑO FILA

        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1, 1, "REGISTROS - COMPONENTE NUTRICIONAL");
        $objPHPExcel->getActiveSheet()->mergeCells('B1:K1');//COMBINAR
        $objPHPExcel->getActiveSheet()->getStyle('B1')->getAlignment()->applyFromArray(
          array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,)
        );
        $objPHPExcel->getActiveSheet()->getStyle('A1:K2')->applyFromArray(
          array('borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN)))
        );
        $objPHPExcel->getActiveSheet()->getStyle('M33:N33')->applyFromArray(
          array('borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN)))
        );
        $objPHPExcel->getActiveSheet()->getStyle('M35:N36')->applyFromArray(
          array('borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN)))
        );

        $objPHPExcel->getActiveSheet()->getStyle("B1")->getFont()->setSize(30); //TAMAÑO DE LETRA


        $objPHPExcel->getActiveSheet()->getStyle('C')->getAlignment()->applyFromArray(
          array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,)
        );
        $objPHPExcel->getActiveSheet()->getStyle('D')->getAlignment()->applyFromArray(
          array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,)
        );

        $objDrawing = new PHPExcel_Worksheet_Drawing();
        $objDrawing->setName('test_img');
        $objDrawing->setDescription('test_img');
        $objDrawing->setPath('./pictures/log4.png');
        $objDrawing->setCoordinates('A1');
        $objDrawing->setOffsetX(30);
        $objDrawing->setOffsetY(5);
        $objDrawing->setWidth(100);
        $objDrawing->setHeight(45);
        $objDrawing->setWorksheet($objPHPExcel->getActiveSheet());


      $objPHPExcel->getActiveSheet()->setAutoFilter('A2:K2');

     $objPHPExcel->setActiveSheetIndex(0);
     $objPHPExcel->getActiveSheet()->setTitle("Registros_I");
     $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true); $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
     $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true); $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
     $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true); $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
     $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true); $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
     $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true); $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
     $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true); $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(20);
     $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setAutoSize(true);


    $dis_1="station-one";$d1=0;$dis_2="station-two";$d2=0;$dis_3="station-three";$d3=0;$dis_4="station-four";$d4=0;
     $objPHPExcel->getActiveSheet()->setCellValue('A2','Fecha- Hora');
     $objPHPExcel->getActiveSheet()->setCellValue('B2','Comida');
     $objPHPExcel->getActiveSheet()->setCellValue('C2','Id');
     $objPHPExcel->getActiveSheet()->setCellValue('D2','Genero');
     $objPHPExcel->getActiveSheet()->setCellValue('E2','Nombre');
     $objPHPExcel->getActiveSheet()->setCellValue('F2','Apellido');
     $objPHPExcel->getActiveSheet()->setCellValue('G2','Documento');
     $objPHPExcel->getActiveSheet()->setCellValue('H2','Dispositivo');
     $objPHPExcel->getActiveSheet()->setCellValue('I2','Puento-Evento');
     $objPHPExcel->getActiveSheet()->setCellValue('J2','Tpo. Verificación');
     $objPHPExcel->getActiveSheet()->setCellValue('K2','Tpo. Movimiento');
     $objPHPExcel->getActiveSheet()->setCellValue('M3','Cant. Desayunos');
     $objPHPExcel->getActiveSheet()->setCellValue('M4','Cant. Almuerzos');
     $objPHPExcel->getActiveSheet()->setCellValue('M5','Cant. Cenas');
     $objPHPExcel->getActiveSheet()->setCellValue('M6','Cant. Meriendas');
     $objPHPExcel->getActiveSheet()->setCellValue('M7','Cant. Diferentes');
     $objPHPExcel->getActiveSheet()->setCellValue('M10','Hombres. Comida');
     $objPHPExcel->getActiveSheet()->setCellValue('M11','Mujeres. Comida');
     $objPHPExcel->getActiveSheet()->setCellValue('N2','Valores');
     $objPHPExcel->getActiveSheet()->setCellValue('N9','Valores');
     $objPHPExcel->getActiveSheet()->setCellValue('N13','Valores');
     $objPHPExcel->getActiveSheet()->setCellValue('M2','Com. Registradas');
     $objPHPExcel->getActiveSheet()->setCellValue('M9','Asistencia. Genero');
     $objPHPExcel->getActiveSheet()->setCellValue('M13','Accesos. Entorno');
     $objPHPExcel->getActiveSheet()->setCellValue('M14',$dis_1);
     $objPHPExcel->getActiveSheet()->setCellValue('M15',$dis_2);
     $objPHPExcel->getActiveSheet()->setCellValue('M16',$dis_3);
     $objPHPExcel->getActiveSheet()->setCellValue('M17',$dis_4);
     $objPHPExcel->getActiveSheet()->setCellValue('M33','Comidas Repartidas');
     $objPHPExcel->getActiveSheet()->setCellValue('M35','Fecha Descarga');
     $objPHPExcel->getActiveSheet()->setCellValue('M36','Hora Descarga');
     $objPHPExcel->getActiveSheet()->setCellValue('N35',$f);
     $objPHPExcel->getActiveSheet()->setCellValue('N36',$h);

     $objPHPExcel->getActiveSheet()->setCellValue('N33','=SUM(N3:N7)');



       $con_d_h=0;$con_a_h=0;$con_c_h=0;$con_di_h=0;$con_m_h=0;$con_m_m=0;$con_d_m=0;$con_a_m=0;$con_c_m=0;$con_di_m=0;
       $de=0;$al=0;$ce=0;$me=0;$di=0;$ho=0;$mu=0;
       foreach (@$_SESSION['listar_excel'] as $key) {
       $dat=explode("||", $key);

       $objPHPExcel->getActiveSheet()->getStyle('A'.$fila.':K'.$fila)->applyFromArray(
         array('borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN)))
       );

       $objPHPExcel->getActiveSheet()->setCellValue('A'.$fila, $dat[0]);
       $objPHPExcel->getActiveSheet()->setCellValue('B'.$fila, $dat[1]);
       $objPHPExcel->getActiveSheet()->setCellValue('C'.$fila, $dat[2]);
       $objPHPExcel->getActiveSheet()->setCellValue('D'.$fila, $dat[10]);
       $objPHPExcel->getActiveSheet()->setCellValue('E'.$fila, $dat[3]);
       $objPHPExcel->getActiveSheet()->setCellValue('F'.$fila, $dat[4]);
       $objPHPExcel->getActiveSheet()->setCellValue('G'.$fila, $dat[5]);
       $objPHPExcel->getActiveSheet()->setCellValue('H'.$fila, $dat[6]);
       $objPHPExcel->getActiveSheet()->setCellValue('I'.$fila, $dat[7]);
       if($dat[8] =='1'){$objPHPExcel->getActiveSheet()->setCellValue('J'.$fila, 'Huella');} else if($dat[8] =='2'){$objPHPExcel->getActiveSheet()->setCellValue('J'.$fila, 'Id Usuario');}
  else if($dat[8] =='3'){$objPHPExcel->getActiveSheet()->setCellValue('J'.$fila, 'Contraseña');} else if($dat[8] =='4'){$objPHPExcel->getActiveSheet()->setCellValue('J'.$fila, 'Tarjeta');}
  //      if($dat[9] =='10'){$objPHPExcel->getActiveSheet()->setCellValue('K'.$fila, 'Entrada');} else if($dat[9] =='11'){$objPHPExcel->getActiveSheet()->setCellValue('K'.$fila, 'Salida');}
  // else if($dat[9] =='14'){$objPHPExcel->getActiveSheet()->setCellValue('K'.$fila, 'Salida T.E');} else if($dat[9] =='15'){$objPHPExcel->getActiveSheet()->setCellValue('K'.$fila, 'Entrada T.E');}

       if($dat[1]=='Desayuno' && $dat[10]=='M'){$con_d_h++;}else if($dat[1]=='Almuerzo' && $dat[10]=='M'){$con_a_h++;}
  else if($dat[1]=='Cena' && $dat[10]=='M'){$con_c_h++;}else if($dat[1]=='Merienda' && $dat[10]=='M'){$con_m_h++;}else if($dat[1]=='Diferente' && $dat[10]=='M'){$con_di_h++;}
       if($dat[1]=='Desayuno' && $dat[10]=='F'){$con_d_m  ++;}else if($dat[1]=='Almuerzo' && $dat[10]=='F'){$con_a_m ++;}
  else if($dat[1]=='Cena' && $dat[10]=='F'){$con_c_m  ++;}else if($dat[1]=='Merienda' && $dat[10]=='F'){$con_m_m  ++;}else if($dat[1]=='Diferente' && $dat[10]=='F'){$con_di_m  ++;}


       if($dat[1]=='Desayuno'){$de++;}else if($dat[1]=='Almuerzo'){$al++;}else if($dat[1]=='Cena'){$ce++;}else if($dat[1]=='Merienda'){$me++;}else{$di++;}

       if($dat[10]=='M'){$ho++;}else if($dat[10]=='F'){$mu++;}
       if($dat[6]==$dis_1){$d1++;}else if($dat[6]==$dis_2){$d2++;}else if($dat[6]==$dis_3){$d3++;}else if($dat[6]==$dis_4){$d4++;}
      $fila++;
     }
     $objPHPExcel->getActiveSheet()->setCellValue('N3',$de);
     $objPHPExcel->getActiveSheet()->setCellValue('N4',$al);
     $objPHPExcel->getActiveSheet()->setCellValue('N5',$ce);
     $objPHPExcel->getActiveSheet()->setCellValue('N6',$me);
     $objPHPExcel->getActiveSheet()->setCellValue('N7',$di);
     $objPHPExcel->getActiveSheet()->getStyle('M2:N7')->applyFromArray(
       array('borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN)))
     );
     $objPHPExcel->getActiveSheet()->setCellValue('N10',$ho);
     $objPHPExcel->getActiveSheet()->setCellValue('N11',$mu);
     $objPHPExcel->getActiveSheet()->getStyle('M9:N11')->applyFromArray(
       array('borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN)))
     );
     $objPHPExcel->getActiveSheet()->setCellValue('N14',$d1);
     $objPHPExcel->getActiveSheet()->setCellValue('N15',$d2);
     $objPHPExcel->getActiveSheet()->setCellValue('N16',$d3);
     $objPHPExcel->getActiveSheet()->setCellValue('N17',$d4);
     $objPHPExcel->getActiveSheet()->getStyle('M13:N17')->applyFromArray(
       array('borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN)))
     );
     $objPHPExcel->getActiveSheet()->getStyle('M19:N24')->applyFromArray(
       array('borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN)))
     );
     $objPHPExcel->getActiveSheet()->getStyle('M26:N31')->applyFromArray(
       array('borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN)))
     );

     $objWorksheet = $objPHPExcel->getActiveSheet();


     $dataSeriesLabels1 = [new PHPExcel_Chart_DataSeriesValues('String', 'Registros_I!$N$2', NULL, 1),	];
     $xAxisTickValues1 = [new PHPExcel_Chart_DataSeriesValues('String', 'Registros_I!$M$3:$M$7', NULL, 4),];
     $dataSeriesValues1 = [new PHPExcel_Chart_DataSeriesValues('Number', 'Registros_I!$N$3:$N$7', NULL, 4),];
     $series1 = new PHPExcel_Chart_DataSeries(
     	PHPExcel_Chart_DataSeries::TYPE_DONUTCHART,				// plotType
     	NULL,			                                        // plotGrouping (Pie charts don't have any grouping)
     	range(0, count($dataSeriesValues1)-1),					// plotOrder
     	$dataSeriesLabels1,										// plotLabel
     	$xAxisTickValues1,										// plotCategory
     	$dataSeriesValues1										// plotValues
     );

     $layout1 = new PHPExcel_Chart_Layout();
     $layout1->setShowVal(TRUE);
     $layout1->setShowPercent(TRUE);

     $plotArea1 = new PHPExcel_Chart_PlotArea($layout1, array($series1));
     $legend1 = new PHPExcel_Chart_Legend(PHPExcel_Chart_Legend::POSITION_RIGHT, NULL, false);
     $title1 = new PHPExcel_Chart_Title('Comidas Registradas');

     $chart1 = new PHPExcel_Chart(
     	'chart1',		// name
     	$title1,		// title
     	$legend1,		// legend
     	$plotArea1,		// plotArea
     	true,			// plotVisibleOnly
     	0,				// displayBlanksAs
     	NULL,			// xAxisLabel
     	NULL			// yAxisLabel		- Pie charts don't have a Y-Axis
     );

     $chart1->setTopLeftPosition('P1');
     $chart1->setBottomRightPosition('U10');
     $objWorksheet->addChart($chart1);


     $dataSeriesLabels2 = [new PHPExcel_Chart_DataSeriesValues('String', 'Registros_I!$N$9', NULL, 1),	];
     $xAxisTickValues2 = [new PHPExcel_Chart_DataSeriesValues('String', 'Registros_I!$M$10:$M$11', NULL, 4),];
     $dataSeriesValues2 = [new PHPExcel_Chart_DataSeriesValues('Number', 'Registros_I!$N$10:$N$11', NULL, 4),];
     $series2 = new PHPExcel_Chart_DataSeries(
     	PHPExcel_Chart_DataSeries::TYPE_PIECHART,				// plotType
     	NULL,			                                        // plotGrouping (Pie charts don't have any grouping)
     	range(0, count($dataSeriesValues2)-1),					// plotOrder
     	$dataSeriesLabels2,										// plotLabel
     	$xAxisTickValues2,										// plotCategory
     	$dataSeriesValues2										// plotValues
     );

     $layout2 = new PHPExcel_Chart_Layout();
     $layout2->setShowVal(TRUE);
     $layout2->setShowPercent(TRUE);

     $plotArea2 = new PHPExcel_Chart_PlotArea($layout2, array($series2));
     $legend2 = new PHPExcel_Chart_Legend(PHPExcel_Chart_Legend::POSITION_RIGHT, NULL, false);
     $title2 = new PHPExcel_Chart_Title('Asistencia por genero');

     $chart2 = new PHPExcel_Chart(
     	'chart2',		// name
     	$title2,		// title
     	$legend2,		// legend
     	$plotArea2,		// plotArea
     	true,			// plotVisibleOnly
     	0,				// displayBlanksAs
     	NULL,			// xAxisLabel
     	NULL			// yAxisLabel		- Pie charts don't have a Y-Axis
     );

     $chart2->setTopLeftPosition('P11');
     $chart2->setBottomRightPosition('U21');
     $objWorksheet->addChart($chart2);


     $dataSeriesLabels3 = [new PHPExcel_Chart_DataSeriesValues('String', 'Registros_I!$N$13', NULL, 1),	];
     $xAxisTickValues3 = [new PHPExcel_Chart_DataSeriesValues('String', 'Registros_I!$M$14:$M$17', NULL, 4),];
     $dataSeriesValues3 = [new PHPExcel_Chart_DataSeriesValues('Number', 'Registros_I!$N$14:$N$17', NULL, 4),];
     $series3 = new PHPExcel_Chart_DataSeries(
     	PHPExcel_Chart_DataSeries::TYPE_BARCHART,				// plotType
     	null,
     	range(0, count($dataSeriesValues3)-1),					// plotOrder
     	$dataSeriesLabels3,										// plotLabel
     	$xAxisTickValues3,										// plotCategory
     	$dataSeriesValues3										// plotValues
     );

     $layout3 = new PHPExcel_Chart_Layout();
     $layout3->setShowVal(TRUE);
     $layout3->setShowPercent(TRUE);

     $plotArea3 = new PHPExcel_Chart_PlotArea($layout3, array($series3));
     $legend3 = new PHPExcel_Chart_Legend(PHPExcel_Chart_Legend::POSITION_RIGHT, NULL, false);
     $title3 = new PHPExcel_Chart_Title('Accesos por entorno');

     $chart3 = new PHPExcel_Chart(
     	'chart3',		// name
     	$title3,		// title
     	$legend3,		// legend
     	$plotArea3,		// plotArea
     	true,			// plotVisibleOnly
     	0,				// displayBlanksAs
     	NULL,			// xAxisLabel
     	NULL			// yAxisLabel		- Pie charts don't have a Y-Axis
     );

     $chart3->setTopLeftPosition('P22');
     $chart3->setBottomRightPosition('U32');
     $objWorksheet->addChart($chart3);


     $dataSeriesLabels4 = [new PHPExcel_Chart_DataSeriesValues('String', 'Registros_I!$N$19', NULL, 1),	];
     $xAxisTickValues4 = [new PHPExcel_Chart_DataSeriesValues('String', 'Registros_I!$M$20:$M24', NULL, 4),];
     $dataSeriesValues4 = [new PHPExcel_Chart_DataSeriesValues('Number', 'Registros_I!$N$20:$N$24', NULL, 4),];
     $series4 = new PHPExcel_Chart_DataSeries(
     	PHPExcel_Chart_DataSeries::TYPE_BARCHART,				// plotType
     	NULL,			                                        // plotGrouping (Pie charts don't have any grouping)
     	range(0, count($dataSeriesValues4)-1),					// plotOrder
     	$dataSeriesLabels4,										// plotLabel
     	$xAxisTickValues4,										// plotCategory
     	$dataSeriesValues4										// plotValues
     );

     $layout4 = new PHPExcel_Chart_Layout();
     $layout4->setShowVal(TRUE);
     $layout4->setShowPercent(TRUE);

     $plotArea4 = new PHPExcel_Chart_PlotArea($layout4, array($series4));
     $legend4 = new PHPExcel_Chart_Legend(PHPExcel_Chart_Legend::POSITION_RIGHT, NULL, false);
     $title4 = new PHPExcel_Chart_Title('Comidas por hombres');

     $chart4 = new PHPExcel_Chart(
     	'chart4',		// name
     	$title4,		// title
     	$legend4,		// legend
     	$plotArea4,		// plotArea
     	true,			// plotVisibleOnly
     	0,				// displayBlanksAs
     	NULL,			// xAxisLabel
     	NULL			// yAxisLabel		- Pie charts don't have a Y-Axis
     );

     $chart4->setTopLeftPosition('V1');
     $chart4->setBottomRightPosition('AA10');
     $objWorksheet->addChart($chart4);


     $dataSeriesLabels5 = [new PHPExcel_Chart_DataSeriesValues('String', 'Registros_I!$N$26', NULL, 1),	];
     $xAxisTickValues5 = [new PHPExcel_Chart_DataSeriesValues('String', 'Registros_I!$M$27:$M$31', NULL, 4),];
     $dataSeriesValues5 = [new PHPExcel_Chart_DataSeriesValues('Number', 'Registros_I!$N$27:$N$31', NULL, 4),];
     $series5 = new PHPExcel_Chart_DataSeries(
     	PHPExcel_Chart_DataSeries::TYPE_BARCHART,				// plotType
     	NULL,			                                        // plotGrouping (Pie charts don't have any grouping)
     	range(0, count($dataSeriesValues5)-1),					// plotOrder
     	$dataSeriesLabels5,										// plotLabel
     	$xAxisTickValues5,										// plotCategory
     	$dataSeriesValues5										// plotValues
     );

     $layout5 = new PHPExcel_Chart_Layout();
     $layout5->setShowVal(TRUE);
     $layout5->setShowPercent(TRUE);

     $plotArea5 = new PHPExcel_Chart_PlotArea($layout5, array($series5));
     $legend5 = new PHPExcel_Chart_Legend(PHPExcel_Chart_Legend::POSITION_RIGHT, NULL, false);
     $title5 = new PHPExcel_Chart_Title('Comidas por mujeres');

     $chart5 = new PHPExcel_Chart(
     	'chart5',		// name
     	$title5,		// title
     	$legend5,		// legend
     	$plotArea5,		// plotArea
     	true,			// plotVisibleOnly
     	0,				// displayBlanksAs
     	NULL,			// xAxisLabel
     	NULL			// yAxisLabel		- Pie charts don't have a Y-Axis
     );

     $chart5->setTopLeftPosition('V11');
     $chart5->setBottomRightPosition('AA21');
     $objWorksheet->addChart($chart5);

     // $objPHPExcel->getActiveSheet()->getSheetView()->setView(PHPExcel_Worksheet_SheetView::SHEETVIEW_PAGE_LAYOUT);

     $objPHPExcel->getActiveSheet()->setCellValue('M19','Comidas. Hombres');
     $objPHPExcel->getActiveSheet()->setCellValue('N19','Valores');
     $objPHPExcel->getActiveSheet()->setCellValue('M20','Desayunos');
     $objPHPExcel->getActiveSheet()->setCellValue('M21','Almuerzos');
     $objPHPExcel->getActiveSheet()->setCellValue('M22','Cenas');
     $objPHPExcel->getActiveSheet()->setCellValue('M23','Meriendas');
     $objPHPExcel->getActiveSheet()->setCellValue('M24','Diferentes');

     $objPHPExcel->getActiveSheet()->setCellValue('M26','Comidas. Mujeres');
     $objPHPExcel->getActiveSheet()->setCellValue('N26','Valores');
     $objPHPExcel->getActiveSheet()->setCellValue('M27','Desayunos');
     $objPHPExcel->getActiveSheet()->setCellValue('M28','Almuerzos');
     $objPHPExcel->getActiveSheet()->setCellValue('M29','Cenas');
     $objPHPExcel->getActiveSheet()->setCellValue('M30','Meriendas');
     $objPHPExcel->getActiveSheet()->setCellValue('M31','Diferentes');

     $objPHPExcel->getActiveSheet()->setCellValue('N20',$con_d_h);
     $objPHPExcel->getActiveSheet()->setCellValue('N21',$con_a_h);
     $objPHPExcel->getActiveSheet()->setCellValue('N22',$con_c_h);
     $objPHPExcel->getActiveSheet()->setCellValue('N23',$con_m_h);
     $objPHPExcel->getActiveSheet()->setCellValue('N24',$con_di_h);

     $objPHPExcel->getActiveSheet()->setCellValue('N27',$con_d_m);
     $objPHPExcel->getActiveSheet()->setCellValue('N28',$con_a_m);
     $objPHPExcel->getActiveSheet()->setCellValue('N29',$con_c_m);
     $objPHPExcel->getActiveSheet()->setCellValue('N30',$con_m_m);
     $objPHPExcel->getActiveSheet()->setCellValue('N31',$con_di_m);


        header("Content-Type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
        header('Content-Disposition: attachment;filename="Registro_ingresos-'.$f.'-'.$h.'.xlsx"');
        header('Cache-Control: max-age=0');

        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->setIncludeCharts(TRUE);
        $objWriter->save('php://output');
        // echo date('H:i:s') , " Write to Excel2007 format" , EOL;
        // $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        // $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        // $objWriter->save('php://output');


        /*$objWriter->save(str_replace('.php', '.xlsx', __FILE__));
        echo date('H:i:s') , " File written to " , str_replace('.php', '.xlsx', pathinfo(__FILE__, PATHINFO_BASENAME)) , EOL;*/

 ?>
