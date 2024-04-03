<?php
require_once '../functions.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM mahasiswa WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    if ($data = $result->fetch_assoc()) {
        $nama = $data['nama'];
        $nim = $data['nim'];
        $prodi = $data['prodi'];
        $jk = $data['jk'];
        $hp = $data['hp'];
        $ukm = $data['ukm'];
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UKM WEBSITE UNEJ</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/form.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>

<body>
    <nav>
        <div>
            <h1>UKM FASILKOM</h1>
        </div>
    </nav>

    <main>
        <form action="../functions.php" method="post" enctype="multipart/form-data">
            <h1>Edit Data Anda</h1>
            <section>
                <input type="hidden" name="id" value="<?= $id ?>">
                <div>
                    <label for="nama">Nama:</label><br>
                    <input required type="text" id="nama" name="nama" class="inputan" value="<?= $data['nama'] ?>" ><br>
                    <label for="nim">NIM:</label><br>
                    <input required type="number" id="nim" name="nim" class="inputan" value="<?= $data['nim'] ?>"><br>
                    <label for="jk">Jenis Kelamin:</label><br>
                    <select name="jk" id="jk" class="inputan" required>
                        <option value="" hidden selected></option>
                        <option value="Laki - laki" <?php if ($data['jk'] == 'Laki - laki') { ?> selected <?php } ?>>Laki - laki</option>
                        <option value="Perempuan" <?php if ($data['jk'] == 'Perempuan') { ?> selected <?php } ?>>Perempuan</option>
                    </select><br>
                </div>
                <div>
                    <label for="prodi">Prodi:</label><br>
                    <input required type="text" id="prodi" name="prodi" class="inputan" value="<?= $data['prodi'] ?>"><br>
                    <label for="hp">No hp:</label><br>
                    <input required type="number" id="hp" name="hp" class="inputan" value="<?= $data['hp'] ?>"><br>
                    <label for="ukm">PIlihan UKM:</label><br>
                    <select required id="ukm" name="ukm" class="inputan">
                        <option value="" hidden selected></option>
                        <option value="futsal" <?php if ($data['ukm'] == 'futsal') { ?> selected <?php } ?>>Futsal</option>
                        <option value="volly" <?php if ($data['ukm'] == 'volly') { ?> selected <?php } ?>>Volly</option>
                        <option value="basket" <?php if ($data['ukm'] == 'basket') { ?> selected <?php } ?>>Basket</option>
                    </select><br>
                </div>
            </section><br>
            <button class="button" id="cencel">Cencel</button>
            <button class="button" type="submit" name="proses" value="update">Update</button>
        </form>
    </main>

</body>
<script>
    const cencel = document.getElementById('cencel')

    cencel.addEventListener('click', function () {
        window.history.back();
    })
</script>

</html>