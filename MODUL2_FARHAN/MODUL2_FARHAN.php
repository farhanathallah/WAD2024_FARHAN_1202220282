<?php
// tangkap nilai MK_KI1201, MK_KU1202, dan MK_KU1102 yang ada pada form html
// silakan taruh code kalian di bawah
$Nilai_MK_KI1201 = '';
$Nilai_MK_KU1202 = '';
$Nilai_MK_KU1102 = '';

if ($_POST) {
    $Nilai_MK_KI1201 = $_POST["MK_KI1201"];
    $Nilai_MK_KU1202 = $_POST["MK_KU1202"];
    $Nilai_MK_KU1102 = $_POST["MK_KU1102"];
}

// buatkan sebuah perkondisian  
// jika MK_KI1201 atau MK_KU1202 atau MK_KU1102 kosong maka akan muncul pesan error
// silakan taruh code kalian di bawah
$error = '';
if (empty($Nilai_MK_KI1201) || empty($Nilai_MK_KU1202) || empty($Nilai_MK_KU1102)) {
    $error = "Nilai tidak ada, silakan masukkan semua nilai.";
}


// buatkanlah perkondisian jika nilainya memenuhi akan mendapatkan peminatan yang sesuai di jurnal, 
// Untuk nilai peminatan sesuai dengan kondisi yang tertera pada jurnal
// silakan taruh code kalian di bawah

$peminatan = '';
if (empty($error)) {
    if ($Nilai_MK_KU1202 == 'AB' || $Nilai_MK_KU1202 == 'A') {
        if ($Nilai_MK_KU1102 == 'B' || $Nilai_MK_KU1102 == 'AB' || $Nilai_MK_KU1102 == 'A') {
            $peminatan = "Peminatan: Kimia Pangan";
        }
    }
    
    if ($Nilai_MK_KI1201 == 'A') {
        $peminatan = "Peminatan: Kimia Umum";
    }
}
// **********************  3  ************************** 
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Peminatan</title>
    <!-- Letakkan link bootstrap dibawah ini -->
  </head>
  <body>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Pilih Peminatan
                </div>
                <div class="card-body">
                <h3>Masukkan nilai mata kuliah anda pada form dibawah ini</h3>
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="MK_KI1201" class="form-label">MK_KI1201</label>
                            <select class="form-select" id="MK_KI1201" name="MK_KI1201" aria-label="Default select example">
                                <option selected value="">Masukkan Nilai</option>
                                <option value="A">A</option>
                                <option value="AB">AB</option>
                                <option value="B">B</option>
                                <option value="BC">BC</option>
                                <option value="C">C</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="MK_KU1202" class="form-label">MK_KU1202</label>
                            <select class="form-select" id="MK_KU1202" name="MK_KU1202" aria-label="Default select example">
                                <option selected value="">Masukkan Nilai</option>
                                <option value="A">A</option>
                                <option value="AB">AB</option>
                                <option value="B">B</option>
                                <option value="BC">BC</option>
                                <option value="C">C</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="MK_KU1102" class="form-label">MK_KU1102</label>
                            <select class="form-select" id="MK_KU1102" name="MK_KU1102" aria-label="Default select example">
                                <option selected value="">Masukkan Nilai</option>
                                <option value="A">A</option>
                                <option value="AB">AB</option>
                                <option value="B">B</option>
                                <option value="BC">BC</option>
                                <option value="C">C</option>
                            </select>
                        </div>
                        <div class="submit">
                            <button class="btn btn-primary" type="submit">Submit form</button>
                        </div>
                    </form>

                    <?php
                    // Hasil dari peminatan yang didapatkan taruh di sini yaaa!!  
                    // silakan taruh code kalian di bawah 
                    if (!empty($peminatan)) {
                        echo "<div class='alert alert-success mt-3'>$peminatan</div>";
                    }
                       

                    //  **********************  4  **************************     


                    // Hasil pesan error nya taruh di sini yaaa!!   
                    // silakan taruh code kalian di bawah 
                    if (!empty($error)) {
                        echo "<div class='alert alert-danger mt-3'>$error</div>";
                    }
                    
                    //  **********************  5  **************************     
                    ?>

                </div>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>