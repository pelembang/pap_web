<!-- Content -->
<div class="page-content bg-gray">
    <!-- inner page banner -->
    <div class="dlab-bnr-inr dlab-bnr-inr-sm overlay-black-dark banner-content " style="background-image:url($pathurl/images/banner/bnr2.jpg);">
        <div class="container">
            <div class="dlab-bnr-inr-entry">
                <h1 class="text-white">$nama</h1>
                <!-- Breadcrumb row -->
                <div class="breadcrumb-row">
                    <ul class="list-inline">
                        <li><a href="javascript:void(0);">Beranda</a></li>
                        
                    </ul>
                </div>
                <!-- Breadcrumb row END -->
            </div>
        </div>
    </div>
    <!-- inner page banner END -->
    <div class="content-area">
      





        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="sort-title clearfix text-center">
                        <h4>Program Studi di Politeknik Akamigas Palembang</h4>
                    </div>
                    <!-- tabs defult -->
                    <div class="section-content box-sort-in button-example p-t10 p-b30">
                        <div class="dlab-tabs border-top bg-tabs">
                            <ul class="nav nav-tabs">
                                <li><a data-bs-toggle="tab" href="#pengantar" class="active"><span class="title-head">Sambutan Kaprodi</span></a></li>
                                <li><a data-bs-toggle="tab" href="#visimisi"><span class="title-head">Visi dan Misi</span></a></li>
                                <li><a data-bs-toggle="tab" href="#sejarah"><span class="title-head">Sejarah</span></a></li>
                                <li><a data-bs-toggle="tab" href="#so"><span class="title-head">Struktur Organisasi</span></a></li>
                                <li><a data-bs-toggle="tab" href="#akreditasi"><span class="title-head">Akreditasi</span></a></li>
                                <li><a data-bs-toggle="tab" href="#statistik"><span class="title-head">Statistik</span></a></li>
                                <li><a data-bs-toggle="tab" href="#kurikulum"><span class="title-head">Kurikulum</span></a></li>
                                <li><a data-bs-toggle="tab" href="#pengumuman"><span class="title-head">Pengumuman</span></a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="pengantar" class="tab-pane active">
                                    $pengantar
                                </div>
                                <div id="visimisi" class="tab-pane">
                                    $visimisi
                                </div>
                                <div id="sejarah" class="tab-pane">
                                    $sejarah
                                </div>
                                <div id="so" class="tab-pane">
                                    <img src="$pathurl/userfiles/images/so/$so" class="img-fluid mx-auto d-block"/>
                                </div>
                                <div id="akreditasi" class="tab-pane">
                                    <img src="$pathurl/userfiles/images/akreditasi/$infoakreditasi" class="img-fluid mx-auto d-block"/>
                                </div>
                                <div id="statistik" class="tab-pane">
                                    <div class="col-3 mx-auto d-block">
                                    <table class="table">
                                        <tr><th>Dosen</th><td class="float-end">$dosen</td></tr>
                                        <tr><th>Mahasiswa</th><td class="float-end">$mhs</td></tr>
                                        <tr><th>Alumni</th><td class="float-end">$alumni</td></tr>
                                    </table>
                                </div>
                                </div>
                                <div id="kurikulum" class="tab-pane">
                                    $kurikulum
                                </div>
                                <div id="pengumuman" class="tab-pane">
                                    $pengumuman
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- tabs defult End -->
        </div>




            </div>
        </div>
    </div>
</div>
<!-- Left & right section END -->