<?php
    include "config/koneksi.php";
    error_reporting(0);    
?>
<div class="col-md-12 mt-5">
    <h3 class="page-header">
        <div align="center">Cek Proses</div>
    </h3>
    <br><br><br>
    
    <form class="form-horizontal" action="" method="POST">
        <div class="form-group">
            <label class="control-label col-sm-4">masukan Kode tiket :</label>
            <div class="col-sm-7">
                <input name="invoice" class="form-control" placeholder="Kode Pemesanan">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4"></label>
            <div class="col-sm-7" align="right">
                <button type="submit" class="btn btn-danger" value="pencarian" name="cari">Cek Proses</button>
            </div>
        </div>
        <br>
        <?php if(@$_SESSION['email']){ ?>
        <p>di bawah ini kode tiket anda silahkan cek tiket anda</p>
        <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode tiket</th>
                        <th>Nama Pemesan</th>
                        <th>Total Tagihan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                        include '../config/koneksi.php';
                        $id_user = $_SESSION['id_user'];
                        $query = mysqli_query($conn, "SELECT * FROM tiket where id_user ='$id_user'")or die(mysqli_error());
                                        if(mysqli_num_rows($query) == 0){   
                                            echo '<tr><td colspan="5" align="center">Tidak ada data!</td></tr>';        
                                        }
                                            else
                                        {   
                                            $no = 1;                
                                            while($data = mysqli_fetch_array($query)){  
                                                echo '<tr>';
                                                echo '<td>'.$no.'</td>';
                                                echo '<td>'.$data['invoice'].'</td>';
                                                echo '<td>'.$data['nama'].'</td>';
                                                echo '<td>Rp. '.$data['total'].'</td>';
                                                echo '</tr>';
                                                $no++;  
                                            }
                                        }
                            
                                ?>
                                    
                </tbody>
            </table>
        <?php }else{ echo "<b>harap login terlebih dahulu!</b>";} ?>
        <br><br>
        <div class="col-md-12">
            <?php
                
                include 'config/koneksi.php';
                
                if(isset($_POST['cari'])){
                    $invoice = $_POST['invoice'];
                }


                $query  = mysqli_query($conn, "SELECT tiket.id_pesan, tiket.nama, tiket.id_bus, tiket.id_berangkat, tiket.tgl_pesan, tiket.nik, tiket.alamat, tiket.tgl_berangkat, tiket.qty, tiket.total, tiket.invoice, tiket.konfirm, tiket.respons, tiket.pembayaran, keberangkatan.tujuan, keberangkatan.jadwal, bus.kelas, bus.harga FROM tiket inner join bus on tiket.id_bus = bus.id_bus inner join keberangkatan on tiket.id_berangkat = keberangkatan.id_berangkat  WHERE tiket.invoice = '$invoice'")or die(mysqli_error($conn));

                    if(mysqli_num_rows($query) == 0){   
                                
                    }
                    else{

                        echo "<h4><center>Proses tiket Anda</center></h4>";
                        echo "<br><br>";
                        $data = mysqli_fetch_array($query);

                        //belum dikonfirmasi admin
                        if ($data['konfirm']==0) {
                        ?>
                            <form action="" method="POST">
                                <input type="hidden" name="id_pesan" value="<?php echo $data['id_pesan']; ?>">
                                <div class="panel panel-default">
                                    <div class="panel-body text-left" style="background-color: #E5E4E2">
                                        <table>
                                            <tr>
                                                <td align="left">Kode Pemesanan</td>
                                                <td>:</td>
                                                <td><?php echo $data['invoice']; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="left">Nama Pemesan</td>
                                                <td>:</td>
                                                <td><?php echo $data['nama']; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="left">Status tiket</td>
                                                <td>:</td>
                                                <td>tiket Anda Belum Di konfirmasi oleh admin, silahkan tunggu beberapa saat lagi</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </form>
                            <br>
                        <?php

                        }
                        //Sudah dikonfirmasi admin
                        elseif ($data['konfirm']==1 AND $data['respons']==''){
                        ?>
                            <form action="" method="POST">
                                <input type="hidden" name="id_pesan" value="<?php echo $data['id_pesan']; ?>">
                                <div class="panel panel-default">
                                    <div class="panel-body text-left" style="background-color: #E5E4E2">
                                        <table>
                                            <tr>
                                                <td align="left">Kode Pemesanan&nbsp;&nbsp;:&nbsp;<?php echo $data['invoice']; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="left">Nama Pemesan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;<?php echo $data['nama']; ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </form>
                        <?php
                            echo "tiket Anda sudah dikonfirmasi oleh Admin. Untuk Selanjutnya, Silahkan transfer ke rekening yang ada pada <a href='index.php?halaman=info_pembayaran'>Informasi Pembayaran</a>";
                        }
                        //pembayaran belum dikonfirmasi admin
                        elseif ($data['konfirm']==1 AND $data['pembayaran']==0){
                        ?>
                            <form action="" method="POST">
                                <input type="hidden" name="id_pesan" value="<?php echo $data['id_pesan']; ?>">
                                <div class="panel panel-default">
                                    <div class="panel-body text-left" style="background-color: #E5E4E2">
                                        <table>
                                            <tr>
                                                <td align="left">Kode Pemesanan&nbsp;&nbsp;:&nbsp;<?php echo $data['invoice']; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="left">Nama Pemesan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;<?php echo $data['nama']; ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </form>
                        <?php
                            echo "Transaksi Pembayaran Anda Belum di konfirmasi oleh admin";
                        }
                        //cetak tiket
                        elseif ($data['konfirm']==1 AND $data['pembayaran']==1){
                            
                        ?>
                        <h5>tiket dan pembayaran anda sudah dikonfirmasi dengan detail sebagai berikut : </h5>
                        <br>
                        <form action="" method="POST">
                            <input type="hidden" name="id_pesan" value="<?php echo $data['id_pesan']; ?>">
                            <div class="panel panel-default">
                                <div class="panel-body text-left" style="background-color: #E5E4E2">
                                    <table>
                                        <tr>
                                            <td align="left">Kode Pemesanan&nbsp;&nbsp;:&nbsp;<?php echo $data['invoice']; ?></td>
                                        </tr>
                                        <tr>
                                            <td align="left">Nama Pemesan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;<?php echo $data['nama']; ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div> 
                            <br>
                            <table class="table table-striped-bordered" align="center">
                                <tr>
                                    <td>NIK Pemesan</td>
                                    <td>:</td>
                                    <td><?php echo $data['nik']; ?></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td><?php echo $data['alamat']; ?></td>
                                </tr>
                                <tr>
                                    <td>Jumlah Penumpang</td>
                                    <td>:</td>
                                    <td><?php echo $data['qty']; ?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Berangkat</td>
                                    <td>:</td>
                                    <td><?php echo $data['tgl_berangkat']; ?></td>
                                </tr>
                                <tr>
                                    <td>Jam Berangkat</td>
                                    <td>:</td>
                                    <td><?php echo $data['jadwal']; ?></td>
                                </tr>
                                <tr>
                                    <td>Tujuan</td>
                                    <td>:</td>
                                    <td><?php echo $data['tujuan']; ?></td>
                                </tr>
                                <tr>
                                    <td>Kelas</td>
                                    <td>:</td>
                                    <td><?php echo $data['kelas']; ?></td>
                                </tr>
                                <tr>
                                    <td>Harga</td>
                                    <td>:</td>
                                    <td><?php echo Rp. $data['harga']; ?></td>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td>:</td>
                                    <td><?php echo Rp. $data['total']; ?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <?php
                                        echo '<td><a href="cetak_tiket.php?print=1&&id_pesan='.$data['id_pesan'].'" target ="_blank" role="button" class="btn btn-success pull-right" style="margin-right:10px;margin-bottom:10px;width:100px"><span class="fa fa-print"></span>Cetak Tiket</a></td>';
                                    ?>
                                </tr>
                            </table>
                            </form>
                        <?php
                        }    
                    }
            ?>
        </div>
    </form>
</div>
