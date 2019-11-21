<!--================ Hero Carousel start =================-->
<section class="section-margin mt-0">
    <div class="owl-carousel owl-theme hero-carousel">
    <?php foreach( $peternak as $row ) : ?>
        <!-- form untuk proses belanja -->
        <?= form_open(base_url('belanja/add')); ?>
        <?= form_hidden('id', $row['id_ternak']); ?>
        <?= form_hidden('name', $row['nama_peternakan']); ?>    
        <?= form_hidden('redirect_page', str_replace('index.php','',current_url())); ?>

            <div class="hero-carousel__slide">
            <img src="<?= base_url('assets/upload/image/'.$row['gambar']); ?>" alt="" class="img-fluid">
            <a href="<?= base_url('peternakan/detail/'.$row['slug_peternakan']) ?>" class="hero-carousel__slideOverlay">
                <h3><?= $row['nama_peternakan']; ?></h3>
                <p>Pemilik : <?= $row['nama']; ?></p>
            </a>
            </div>
            
        </form>
    <?php endforeach; ?>
    </div>
    </section>
    <!--================ Hero Carousel end =================-->