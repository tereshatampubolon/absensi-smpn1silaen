<?php
    require_once "Function.php";

    global $role;

    $akun = getAccountInfo($_SESSION['username']);

    if($_SESSION['role'] == '1'){
        global $role;
        $role = "Administrator";
    }
    else if($_SESSION['role'] == '2'){
        global $role;
        $role = "Guru (".$akun['kode_guru'].")";
    }
?>

<center>
<div class="col-md-2 menu" style="height:100%">
    <div class="list">
        <?php 
            global $role;
            echo $role;
        ?>
    </div><br>
    <!-- <img width="160" height="200"> -->
    <table style="margin-top:10px;">
        <!-- <tr>
            <td class="td_menu" style="width:10%">
                <a href="AllAkun.php">Manage Akun</a>
            </td>
        </tr> -->
        <?php if($_SESSION['role'] == 1){
            echo '<tr>';
            echo '<td class="td_menu">';
                echo '<a href="AllGuru.php">Manage Guru</a>';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td class="td_menu">';
                echo '<a href="AllSiswa.php">Manage Siswa</a>';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td class="td_menu">';
                echo '<a href="Dashboard.php">Laporan Absensi</a>';
            echo '</td>';
            echo '</tr>';
            }
        
        else{
            echo '<tr>';
                echo '<td class="td_menu">';
                    echo '<a href="Dashboard.php">Manage Absensi</a>';
                echo '</td>';
            echo '</tr>';
            echo '<tr>';
         } ?>
        <tr>
            <td class="td_menu">
                <a href="DetailUser.php">Profil Diri</a>
            </td>
        </tr>
    </table>
</div>
</center>