# olympics_virtual_series

<?php foreach ($esports as $esport): ?>
    <section>
    	
    	<h1><?= $esport['name'] ?></h1>
    	<img src="<?= $esport['src'] ?>" alt="<?= $esport['alt'] ?>" class="intro-img">
    	<p><?= $esport['description'] ?></p>
    </section>
<?php endforeach; ?>
