<html>
<head><link href="gaya.css" rel="stylesheet"></head>
<body>
<h1>Data User</h1>
<table border=1>
<tr>
<th>Nama</th>
<th>Email</th>
<th>Subject</th>
<th>Nomor HP</th>
<th>Pesan</th>
</tr>
<?php
$file = "data/ecommerce.json";
$target_dir = "data/";
// Cek file existing jika ada, load ke $array
if(file_exists($file)) {
    // Mendapatkan isi file JSON
    $ecommerce = file_get_contents($file);
    // Men-decode ecommerce.json
    $array = json_decode($ecommerce, true);
}

// Cek apakah ada submit, jika iya, proses baca dan simpan
if (isset($_POST['btnKirim'])) {
    $data = array(
        'Nama' => $_POST['name'],
        'Email' => $_POST['email'],
        'Subject' => $_POST['subject'],
        'NomorHP' => $_POST['nomor'],
        'Pesan' => $_POST['pesan']
    );

    // Tambahkan data baru ke dalam array
    $array[] = $data;

    // Encode array menjadi JSON
    $json = json_encode($array, JSON_PRETTY_PRINT);

    // Simpan file JSON
    if (file_put_contents($file, $json)) {
        // Pindahkan file yang diupload ke folder target
        echo "<script>alert('Data telah disimpan dengan baik...')</script>";
    } else {
        echo "<script>alert('Oops, gagal disimpan...')</script>";
    }
}
    //ubah json ke array kemudian tampilkan dalam tabel
    $json = json_encode($array,JSON_PRETTY_PRINT);
    $data = json_decode($json);
    foreach ($data as $key => $hub){
    echo "<tr> <td>$hub->Nama</td> <td>$hub->Email</td> <td>$hub->Subject</td> <td>$hub->NomorHP</td> <td>$hub->Pesan</td></tr>";
}
?>
</table>
</body>
</html>