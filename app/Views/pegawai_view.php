<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Data Pegawai</title>

    <style>
        .container {
            max-width: 800px;
        }
    </style>
</head>

<body>
    <!-- Container -->
    <div class="container mt-4">
        <!-- Card -->
        <div class="card">
            <h5 class="card-header bg-secondary text-white">Data Pegawai</h5>
            <div class="card-body">
                <!-- lokasi text pencarian  -->
                <form action="" method="get">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" value="<?php echo $katakunci ?>" name="katakunci" placeholder="Masukkan Kata Kunci" aria-label="Masukkan Kata Kunci" aria-describedby="button-addon2">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Cari</button>
                    </div>
                </form>

                <!-- MODAL -->
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    + Tambah Data Pegawai
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Form Pegawai</h5>
                                <button type="button" class="btn-close tombol-tutup" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Kalo Sukses -->
                                <div class="alert alert-primary sukses" role="alert" style="display: none">
                                    
                                </div>
                                <!-- Kalo Error -->
                                <div class="alert alert-danger error" role="alert" style="display: none">                                   
                                </div>
                                <!-- FORM INPUT DATA -->
                                <input type="hidden" id="inputId">
                                <div class="mb-3 row">
                                    <label for="inputNama" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputNama">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputEmail">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputBidang" class="col-sm-2 col-form-label">Bidang</label>
                                    <div class="col-sm-10">
                                        <select name="" id="inputBidang" class="form-select">
                                            <option value="Finance">Finance</option>
                                            <option value="Marketing">Marketing</option>
                                            <option value="HR">HR</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputAlamat" class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputAlamat">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary tombol-tutup" data-bs-dismiss="modal">Tutup</button>
                                <button type="button" class="btn btn-primary" id="tombolSimpan">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Bidang</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php                         
                        $nomor = $nomor*2-1;
                        foreach ($dataPegawai as $k => $v) { ?>
                        <tr>
                            <td><?php echo $nomor ?></td>
                            <td><?php echo $v['nama'] ?></td>
                            <td><?php echo $v['email'] ?></td>
                            <td><?php echo $v['bidang'] ?></td>
                            <td><?php echo $v['alamat'] ?></td>
                            <td>
                                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="edit(<?php echo $v['id'] ?>)">Edit</button>
                                <button type="button" class="btn btn-danger btn-sm" onclick="hapus(<?php echo $v['id'] ?>)" >Hapus</button>
                            </td>
                        </tr>
                        <?php $nomor++; }; ?>
                    </tbody>
                </table>
                <?php 
                // Link Pagination
                $linkPagination = $pager->links();
                $linkPagination = str_replace('<li class="active">', '<li class="page-item active">', $linkPagination);
                $linkPagination = str_replace('<li>', '<li class="page-item">', $linkPagination);
                $linkPagination = str_replace('<a', '<a class="page-link"', $linkPagination);
                echo $linkPagination;
                ?>
            </div>
        </div>
    </div>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script>
        function hapus($id) {
            var result = confirm('Yakin mau melakukan proses delete');
            if (result) {
                window.location = "<?php echo site_url("pegawai/hapus") ?>/" + $id;
            }
        }

        function edit($id) {
            $.ajax({
                url: "<?php echo site_url("pegawai/edit") ?>/" + $id,
                type: "get",
                success: function(hasil) {
                    var $obj = $.parseJSON(hasil);
                    if ($obj.id != '') {
                        $('#inputId').val($obj.id);
                        $('#inputNama').val($obj.nama);
                        $('#inputEmail').val($obj.email);
                        $('#inputBidang').val($obj.bidang);
                        $('#inputAlamat').val($obj.alamat);
                    }
                }

            });
        }

        function Bersihkan(){
            $('#inputId').val('');
            $('#inputNama').val('');
            $('#inputEmail').val('');
            $('#inputAlamat').val('');          
        }

        $('.tombol-tutup').on('click', function(){
            if($('.sukses').is(":visible")){
                window.location.href = "<?php echo current_url() . "?" . $_SERVER['QUERY_STRING'] ?>";
            }
            $('.alert').hide();
            Bersihkan();
        });


        $('#tombolSimpan').on('click', function() {
            var $id = $('#inputId').val();
            var $nama = $('#inputNama').val();
            var $email = $('#inputEmail').val();
            var $bidang = $('#inputBidang').val();
            var $alamat = $('#inputAlamat').val();

            $.ajax({
                url: "<?php echo site_url("Pegawai/simpan") ?>",
                type: "POST",
                data: {
                    id: $id,
                    nama: $nama,
                    email: $email,
                    bidang: $bidang,
                    alamat: $alamat
                },
                success: function(hasil) {
                    var $obj = $.parseJSON(hasil);
                    if ($obj.sukses == false) {
                        $('.sukses').hide();
                        $('.error').show();
                        $('.error').html($obj.error);
                    } else {
                        $('.error').hide();
                        $('.sukses').show();
                        $('.sukses').html($obj.sukses);
                        Bersihkan();
                    }
                }
            });
            
        });
    </script>
</body>

</html>