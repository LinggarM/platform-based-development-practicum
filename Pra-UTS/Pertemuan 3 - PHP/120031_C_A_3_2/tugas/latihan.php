<?php
    function hitung_rata($array) {
        $average = array_sum($array)/count($array);
        return $average;
    }

    function print_mhs($array_mhs) {
            echo '<table border="1">';
                echo '<tr>';
                    echo '<td>'.'Nama'.'</td>';
                    echo '<td>'.'Nilai1'.'</td>';
                    echo '<td>'.'Nilai2'.'</td>';
                    echo '<td>'.'Nilai3'.'</td>';
                    echo '<td>'.'Rata2'.'</td>';
                echo '</tr>';
                foreach($array_mhs as $mahasiswa => $nilai){
                    echo '<tr>';
                        echo '<td>'.$mahasiswa.'</td>';
                        echo '<td>'.$nilai[0].'</td>';
                        echo '<td>'.$nilai[1].'</td>';
                        echo '<td>'.$nilai[2].'</td>';
                        echo '<td>'.hitung_rata($nilai).'</td>';
                    echo '</tr>';
                }
            echo '</table>';
    }

    $array_mhs = array('Abdul' => array(89,90,54),
        'Budi' => array(78,60,64),
        'Nina' => array(67,56,84),
        'Budi' => array(87,69,50),
        'Budi' => array(98,65,74)
    );

    print_mhs($array_mhs);
?>