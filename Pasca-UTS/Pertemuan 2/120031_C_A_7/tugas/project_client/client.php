<?php

/*
 * File : client.php
 * Deskripsi : program PHP u/ web service client
 */

//init client
$client = new SoapClient(null, array('location' => "http://localhost/phpws/tugas/project_service/service.php", 'uri' => "urn://localhost/p11"));
?>

<html>
<h2>User Input</h2>
    <form method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <table>
            <tr>
            <td valign="top">NIK</td>
            <td valign="top">:</td>
            <td valign="top"><input type="text" name="nik" placeholder="nik" </td>
            </tr>
            <tr>
            <td valign="top">Nama</td>
            <td valign="top">:</td>
            <td valign="top"><input type="text" name="nama" placeholder="nama" </td>
            </tr>
            <tr>
            <td valign="top">Alamat</td>
            <td valign="top">:</td>
            <td valign="top"><input type="text" name="alamat" placeholder="alamat" </td>
            </tr>
            <tr>
            <td valign="top" colspan="3"><br><input type="submit" name="submit" value="Submit">&nbsp;
            <input type="reset" name="reset" value="Reset"></td>
            </tr>
        </table>
    </form>
</html>

<?php
        //membaca isi form
        if (isset($_POST["submit"])){
            $nik = $_POST["nik"];
            $nama = $_POST["nama"];
            $alamat = $_POST["alamat"];
        }

        //panggil fungsi pada service
        $return = $client->__soapCall("tambahRDBMS",array($nik, $nama, $alamat));
        //tampilkan
        echo "Hasil penambahan data pada database = ".$return;
?>